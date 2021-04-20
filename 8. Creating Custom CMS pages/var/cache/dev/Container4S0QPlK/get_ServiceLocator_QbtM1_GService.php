<?php

namespace Container4S0QPlK;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_QbtM1_GService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.qbtM1.G' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.qbtM1.G'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'bruteforceProtectionHandler' => ['services', 'pimcore_admin.security.bruteforce_protection_handler', 'getPimcoreAdmin_Security_BruteforceProtectionHandlerService', false],
            'config' => ['services', 'Pimcore\\Config', 'getConfigService', false],
            'csrfProtection' => ['services', 'Pimcore\\Bundle\\AdminBundle\\Security\\CsrfProtectionHandler', 'getCsrfProtectionHandlerService', false],
            'eventDispatcher' => ['services', 'event_dispatcher', 'getEventDispatcherService', false],
        ], [
            'bruteforceProtectionHandler' => '?',
            'config' => 'Pimcore\\Config',
            'csrfProtection' => 'Pimcore\\Bundle\\AdminBundle\\Security\\CsrfProtectionHandler',
            'eventDispatcher' => '?',
        ]);
    }
}
