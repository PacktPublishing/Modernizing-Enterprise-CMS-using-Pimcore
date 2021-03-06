<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'Pimcore\Bundle\CoreBundle\EventListener\WorkflowManagementListener' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/EventListener/WorkflowManagementListener.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Workflow/Registry.php';

return $this->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\WorkflowManagementListener(($this->services['Pimcore\\Workflow\\Manager'] ?? $this->load('getManagerService.php')), ($this->privates['workflow.registry'] ?? ($this->privates['workflow.registry'] = new \Symfony\Component\Workflow\Registry())), ($this->services['Pimcore\\Workflow\\Place\\StatusInfo'] ?? $this->load('getStatusInfoService.php')), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->privates['Pimcore\\Workflow\\ActionsButtonService'] ?? $this->load('getActionsButtonServiceService.php')));
