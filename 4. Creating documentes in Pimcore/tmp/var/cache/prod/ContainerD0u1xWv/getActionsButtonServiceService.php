<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\Workflow\ActionsButtonService' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Workflow/ActionsButtonService.php';

return $this->privates['Pimcore\\Workflow\\ActionsButtonService'] = new \Pimcore\Workflow\ActionsButtonService(($this->services['Pimcore\\Workflow\\Manager'] ?? $this->load('getManagerService.php')));
