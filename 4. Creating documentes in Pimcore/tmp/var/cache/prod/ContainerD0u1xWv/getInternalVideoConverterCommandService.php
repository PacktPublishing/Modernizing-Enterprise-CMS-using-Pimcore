<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'console.command.public_alias.Pimcore\Bundle\CoreBundle\Command\InternalVideoConverterCommand' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Console/Command/Command.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Console/AbstractCommand.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Command/InternalVideoConverterCommand.php';

return $this->services['console.command.public_alias.Pimcore\\Bundle\\CoreBundle\\Command\\InternalVideoConverterCommand'] = new \Pimcore\Bundle\CoreBundle\Command\InternalVideoConverterCommand();
