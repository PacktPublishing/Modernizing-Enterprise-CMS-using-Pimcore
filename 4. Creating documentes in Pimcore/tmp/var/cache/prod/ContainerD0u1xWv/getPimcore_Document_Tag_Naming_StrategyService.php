<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'pimcore.document.tag.naming.strategy' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Document/Tag/NamingStrategy/NamingStrategyInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Document/Tag/NamingStrategy/AbstractNamingStrategy.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Document/Tag/NamingStrategy/NestedNamingStrategy.php';

return $this->services['pimcore.document.tag.naming.strategy'] = new \Pimcore\Document\Tag\NamingStrategy\NestedNamingStrategy();
