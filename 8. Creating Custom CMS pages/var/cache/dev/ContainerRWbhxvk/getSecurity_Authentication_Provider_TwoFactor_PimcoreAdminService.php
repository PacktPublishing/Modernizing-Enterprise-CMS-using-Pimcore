<?php

namespace ContainerRWbhxvk;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authentication_Provider_TwoFactor_PimcoreAdminService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'security.authentication.provider.two_factor.pimcore_admin' shared service.
     *
     * @return \Scheb\TwoFactorBundle\Security\Authentication\Provider\TwoFactorAuthenticationProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authentication/Provider/AuthenticationProviderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/Authentication/Provider/TwoFactorAuthenticationProvider.php';

        return $container->privates['security.authentication.provider.two_factor.pimcore_admin'] = new \Scheb\TwoFactorBundle\Security\Authentication\Provider\TwoFactorAuthenticationProvider(($container->privates['security.firewall_config.two_factor.pimcore_admin'] ?? $container->getSecurity_FirewallConfig_TwoFactor_PimcoreAdminService()), ($container->privates['scheb_two_factor.provider_registry'] ?? $container->getSchebTwoFactor_ProviderRegistryService()), NULL, ($container->privates['scheb_two_factor.provider_preparation_recorder'] ?? $container->getSchebTwoFactor_ProviderPreparationRecorderService()));
    }
}
