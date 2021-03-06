<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'security.authentication.provider.dao.admin_webdav.two_factor_decorator' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authentication/Provider/AuthenticationProviderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Security/Authentication/Provider/AuthenticationProviderDecorator.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authentication/Provider/UserAuthenticationProvider.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authentication/Provider/DaoAuthenticationProvider.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/User/UserProviderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/Security/User/UserProvider.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/User/UserCheckerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/User/UserChecker.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Security/TwoFactor/AuthenticationContextFactoryInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Security/TwoFactor/AuthenticationContextFactory.php';

return $this->privates['security.authentication.provider.dao.admin_webdav.two_factor_decorator'] = new \Scheb\TwoFactorBundle\Security\Authentication\Provider\AuthenticationProviderDecorator(new \Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider(($this->services['pimcore_admin.security.user_provider'] ?? ($this->services['pimcore_admin.security.user_provider'] = new \Pimcore\Bundle\AdminBundle\Security\User\UserProvider())), ($this->privates['security.user_checker'] ?? ($this->privates['security.user_checker'] = new \Symfony\Component\Security\Core\User\UserChecker())), 'admin_webdav', ($this->privates['pimcore.security.encoder_factory'] ?? $this->load('getPimcore_Security_EncoderFactoryService.php')), true), ($this->privates['scheb_two_factor.authenticated_token_handler'] ?? $this->load('getSchebTwoFactor_AuthenticatedTokenHandlerService.php')), ($this->privates['scheb_two_factor.authentication_context_factory'] ?? ($this->privates['scheb_two_factor.authentication_context_factory'] = new \Scheb\TwoFactorBundle\Security\TwoFactor\AuthenticationContextFactory('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\AuthenticationContext'))), ($this->privates['security.firewall.map'] ?? $this->getSecurity_Firewall_MapService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
