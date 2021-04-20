<?php

namespace Container4S0QPlK;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTwoFactorListenerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Pimcore\Bundle\AdminBundle\EventListener\TwoFactorListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\AdminBundle\EventListener\TwoFactorListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/EventListener/TwoFactorListener.php';

        $container->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\TwoFactorListener'] = $instance = new \Pimcore\Bundle\AdminBundle\EventListener\TwoFactorListener(($container->privates['scheb_two_factor.provider_registry'] ?? $container->getSchebTwoFactor_ProviderRegistryService()), ($container->privates['scheb_two_factor.provider_preparation_recorder'] ?? $container->getSchebTwoFactor_ProviderPreparationRecorderService()));

        $instance->setLogger(($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService()));

        return $instance;
    }
}
