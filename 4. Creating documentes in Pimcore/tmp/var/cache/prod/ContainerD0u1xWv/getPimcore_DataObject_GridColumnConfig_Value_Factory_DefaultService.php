<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'pimcore.data_object.grid_column_config.value.factory.default' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/DataObject/GridColumnConfig/Value/Factory/ValueFactoryInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/DataObject/GridColumnConfig/Value/Factory/DefaultValueFactory.php';

return $this->privates['pimcore.data_object.grid_column_config.value.factory.default'] = new \Pimcore\DataObject\GridColumnConfig\Value\Factory\DefaultValueFactory('Pimcore\\DataObject\\GridColumnConfig\\Value\\DefaultValue', ($this->services['Pimcore\\Localization\\LocaleServiceInterface'] ?? $this->load('getLocaleServiceInterfaceService.php')));
