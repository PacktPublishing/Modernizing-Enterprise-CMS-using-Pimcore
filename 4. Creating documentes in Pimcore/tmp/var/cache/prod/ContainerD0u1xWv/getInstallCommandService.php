<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\Bundle\CoreBundle\Command\Bundle\InstallCommand' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Console/Command/Command.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Console/AbstractCommand.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Command/Bundle/AbstractBundleCommand.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Command/Bundle/InstallCommand.php';

$this->privates['Pimcore\\Bundle\\CoreBundle\\Command\\Bundle\\InstallCommand'] = $instance = new \Pimcore\Bundle\CoreBundle\Command\Bundle\InstallCommand(($this->services['Pimcore\\Extension\\Bundle\\PimcoreBundleManager'] ?? $this->getPimcoreBundleManagerService()), ($this->privates['Pimcore\\Bundle\\CoreBundle\\Command\\Bundle\\Helper\\PostStateChange'] ?? $this->load('getPostStateChangeService.php')));

$instance->setName('pimcore:bundle:install');

return $instance;