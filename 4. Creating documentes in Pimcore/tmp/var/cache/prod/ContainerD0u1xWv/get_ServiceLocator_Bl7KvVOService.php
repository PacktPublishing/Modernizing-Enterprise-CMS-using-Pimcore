<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.bl7KvVO' shared service.

return $this->privates['.service_locator.bl7KvVO'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'config' => ['services', 'Pimcore\\Config', 'getConfigService', false],
    'csrfProtectionListener' => ['services', 'Pimcore\\Bundle\\AdminBundle\\EventListener\\CsrfProtectionListener', 'getCsrfProtectionListenerService', false],
], [
    'config' => 'Pimcore\\Config',
    'csrfProtectionListener' => 'Pimcore\\Bundle\\AdminBundle\\EventListener\\CsrfProtectionListener',
]);
