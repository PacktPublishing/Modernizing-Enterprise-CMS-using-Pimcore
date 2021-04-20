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

namespace Pimcore;

use Doctrine\Common\Annotations\AnnotationReader;
use Pimcore\Model\DataObject;
use Pimcore\Model\Document;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\KernelInterface;

class Bootstrap
{
    public static function startup()
    {
        self::setProjectRoot();
        self::bootstrap();
        $kernel = self::kernel();

        return $kernel;
    }

    /**
     * @return KernelInterface
     */
    public static function startupCli()
    {
        // ensure the cli arguments are set
        if (!isset($_SERVER['argv'])) {
            $_SERVER['argv'] = [];
        }

        self::setProjectRoot();

        self::bootstrap();

        $workingDirectory = getcwd();
        chdir(__DIR__);

        // init shell verbosity as 0 - this would normally be handled by the console application,
        // but as we boot the kernel early the kernel initializes this to 3 (verbose) by default
        putenv('SHELL_VERBOSITY=0');
        $_ENV['SHELL_VERBOSITY'] = 0;
        $_SERVER['SHELL_VERBOSITY'] = 0;

        /** @var \Pimcore\Kernel $kernel */
        $kernel = self::kernel();

        if (is_readable($workingDirectory)) {
            chdir($workingDirectory);
        }

        // activate inheritance for cli-scripts
        \Pimcore::unsetAdminMode();
        Document::setHideUnpublished(true);
        DataObject::setHideUnpublished(true);
        DataObject::setGetInheritedValues(true);
        DataObject\Localizedfield::setGetFallbackValues(true);

        // CLI has no memory/time limits
        @ini_set('memory_limit', -1);
        @ini_set('max_execution_time', -1);
        @ini_set('max_input_time', -1);

        // Error reporting is enabled in CLI
        @ini_set('display_errors', 'On');
        @ini_set('display_startup_errors', 'On');

        // Pimcore\Console handles maintenance mode through the AbstractCommand
        $pimcoreConsole = (defined('PIMCORE_CONSOLE') && true === PIMCORE_CONSOLE);
        if (!$pimcoreConsole) {
            // skip if maintenance mode is on and the flag is not set
            if (\Pimcore\Tool\Admin::isInMaintenanceMode() && !in_array('--ignore-maintenance-mode', $_SERVER['argv'])) {
                die("in maintenance mode -> skip\nset the flag --ignore-maintenance-mode to force execution \n");
            }
        }

        return $kernel;
    }

    public static function setProjectRoot()
    {
        // this should already be defined at this point, but we include a fallback for backwards compatibility here
        if (!defined('PIMCORE_PROJECT_ROOT')) {
            define(
                'PIMCORE_PROJECT_ROOT',
                $_SERVER['PIMCORE_PROJECT_ROOT'] ?? $_ENV['PIMCORE_PROJECT_ROOT'] ??
                $_SERVER['REDIRECT_PIMCORE_PROJECT_ROOT'] ?? $_ENV['REDIRECT_PIMCORE_PROJECT_ROOT'] ??
                realpath(__DIR__ . '/../../../..')
            );
        }
    }

    public static function bootstrap()
    {
        if (defined('PIMCORE_PROJECT_ROOT') && file_exists(PIMCORE_PROJECT_ROOT . '/vendor/autoload.php')) {
            // PIMCORE_PROJECT_ROOT is usually always set at this point (self::setProjectRoot()), so it makes sense to check this first
            $loader = include PIMCORE_PROJECT_ROOT . '/vendor/autoload.php';
        } elseif (file_exists(__DIR__ . '/../vendor/autoload.php')) {
            $loader = include __DIR__ . '/../vendor/autoload.php';
        } elseif (file_exists(__DIR__ . '/../../../../vendor/autoload.php')) {
            $loader = include __DIR__ . '/../../../../vendor/autoload.php';
        } else {
            throw new \Exception('Unable to locate autoloader! Pimcore project root not found or invalid, please set/check env variable PIMCORE_PROJECT_ROOT.');
        }

        self::defineConstants();

        /** @var \Composer\Autoload\ClassLoader $loader */
        \Pimcore::setAutoloader($loader);
        self::autoload();

        ini_set('error_log', PIMCORE_PHP_ERROR_LOG);
        ini_set('log_errors', '1');

        // load a startup file if it exists - this is a good place to preconfigure the system
        // before the kernel is loaded - e.g. to set trusted proxies on the request object
        $startupFile = PIMCORE_PROJECT_ROOT . '/config/pimcore/startup.php';
        if (file_exists($startupFile)) {
            include_once $startupFile;
        }

        if (false === in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true)) {
            // see https://github.com/symfony/recipes/blob/master/symfony/framework-bundle/4.2/public/index.php#L15
            if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? false) {
                Request::setTrustedProxies(explode(',', $trustedProxies),
                    Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
            }
            if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? false) {
                Request::setTrustedHosts([$trustedHosts]);
            }
        }
    }

    protected static function prepareEnvVariables()
    {
        (new Dotenv())->bootEnv(PIMCORE_PROJECT_ROOT .'/.env');
    }

    public static function defineConstants()
    {
        self::prepareEnvVariables();

        // load custom constants
        $customConstantsFile = PIMCORE_PROJECT_ROOT . '/config/pimcore/constants.php';
        if (file_exists($customConstantsFile)) {
            include_once $customConstantsFile;
        }

        $resolveConstant = function (string $name, $default, bool $define = true) {
            // return constant if defined
            if (defined($name)) {
                return constant($name);
            }

            $value = $_SERVER[$name] ?? $default;
            if ($define) {
                define($name, $value);
            }

            return $value;
        };

        // basic paths
        $resolveConstant('PIMCORE_COMPOSER_PATH', PIMCORE_PROJECT_ROOT . '/vendor');
        $resolveConstant('PIMCORE_COMPOSER_FILE_PATH', PIMCORE_PROJECT_ROOT);
        $resolveConstant('PIMCORE_PATH', realpath(__DIR__ . '/..'));
        $resolveConstant('PIMCORE_WEB_ROOT', PIMCORE_PROJECT_ROOT . '/public');
        $resolveConstant('PIMCORE_PRIVATE_VAR', PIMCORE_PROJECT_ROOT . '/var');

        // special directories for tests
        // test mode can bei either controlled by a constant or an env variable
        $testMode = (bool)$resolveConstant('PIMCORE_TEST', false, false);
        if ($testMode) {
            // override and initialize directories
            $resolveConstant('PIMCORE_CLASS_DIRECTORY', PIMCORE_PATH . '/tests/_output/var/classes');

            if (!defined('PIMCORE_TEST')) {
                define('PIMCORE_TEST', true);
            }
        }

        // paths relying on basic paths above
        $resolveConstant('PIMCORE_CUSTOM_CONFIGURATION_DIRECTORY', PIMCORE_PROJECT_ROOT . '/config/pimcore');
        $resolveConstant('PIMCORE_CONFIGURATION_DIRECTORY', PIMCORE_PRIVATE_VAR . '/config');
        $resolveConstant('PIMCORE_LOG_DIRECTORY', PIMCORE_PRIVATE_VAR . '/log');
        $resolveConstant('PIMCORE_LOG_FILEOBJECT_DIRECTORY', PIMCORE_PRIVATE_VAR . '/application-logger');
        $resolveConstant('PIMCORE_CACHE_DIRECTORY', PIMCORE_PRIVATE_VAR . '/cache/pimcore');
        $resolveConstant('PIMCORE_SYMFONY_CACHE_DIRECTORY', PIMCORE_PRIVATE_VAR . '/cache');
        $resolveConstant('PIMCORE_CLASS_DIRECTORY', PIMCORE_PRIVATE_VAR . '/classes');
        $resolveConstant('PIMCORE_CUSTOMLAYOUT_DIRECTORY', PIMCORE_CLASS_DIRECTORY . '/customlayouts');
        $resolveConstant('PIMCORE_SYSTEM_TEMP_DIRECTORY', PIMCORE_PRIVATE_VAR . '/tmp');
        $resolveConstant('PIMCORE_LOG_MAIL_PERMANENT', PIMCORE_PRIVATE_VAR . '/email');

        // configure PHP's error logging
        $resolveConstant('PIMCORE_PHP_ERROR_LOG', PIMCORE_LOG_DIRECTORY . '/php.log');
        $resolveConstant('PIMCORE_KERNEL_CLASS', '\App\Kernel');
    }

    public static function autoload()
    {
        $loader = \Pimcore::getAutoloader();

        // tell the autoloader where to find Pimcore's generated class stubs
        // this is primarily necessary for tests and custom class directories, which are not covered in composer.json
        $loader->addPsr4('Pimcore\\Model\\DataObject\\', PIMCORE_CLASS_DIRECTORY . '/DataObject');

        // ignore apiDoc params (see http://apidocjs.com/) as we use apiDoc in webservice
        $apiDocAnnotations = [
            'api', 'apiDefine',
            'apiDeprecated', 'apiDescription', 'apiError',  'apiErrorExample', 'apiExample', 'apiGroup', 'apiHeader',
            'apiHeaderExample', 'apiIgnore', 'apiName', 'apiParam', 'apiParamExample', 'apiPermission', 'apiSampleRequest',
            'apiSuccess', 'apiSuccessExample', 'apiUse', 'apiVersion',
        ];

        foreach ($apiDocAnnotations as $apiDocAnnotation) {
            AnnotationReader::addGlobalIgnoredName($apiDocAnnotation);
        }

        if (defined('PIMCORE_APP_BUNDLE_CLASS_FILE')) {
            require_once PIMCORE_APP_BUNDLE_CLASS_FILE;
        }
    }

    /**
     * @return KernelInterface
     */
    public static function kernel()
    {
        $environment = Config::getEnvironment();

        $debug = (bool) $_SERVER['APP_DEBUG'];
        if ($debug) {
            umask(0000);
            Debug::enable();
            @ini_set('display_errors', 'On');
        }

        if (defined('PIMCORE_KERNEL_CLASS')) {
            $kernelClass = PIMCORE_KERNEL_CLASS;
        } else {
            $kernelClass = '\App\Kernel';
        }

        if (!class_exists($kernelClass)) {
            throw new \InvalidArgumentException(sprintf('Defined Kernel Class %s not found', $kernelClass));
        }

        if (!is_subclass_of($kernelClass, Kernel::class)) {
            throw new \InvalidArgumentException(sprintf('Defined Kernel Class %s needs to extend the \Pimcore\Kernel Class', $kernelClass));
        }

        $kernel = new $kernelClass($environment, $debug);
        \Pimcore::setKernel($kernel);
        $kernel->boot();

        $conf = \Pimcore::getContainer()->getParameter('pimcore.config');

        if (isset($conf['general']['timezone']) && !empty($conf['general']['timezone'])) {
            date_default_timezone_set($conf['general']['timezone']);
        }

        return $kernel;
    }
}
