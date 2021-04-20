<?php

namespace ContainerRWbhxvk;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getPropertyAccessorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'property_accessor' shared service.
     *
     * @return \Symfony\Component\PropertyAccess\PropertyAccessor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/PropertyAccess/PropertyAccessorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/PropertyAccess/PropertyAccessor.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Cache/Adapter/ArrayAdapter.php';

        return $container->privates['property_accessor'] = new \Symfony\Component\PropertyAccess\PropertyAccessor(3, false, new \Symfony\Component\Cache\Adapter\ArrayAdapter(0, false), true, NULL, NULL);
    }
}
