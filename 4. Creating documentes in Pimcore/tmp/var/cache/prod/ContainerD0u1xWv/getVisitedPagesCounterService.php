<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\Targeting\DataProvider\VisitedPagesCounter' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/DataProvider/DataProviderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Targeting/DataProvider/VisitedPagesCounter.php';

return $this->privates['Pimcore\\Targeting\\DataProvider\\VisitedPagesCounter'] = new \Pimcore\Targeting\DataProvider\VisitedPagesCounter(($this->privates['Pimcore\\Targeting\\Service\\VisitedPagesCounter'] ?? $this->load('getVisitedPagesCounter2Service.php')));