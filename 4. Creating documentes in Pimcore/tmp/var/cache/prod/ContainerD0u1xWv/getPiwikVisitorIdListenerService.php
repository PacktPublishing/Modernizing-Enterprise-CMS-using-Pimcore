<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\Targeting\EventListener\PiwikVisitorIdListener' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/EventListener/PiwikVisitorIdListener.php';

return $this->privates['Pimcore\\Targeting\\EventListener\\PiwikVisitorIdListener'] = new \Pimcore\Targeting\EventListener\PiwikVisitorIdListener(($this->privates['Pimcore\\Targeting\\EventListener\\TargetingListener'] ?? $this->getTargetingListenerService()));