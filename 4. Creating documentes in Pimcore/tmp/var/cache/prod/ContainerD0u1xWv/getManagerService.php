<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'Pimcore\Workflow\Manager' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Workflow/Manager.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Workflow/Registry.php';

return $this->services['Pimcore\\Workflow\\Manager'] = new \Pimcore\Workflow\Manager(($this->privates['workflow.registry'] ?? ($this->privates['workflow.registry'] = new \Symfony\Component\Workflow\Registry())), ($this->privates['Pimcore\\Workflow\\EventSubscriber\\NotesSubscriber'] ?? $this->load('getNotesSubscriberService.php')), ($this->services['Pimcore\\Workflow\\ExpressionService'] ?? $this->load('getExpressionServiceService.php')), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));