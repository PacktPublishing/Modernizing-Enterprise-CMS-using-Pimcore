<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'Pimcore\Workflow\ExpressionService' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Workflow/ExpressionService.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Workflow/EventListener/ExpressionLanguage.php';

return $this->services['Pimcore\\Workflow\\ExpressionService'] = new \Pimcore\Workflow\ExpressionService(new \Symfony\Component\Workflow\EventListener\ExpressionLanguage(($this->services['cache.app'] ?? $this->load('getCache_AppService.php'))), ($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()), ($this->privates['scheb_two_factor.security.authentication.trust_resolver'] ?? $this->getSchebTwoFactor_Security_Authentication_TrustResolverService()), ($this->privates['security.role_hierarchy'] ?? $this->getSecurity_RoleHierarchyService()), ($this->services['validator'] ?? $this->load('getValidatorService.php')));
