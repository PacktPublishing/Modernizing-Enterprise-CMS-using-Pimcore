<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'pimcore.data_object.grid_column_config.operator.factory.lf_expander' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/DataObject/GridColumnConfig/Operator/Factory/OperatorFactoryInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/DataObject/GridColumnConfig/Operator/Factory/LFExpanderFactory.php';

return $this->privates['pimcore.data_object.grid_column_config.operator.factory.lf_expander'] = new \Pimcore\DataObject\GridColumnConfig\Operator\Factory\LFExpanderFactory(($this->services['Pimcore\\Localization\\LocaleServiceInterface'] ?? $this->load('getLocaleServiceInterfaceService.php')));
