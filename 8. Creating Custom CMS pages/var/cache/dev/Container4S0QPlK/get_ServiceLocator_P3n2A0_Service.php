<?php

namespace Container4S0QPlK;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_P3n2A0_Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.p3n2A0.' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.p3n2A0.'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'modelFactory' => ['services', 'pimcore.model.factory', 'getPimcore_Model_FactoryService', true],
        ], [
            'modelFactory' => '?',
        ]);
    }
}
