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

namespace Pimcore\Document;

use Pimcore\File;

abstract class Adapter
{
    /**
     * @var array
     */
    protected $tmpFiles = [];

    /**
     * @param string $path
     *
     * @return string
     */
    protected function preparePath($path)
    {
        if (!stream_is_local($path)) {
            // gs is only able to deal with local files
            // if your're using custom stream wrappers this wouldn't work, so we create a temp. local copy
            $tmpFilePath = PIMCORE_SYSTEM_TEMP_DIRECTORY . '/imagick-tmp-' . uniqid() . '.' . File::getFileExtension($path);
            copy($path, $tmpFilePath);
            $path = $tmpFilePath;
            $this->tmpFiles[] = $path;
        }

        return $path;
    }

    protected function removeTmpFiles()
    {
        // remove tmp files
        if (!empty($this->tmpFiles)) {
            foreach ($this->tmpFiles as $tmpFile) {
                if (file_exists($tmpFile)) {
                    unlink($tmpFile);
                }
            }
        }
    }

    public function __destruct()
    {
        $this->removeTmpFiles();
    }

    abstract public function load($path);

    abstract public function saveImage($path, $page = 1, $resolution = 200);

    /**
     * @param string|null $path
     *
     * @return null|string
     *
     * @throws \Exception
     */
    abstract public function getPdf($path = null);

    /**
     * @param string $fileType
     *
     * @return bool
     */
    abstract public function isFileTypeSupported($fileType);

    /**
     * @return int
     *
     * @throws \Exception
     */
    abstract public function getPageCount();

    /**
     * @param int|null $page
     * @param string|null $path
     *
     * @return bool|string
     */
    abstract public function getText($page, $path);
}
