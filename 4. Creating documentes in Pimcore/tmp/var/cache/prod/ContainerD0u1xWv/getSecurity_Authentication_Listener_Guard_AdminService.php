<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'security.authentication.listener.guard.admin' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Http/Firewall/AbstractListener.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Http/Firewall/ListenerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Http/Firewall/LegacyListenerTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Guard/Firewall/GuardAuthenticationListener.php';

return $this->privates['security.authentication.listener.guard.admin'] = new \Symfony\Component\Security\Guard\Firewall\GuardAuthenticationListener(($this->privates['security.authentication.guard_handler'] ?? $this->load('getSecurity_Authentication_GuardHandlerService.php')), ($this->privates['security.authentication.manager'] ?? $this->getSecurity_Authentication_ManagerService()), 'admin', new RewindableGenerator(function () {
    yield 0 => ($this->services['pimcore_admin.security.admin_authenticator'] ?? $this->load('getPimcoreAdmin_Security_AdminAuthenticatorService.php'));
}, 1), ($this->services['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService()));
