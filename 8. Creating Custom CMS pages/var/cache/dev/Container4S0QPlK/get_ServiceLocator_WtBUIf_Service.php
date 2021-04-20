<?php

namespace Container4S0QPlK;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_WtBUIf_Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.wtBUIf.' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.wtBUIf.'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'redirectHandler' => ['privates', 'Pimcore\\Routing\\RedirectHandler', 'getRedirectHandlerService', false],
        ], [
            'redirectHandler' => 'Pimcore\\Routing\\RedirectHandler',
        ]);
    }
}
