<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'pimcore.data_object.grid_column_config.operator.factory.trimmer' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/DataObject/GridColumnConfig/Operator/Factory/OperatorFactoryInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/DataObject/GridColumnConfig/Operator/Factory/DefaultOperatorFactory.php';

return $this->privates['pimcore.data_object.grid_column_config.operator.factory.trimmer'] = new \Pimcore\DataObject\GridColumnConfig\Operator\Factory\DefaultOperatorFactory('Pimcore\\DataObject\\GridColumnConfig\\Operator\\Trimmer');
