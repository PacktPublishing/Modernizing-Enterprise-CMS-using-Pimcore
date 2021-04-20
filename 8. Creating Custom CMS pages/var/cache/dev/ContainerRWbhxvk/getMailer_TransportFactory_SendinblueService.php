<?php

namespace ContainerRWbhxvk;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMailer_TransportFactory_SendinblueService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'mailer.transport_factory.sendinblue' shared service.
     *
     * @return \Symfony\Component\Mailer\Bridge\Sendinblue\Transport\SendinblueTransportFactory
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Mailer/Transport/TransportFactoryInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Mailer/Transport/AbstractTransportFactory.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Mailer/Bridge/Sendinblue/Transport/SendinblueTransportFactory.php';

        return new \Symfony\Component\Mailer\Bridge\Sendinblue\Transport\SendinblueTransportFactory(($container->services['event_dispatcher'] ?? $container->getEventDispatcherService()), NULL, ($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService()));
    }
}
