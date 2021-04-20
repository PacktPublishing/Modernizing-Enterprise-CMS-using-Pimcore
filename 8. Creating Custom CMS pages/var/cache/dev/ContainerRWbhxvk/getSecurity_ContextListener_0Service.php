<?php

namespace ContainerRWbhxvk;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_ContextListener_0Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'security.context_listener.0' shared service.
     *
     * @return \Symfony\Component\Security\Http\Firewall\ContextListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Http/Firewall/FirewallListenerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Http/Firewall/AbstractListener.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Http/Firewall/ContextListener.php';

        return $container->privates['security.context_listener.0'] = new \Symfony\Component\Security\Http\Firewall\ContextListener(($container->privates['security.untracked_token_storage'] ?? ($container->privates['security.untracked_token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->services['pimcore_admin.security.user_provider'] ?? ($container->services['pimcore_admin.security.user_provider'] = new \Pimcore\Bundle\AdminBundle\Security\User\UserProvider()));
        }, 1), 'pimcore_admin_webdav', ($container->services['monolog.logger.security'] ?? $container->getMonolog_Logger_SecurityService()), ($container->services['event_dispatcher'] ?? $container->getEventDispatcherService()), ($container->privates['scheb_two_factor.security.authentication.trust_resolver'] ?? $container->getSchebTwoFactor_Security_Authentication_TrustResolverService()), [0 => ($container->services['security.token_storage'] ?? $container->getSecurity_TokenStorageService()), 1 => 'enableUsageTracking']);
    }
}
