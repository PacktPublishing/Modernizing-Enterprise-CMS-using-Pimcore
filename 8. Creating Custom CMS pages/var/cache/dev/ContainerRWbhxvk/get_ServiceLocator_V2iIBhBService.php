<?php

namespace ContainerRWbhxvk;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_V2iIBhBService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.V2iIBhB' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.V2iIBhB'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'service' => ['privates', 'Pimcore\\Bundle\\AdminBundle\\GDPR\\DataProvider\\Assets', 'getAssetsService', true],
        ], [
            'service' => 'Pimcore\\Bundle\\AdminBundle\\GDPR\\DataProvider\\Assets',
        ]);
    }
}
