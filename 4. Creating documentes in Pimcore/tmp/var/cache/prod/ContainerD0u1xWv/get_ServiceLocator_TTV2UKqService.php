<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.TTV2UKq' shared service.

return $this->privates['.service_locator.TTV2UKq'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'csrfProtectionListener' => ['services', 'Pimcore\\Bundle\\AdminBundle\\EventListener\\CsrfProtectionListener', 'getCsrfProtectionListenerService', false],
], [
    'csrfProtectionListener' => 'Pimcore\\Bundle\\AdminBundle\\EventListener\\CsrfProtectionListener',
]);
