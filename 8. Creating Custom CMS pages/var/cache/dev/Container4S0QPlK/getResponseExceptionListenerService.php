<?php

namespace Container4S0QPlK;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getResponseExceptionListenerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Pimcore\Bundle\CoreBundle\EventListener\ResponseExceptionListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\ResponseExceptionListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/ResponseExceptionListener.php';

        $container->privates['Pimcore\\Bundle\\CoreBundle\\EventListener\\ResponseExceptionListener'] = $instance = new \Pimcore\Bundle\CoreBundle\EventListener\ResponseExceptionListener(($container->services['Pimcore\\Document\\Renderer\\DocumentRenderer'] ?? $container->load('getDocumentRendererService')), ($container->services['doctrine.dbal.default_connection'] ?? $container->getDoctrine_Dbal_DefaultConnectionService()), ($container->services['Pimcore\\Config'] ?? ($container->services['Pimcore\\Config'] = new \Pimcore\Config())), false);

        $instance->setLogger(($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService()));
        $instance->setPimcoreContextResolver(($container->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $container->getPimcoreContextResolverService()));

        return $instance;
    }
}
