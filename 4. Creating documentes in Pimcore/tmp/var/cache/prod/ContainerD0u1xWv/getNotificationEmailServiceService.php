<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'Pimcore\Workflow\Notification\NotificationEmailService' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Workflow/Notification/AbstractNotificationService.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Workflow/Notification/NotificationEmailService.php';

return $this->services['Pimcore\\Workflow\\Notification\\NotificationEmailService'] = new \Pimcore\Workflow\Notification\NotificationEmailService(($this->services['templating'] ?? $this->load('getTemplatingService.php')), ($this->services['router'] ?? $this->getRouterService()), ($this->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $this->getTranslatorInterfaceService()));
