<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'scheb_two_factor.provider_handler' shared service.

if ($lazyLoad) {
    return $this->privates['scheb_two_factor.provider_handler'] = $this->createProxy('TwoFactorProviderHandler_3ecff6c', function () {
        return \TwoFactorProviderHandler_3ecff6c::staticProxyConstructor(function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) {
            $wrappedInstance = $this->load('getSchebTwoFactor_ProviderHandlerService.php', false);

            $proxy->setProxyInitializer(null);

            return true;
        });
    });
}

include_once \dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Security/TwoFactor/Handler/AuthenticationHandlerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Security/TwoFactor/Handler/TwoFactorProviderHandler.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Security/Authentication/Token/TwoFactorTokenFactoryInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Security/Authentication/Token/TwoFactorTokenFactory.php';

return new \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler(($this->privates['scheb_two_factor.provider_registry'] ?? $this->load('getSchebTwoFactor_ProviderRegistryService.php')), ($this->privates['scheb_two_factor.default_token_factory'] ?? ($this->privates['scheb_two_factor.default_token_factory'] = new \Scheb\TwoFactorBundle\Security\Authentication\Token\TwoFactorTokenFactory())));
