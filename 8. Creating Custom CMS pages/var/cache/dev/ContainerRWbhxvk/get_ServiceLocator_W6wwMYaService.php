<?php

namespace ContainerRWbhxvk;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_W6wwMYaService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.W6wwMYa' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.W6wwMYa'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'documentRouteHandler' => ['privates', 'Pimcore\\Routing\\Dynamic\\DocumentRouteHandler', 'getDocumentRouteHandlerService', false],
            'eventDispatcher' => ['services', 'event_dispatcher', 'getEventDispatcherService', false],
        ], [
            'documentRouteHandler' => 'Pimcore\\Routing\\Dynamic\\DocumentRouteHandler',
            'eventDispatcher' => '?',
        ]);
    }
}
