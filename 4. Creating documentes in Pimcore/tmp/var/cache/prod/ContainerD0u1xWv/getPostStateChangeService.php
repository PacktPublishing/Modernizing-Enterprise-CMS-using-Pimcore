<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\Bundle\CoreBundle\Command\Bundle\Helper\PostStateChange' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Command/Bundle/Helper/PostStateChange.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Cache/Symfony/CacheClearer.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Tool/AssetsInstaller.php';

return $this->privates['Pimcore\\Bundle\\CoreBundle\\Command\\Bundle\\Helper\\PostStateChange'] = new \Pimcore\Bundle\CoreBundle\Command\Bundle\Helper\PostStateChange(($this->services['Pimcore\\Cache\\Symfony\\CacheClearer'] ?? ($this->services['Pimcore\\Cache\\Symfony\\CacheClearer'] = new \Pimcore\Cache\Symfony\CacheClearer())), ($this->services['Pimcore\\Tool\\AssetsInstaller'] ?? ($this->services['Pimcore\\Tool\\AssetsInstaller'] = new \Pimcore\Tool\AssetsInstaller())), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));
