<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'console.command.public_alias.Pimcore\Migrations\Command\StatusCommand' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Console/Command/Command.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/migrations/lib/Doctrine/DBAL/Migrations/Tools/Console/Command/AbstractCommand.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/migrations/lib/Doctrine/DBAL/Migrations/Tools/Console/Command/StatusCommand.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-migrations-bundle/Command/MigrationsStatusDoctrineCommand.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Migrations/Command/Traits/PimcoreMigrationsConfiguration.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Migrations/Command/StatusCommand.php';

return $this->services['console.command.public_alias.Pimcore\\Migrations\\Command\\StatusCommand'] = new \Pimcore\Migrations\Command\StatusCommand();
