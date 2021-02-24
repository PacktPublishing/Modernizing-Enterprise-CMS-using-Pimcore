<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'pimcore_admin.security.admin_authenticator' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Http/EntryPoint/AuthenticationEntryPointInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Guard/AuthenticatorInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Guard/AbstractGuardAuthenticator.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/Security/Guard/AdminAuthenticator.php';

$this->services['pimcore_admin.security.admin_authenticator'] = $instance = new \Pimcore\Bundle\AdminBundle\Security\Guard\AdminAuthenticator(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->services['router'] ?? $this->getRouterService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $this->getTranslatorInterfaceService()), ($this->privates['security.http_utils'] ?? $this->load('getSecurity_HttpUtilsService.php')), ($this->services['pimcore_admin.security.bruteforce_protection_handler'] ?? $this->getPimcoreAdmin_Security_BruteforceProtectionHandlerService()));

$a = ($this->services['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService());

$instance->setLogger($a);
$instance->setLogger($a);

return $instance;
