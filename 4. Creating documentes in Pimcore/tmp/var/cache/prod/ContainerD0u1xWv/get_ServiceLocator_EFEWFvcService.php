<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.eFEWFvc' shared service.

return $this->privates['.service_locator.eFEWFvc'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'eventDispatcher' => ['services', 'event_dispatcher', 'getEventDispatcherService', false],
    'gridHelperService' => ['privates', 'Pimcore\\Bundle\\AdminBundle\\Helper\\GridHelperService', 'getGridHelperServiceService.php', true],
], [
    'eventDispatcher' => '?',
    'gridHelperService' => 'Pimcore\\Bundle\\AdminBundle\\Helper\\GridHelperService',
]);
