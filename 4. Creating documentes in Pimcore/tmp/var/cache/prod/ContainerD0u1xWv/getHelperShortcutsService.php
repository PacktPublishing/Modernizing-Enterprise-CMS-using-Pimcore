<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\Templating\HelperBroker\HelperShortcuts' shared autowired service.

@trigger_error('The "Pimcore\\Templating\\HelperBroker\\HelperShortcuts" service is deprecated and will be removed in Pimcore 7', E_USER_DEPRECATED);

return new \Pimcore\Templating\HelperBroker\HelperShortcuts(($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()));