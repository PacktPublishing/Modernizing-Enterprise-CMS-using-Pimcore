<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\Bundle\CoreBundle\Command\Targeting\MigrateElementNamesCommand' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Console/Command/Command.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Console/AbstractCommand.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Command/Targeting/MigrateElementNamesCommand.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Document/Tag/NamingStrategy/NamingStrategyInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Document/Tag/NamingStrategy/AbstractNamingStrategy.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Document/Tag/NamingStrategy/NestedNamingStrategy.php';

$this->privates['Pimcore\\Bundle\\CoreBundle\\Command\\Targeting\\MigrateElementNamesCommand'] = $instance = new \Pimcore\Bundle\CoreBundle\Command\Targeting\MigrateElementNamesCommand(($this->services['pimcore.document.tag.naming.strategy'] ?? ($this->services['pimcore.document.tag.naming.strategy'] = new \Pimcore\Document\Tag\NamingStrategy\NestedNamingStrategy())));

$instance->setName('pimcore:targeting:migrate-element-names');

return $instance;
