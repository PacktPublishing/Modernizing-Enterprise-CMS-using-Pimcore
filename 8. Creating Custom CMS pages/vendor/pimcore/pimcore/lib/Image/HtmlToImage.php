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

namespace Pimcore\Image;

use Pimcore\Tool\Console;
use Pimcore\Tool\Session;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;

class HtmlToImage
{
    /**
     * @return bool
     */
    public static function isSupported()
    {
        return (bool) self::getWkhtmltoimageBinary();
    }

    /**
     * @return bool
     */
    public static function getWkhtmltoimageBinary()
    {
        foreach (['wkhtmltoimage', 'wkhtmltoimage-amd64'] as $app) {
            $wk2img = \Pimcore\Tool\Console::getExecutable($app);
            if ($wk2img) {
                return $wk2img;
            }
        }

        return false;
    }

    /**
     * @param string $url
     * @param string $outputFile
     * @param int $screenWidth
     * @param string $format
     *
     * @return bool
     */
    public static function convert($url, $outputFile, $screenWidth = 1200, $format = 'png')
    {

        // add parameter pimcore_preview to prevent inclusion of google analytics code, cache, etc.
        $url .= (strpos($url, '?') ? '&' : '?') . 'pimcore_preview=true';

        $options = [
            '--width ' . $screenWidth,
            '--format ' . $format,
        ];

        if (php_sapi_name() !== 'cli') {
            $sessionData = Session::useSession(function (AttributeBagInterface $session) {
                return ['name' => Session::getSessionName(), 'id' => Session::getSessionId()];
            });

            $options[] = sprintf('--cookie %s %s', $sessionData['name'], $sessionData['id']);
        }

        $arguments = ' ' . implode(' ', $options) . ' "' . $url . '" ' . $outputFile;

        // use xvfb if possible
        if ($xvfb = Console::getExecutable('xvfb-run')) {
            $command = $xvfb . ' --auto-servernum --server-args="-screen 0, 1280x1024x24" ' .
                self::getWkhtmltoimageBinary() . ' --use-xserver' . $arguments;
        } else {
            $command = self::getWkhtmltoimageBinary() . $arguments;
        }

        Console::exec($command, PIMCORE_LOG_DIRECTORY . '/wkhtmltoimage.log', 60);

        if (file_exists($outputFile) && filesize($outputFile) > 1000) {
            return true;
        }

        return false;
    }
}