<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\DataObject\Import\Resolver\Id' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/DataObject/Import/Resolver/ResolverInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/DataObject/Import/Resolver/AbstractResolver.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/DataObject/Import/Resolver/Id.php';

return $this->privates['Pimcore\\DataObject\\Import\\Resolver\\Id'] = new \Pimcore\DataObject\Import\Resolver\Id();
