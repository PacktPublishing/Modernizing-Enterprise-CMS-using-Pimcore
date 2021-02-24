<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'Pimcore\Log\ApplicationLogger' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Log/ApplicationLogger.php';

$this->services['Pimcore\\Log\\ApplicationLogger'] = $instance = new \Pimcore\Log\ApplicationLogger();

$instance->addWriter(($this->services['Pimcore\\Log\\Handler\\ApplicationLoggerDb'] ?? $this->load('getApplicationLoggerDbService.php')));

return $instance;
