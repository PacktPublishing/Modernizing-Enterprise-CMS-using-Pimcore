<?php

namespace ContainerRWbhxvk;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApplicationLoggerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Pimcore\Log\ApplicationLogger' shared autowired service.
     *
     * @return \Pimcore\Log\ApplicationLogger
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Log/ApplicationLogger.php';

        $container->services['Pimcore\\Log\\ApplicationLogger'] = $instance = new \Pimcore\Log\ApplicationLogger();

        $instance->addWriter(($container->services['Pimcore\\Log\\Handler\\ApplicationLoggerDb'] ?? $container->load('getApplicationLoggerDbService')));

        return $instance;
    }
}
