<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'pimcore.custom_report.adapter.factory.sql' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/models/Tool/CustomReport/Adapter/CustomReportAdapterFactoryInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/models/Tool/CustomReport/Adapter/DefaultCustomReportAdapterFactory.php';

return $this->privates['pimcore.custom_report.adapter.factory.sql'] = new \Pimcore\Model\Tool\CustomReport\Adapter\DefaultCustomReportAdapterFactory('Pimcore\\Model\\Tool\\CustomReport\\Adapter\\Sql');
