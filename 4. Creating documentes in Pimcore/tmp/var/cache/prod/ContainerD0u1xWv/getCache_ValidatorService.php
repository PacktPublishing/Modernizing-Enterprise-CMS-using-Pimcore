<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'cache.validator' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/contracts/Cache/CacheInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Cache/ResettableInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Cache/Traits/AbstractTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Cache/Traits/AbstractAdapterTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/contracts/Cache/CacheTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Cache/Traits/ContractsTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Cache/Adapter/AbstractAdapter.php';

return $this->privates['cache.validator'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('O-gZpvLBMe', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->services['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));