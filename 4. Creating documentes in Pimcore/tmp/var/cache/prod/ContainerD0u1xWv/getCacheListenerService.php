<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\Analytics\Piwik\EventListener\CacheListener' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Analytics/Piwik/EventListener/CacheListener.php';

return $this->privates['Pimcore\\Analytics\\Piwik\\EventListener\\CacheListener'] = new \Pimcore\Analytics\Piwik\EventListener\CacheListener(($this->services['pimcore.cache.core.handler'] ?? $this->getPimcore_Cache_Core_HandlerService()));
