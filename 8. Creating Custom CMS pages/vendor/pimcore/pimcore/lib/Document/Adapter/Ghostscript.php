<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Document\Adapter;

use Pimcore\Document\Adapter;
use Pimcore\File;
use Pimcore\Logger;
use Pimcore\Tool\Console;

class Ghostscript extends Adapter
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var string|null
     */
    private $version = null;

    /**
     * @return bool
     */
    public function isAvailable()
    {
        try {
            $ghostscript = self::getGhostscriptCli();
            $phpCli = Console::getPhpCli();
            if ($ghostscript && $phpCli) {
                return true;
            }
        } catch (\Exception $e) {
            Logger::warning($e);
        }

        return false;
    }

    /**
     * @param string $fileType
     *
     * @return bool
     */
    public function isFileTypeSupported($fileType)
    {

        // it's also possible to pass a path or filename
        if (preg_match("/\.?pdf$/i", $fileType)) {
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     *
     * @throws \Exception
     */
    public static function getGhostscriptCli()
    {
        return \Pimcore\Tool\Console::getExecutable('gs', true);
    }

    /**
     * @return mixed
     *
     * @throws \Exception
     */
    public static function getPdftotextCli()
    {
        return \Pimcore\Tool\Console::getExecutable('pdftotext', true);
    }

    /**
     * @param string $path
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function load($path)
    {
        $path = $this->preparePath($path);

        // avoid timeouts
        $maxExecTime = (int) ini_get('max_execution_time');
        if ($maxExecTime > 1 && $maxExecTime < 250) {
            set_time_limit(250);
        }

        if (!$this->isFileTypeSupported($path)) {
            $message = "Couldn't load document " . $path . ' only PDF documents are currently supported';
            Logger::error($message);
            throw new \Exception($message);
        }

        $this->path = $path;

        return $this;
    }

    /**
     * @param string|null $path
     *
     * @return null|string
     *
     * @throws \Exception
     */
    public function getPdf($path = null)
    {
        if ($path) {
            $path = $this->preparePath($path);
        }

        if (!$path && $this->path) {
            $path = $this->path;
        }

        if (preg_match("/\.?pdf$/i", $path)) { // only PDF's are supported
            return $path;
        }

        $message = "Couldn't load document " . $path . ' only PDF documents are currently supported';
        Logger::error($message);
        throw new \Exception($message);
    }

    /**
     * @return int
     *
     * @throws \Exception
     */
    public function getPageCount()
    {
        $pages = Console::exec($this->buildPageCountCommand(), null, 120);
        $pages = trim($pages);

        if (! is_numeric($pages)) {
            throw new \Exception('Unable to get page-count of ' . $this->path);
        }

        return (int) $pages;
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    protected function buildPageCountCommand()
    {
        $command = self::getGhostscriptCli() . ' -dNODISPLAY -q';

        // Adding permit-file-read flag to prevent issue with Ghostscript's SAFER mode which is enabled by default as of version 9.50.
        if (version_compare($this->getVersion(), '9.50', '>=')) {
            $command .= ' --permit-file-read=' . escapeshellarg($this->path);
        }

        $command .= " -c '(" . escapeshellcmd($this->path) . ") (r) file runpdfbegin pdfpagecount = quit'";

        return $command;
    }

    /**
     * Get the version of the installed Ghostscript CLI.
     *
     * @return string
     *
     * @throws \Exception
     */
    protected function getVersion()
    {
        if (is_null($this->version)) {
            $this->version = trim(Console::exec(self::getGhostscriptCli() . ' --version'));
        }

        return $this->version;
    }

    /**
     * @param string $path
     * @param int $page
     * @param int $resolution
     *
     * @return $this|bool
     */
    public function saveImage($path, $page = 1, $resolution = 200)
    {
        try {
            $realTargetPath = null;
            if (!stream_is_local($path)) {
                $realTargetPath = $path;
                $path = PIMCORE_SYSTEM_TEMP_DIRECTORY . '/ghostscript-tmp-' . uniqid() . '.' . File::getFileExtension($path);
            }

            Console::exec(self::getGhostscriptCli() . ' -sDEVICE=pngalpha -dFirstPage=' . $page . ' -dLastPage=' . $page . ' -dTextAlphaBits=4 -dGraphicsAlphaBits=4 -r' . $resolution . ' -o ' . escapeshellarg($path) . ' ' . escapeshellarg($this->path), null, 240);

            if ($realTargetPath) {
                File::rename($path, $realTargetPath);
            }

            return $this;
        } catch (\Exception $e) {
            Logger::error($e);

            return false;
        }
    }

    /**
     * @param int|null $page
     * @param string|null $path
     *
     * @return bool|string
     */
    public function getText($page = null, $path = null)
    {
        try {
            $path = $path ? $this->preparePath($path) : $this->path;
            $pageRange = '';
            $text = null;

            try {
                // first try to use poppler's pdftotext, because this produces more accurate results than the txtwrite device from ghostscript
                if ($page) {
                    $pageRange = '-f ' . $page . ' -l ' . $page . ' ';
                }
                $text = Console::exec(self::getPdftotextCli() . ' ' . $pageRange . escapeshellarg($path) . ' -', null, 120);
            } catch (\Exception $e) {
                // pure ghostscript way
                if ($page) {
                    $pageRange = '-dFirstPage=' . $page . ' -dLastPage=' . $page . ' ';
                }
                $textFile = PIMCORE_SYSTEM_TEMP_DIRECTORY . '/pdf-text-extract-' . uniqid() . '.txt';
                Console::exec(self::getGhostscriptCli() . ' -dBATCH -dNOPAUSE -sDEVICE=txtwrite ' . $pageRange . '-dTextFormat=2 -sOutputFile=' . $textFile . ' ' . escapeshellarg($path), null, 120);

                if (is_file($textFile)) {
                    $text = file_get_contents($textFile);

                    // this is a little bit strange the default option -dTextFormat=3 from ghostscript should return utf-8 but it doesn't
                    // so we use option 2 which returns UCS-2LE and convert it here back to UTF-8 which works fine
                    $text = mb_convert_encoding($text, 'UTF-8', 'UCS-2LE');
                    unlink($textFile);
                }
            }

            return $text;
        } catch (\Exception $e) {
            Logger::error($e);

            return false;
        }
    }
}
