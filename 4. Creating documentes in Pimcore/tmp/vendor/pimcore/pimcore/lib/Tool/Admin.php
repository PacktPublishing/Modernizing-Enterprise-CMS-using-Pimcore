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

namespace Pimcore\Tool;

use Pimcore\Bundle\AdminBundle\Security\User\TokenStorageUserResolver;
use Pimcore\Event\SystemEvents;
use Pimcore\File;
use Pimcore\Model\User;
use Pimcore\Tool\Text\Csv;

class Admin
{
    /**
     * Finds the translation file for a given language
     *
     * @static
     *
     * @param  string $language
     *
     * @return string
     */
    public static function getLanguageFile($language)
    {
        $baseResource = \Pimcore::getContainer()->getParameter('pimcore.admin.translations.path');
        $languageFile = \Pimcore::getKernel()->locateResource($baseResource . '/' . $language . '.json');

        return $languageFile;
    }

    /**
     * finds installed languages
     *
     * @static
     *
     * @return array
     */
    public static function getLanguages()
    {
        $baseResource = \Pimcore::getContainer()->getParameter('pimcore.admin.translations.path');
        $languageDir = \Pimcore::getKernel()->locateResource($baseResource);
        $adminLang = \Pimcore::getContainer()->getParameter('pimcore_admin.admin_languages');
        $appDefaultPath = \Pimcore::getContainer()->getParameter('translator.default_path');

        $languages = [];
        $languageDirs = [$languageDir, $appDefaultPath];
        foreach ($languageDirs as $filesDir) {
            if (is_dir($filesDir)) {
                $files = scandir($filesDir);
                foreach ($files as $file) {
                    if (is_file($filesDir . '/' . $file)) {
                        $parts = explode('.', $file);

                        $languageCode = $parts[0];
                        if ($parts[0] === 'admin') {
                            // this is for the app specific translations
                            $languageCode = $parts[1];
                        }

                        if (($adminLang != null && in_array($languageCode, array_values($adminLang))) || $adminLang == null) {
                            if ($parts[1] === 'json' || $parts[0] === 'admin') {
                                if (\Pimcore::getContainer()->get('pimcore.locale')->isLocale($languageCode)) {
                                    $languages[] = $languageCode;
                                }
                            }
                        }
                    }
                }
            }
        }

        return $languages;
    }

    /**
     * @static
     *
     * @param string $scriptContent
     * @param bool $asUrl
     *
     * @return mixed
     */
    public static function getMinimizedScriptPath($scriptContent, bool $asUrl = true)
    {
        $scriptPath = PIMCORE_SYSTEM_TEMP_DIRECTORY . '/minified_javascript_core_'.md5($scriptContent).'.js';

        if (!is_file($scriptPath)) {
            File::put($scriptPath, $scriptContent);
        }

        $params = [
            'scripts' => basename($scriptPath),
            '_dc' => \Pimcore\Version::getRevision(),
        ];

        if ($asUrl) {
            @trigger_error(
                'Calling Pimcore\Tool::getMinimizedScriptPath with $asUrl true is deprecated and will be removed with Pimcore 7.0',
                E_USER_DEPRECATED
            );

            return '/admin/misc/script-proxy?'.array_toquerystring($params);
        }

        return $params;
    }

    /**
     * @param string $file
     *
     * @return \stdClass
     */
    public static function determineCsvDialect($file)
    {

        // minimum 10 lines, to be sure take more
        $sample = '';
        for ($i = 0; $i < 10; $i++) {
            $sample .= implode('', array_slice(file($file), 0, 11)); // grab 20 lines
        }

        try {
            $sniffer = new Csv();
            $dialect = $sniffer->detect($sample);
        } catch (\Exception $e) {
            // use default settings
            $dialect = new \stdClass();
            $dialect->delimiter = ';';
            $dialect->quotechar = '"';
            $dialect->escapechar = '\\';
        }

        // validity check
        if (!in_array($dialect->delimiter, [';', ',', "\t", '|', ':'])) {
            $dialect->delimiter = ';';
        }

        return $dialect;
    }

    /**
     * @static
     *
     * @return string
     */
    public static function getMaintenanceModeFile()
    {
        return PIMCORE_CONFIGURATION_DIRECTORY . '/maintenance.php';
    }

    public static function getMaintenanceModeScheduleLoginFile()
    {
        return PIMCORE_CONFIGURATION_DIRECTORY . '/maintenance-schedule-login.php';
    }

    /**
     * @param string|null $sessionId
     *
     * @throws \Exception
     */
    public static function activateMaintenanceMode($sessionId)
    {
        if (empty($sessionId)) {
            $sessionId = Session::getSessionId();
        }

        if (empty($sessionId)) {
            throw new \Exception("It's not possible to activate the maintenance mode without a session-id");
        }

        File::putPhpFile(self::getMaintenanceModeFile(), to_php_data_file_format([
            'sessionId' => $sessionId,
        ]));

        @chmod(self::getMaintenanceModeFile(), 0666); // so it can be removed also via FTP, ...

        \Pimcore::getEventDispatcher()->dispatch(SystemEvents::MAINTENANCE_MODE_ACTIVATE);
    }

    /**
     * @static
     */
    public static function deactivateMaintenanceMode()
    {
        @unlink(self::getMaintenanceModeFile());

        \Pimcore::getEventDispatcher()->dispatch(SystemEvents::MAINTENANCE_MODE_DEACTIVATE);
    }

    /**
     * @static
     *
     * @return bool
     */
    public static function isInMaintenanceMode()
    {
        $file = self::getMaintenanceModeFile();

        if (is_file($file)) {
            $conf = include($file);
            if (isset($conf['sessionId'])) {
                return true;
            } else {
                @unlink($file);
            }
        }

        return false;
    }

    public static function isMaintenanceModeScheduledForLogin(): bool
    {
        $file = self::getMaintenanceModeScheduleLoginFile();

        if (is_file($file)) {
            $conf = include($file);
            if (isset($conf['schedule']) && $conf['schedule']) {
                return true;
            } else {
                @unlink($file);
            }
        }

        return false;
    }

    public static function scheduleMaintenanceModeOnLogin()
    {
        File::putPhpFile(self::getMaintenanceModeScheduleLoginFile(), to_php_data_file_format([
            'schedule' => true,
        ]));

        @chmod(self::getMaintenanceModeScheduleLoginFile(), 0666); // so it can be removed also via FTP, ...

        \Pimcore::getEventDispatcher()->dispatch(SystemEvents::MAINTENANCE_MODE_SCHEDULE_LOGIN);
    }

    public static function unscheduleMaintenanceModeOnLogin()
    {
        @unlink(self::getMaintenanceModeScheduleLoginFile());

        \Pimcore::getEventDispatcher()->dispatch(SystemEvents::MAINTENANCE_MODE_UNSCHEDULE_LOGIN);
    }

    /**
     * @static
     *
     * @return \Pimcore\Model\User|null
     */
    public static function getCurrentUser()
    {
        return \Pimcore::getContainer()
            ->get(TokenStorageUserResolver::class)
            ->getUser();
    }

    /**
     * @return true if in EXT JS5 mode
     */
    public static function isExtJS6()
    {
        return true;
    }

    /**
     * @param User $user
     * @param string|array $languages
     * @param bool $returnLanguageArray
     *
     * @return string|array
     */
    public static function reorderWebsiteLanguages($user, $languages, $returnLanguageArray = false)
    {
        if (!is_array($languages)) {
            $languages = explode(',', $languages);
        }

        $contentLanguages = $user->getContentLanguages();
        if ($contentLanguages) {
            $contentLanguages = array_intersect($contentLanguages, $languages);
            $newLanguages = array_diff($languages, $contentLanguages);
            $languages = array_merge($contentLanguages, $newLanguages);
        }

        if (in_array('default', $languages)) {
            $languages = array_diff($languages, ['default']);
            array_unshift($languages, 'default');
        }
        if ($returnLanguageArray) {
            return $languages;
        }

        return implode(',', $languages);
    }
}
