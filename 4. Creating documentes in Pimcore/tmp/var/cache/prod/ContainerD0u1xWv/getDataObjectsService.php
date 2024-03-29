<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\Bundle\AdminBundle\GDPR\DataProvider\DataObjects' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/GDPR/DataProvider/DataProviderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/GDPR/DataProvider/Elements.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/GDPR/DataProvider/DataObjects.php';

return $this->privates['Pimcore\\Bundle\\AdminBundle\\GDPR\\DataProvider\\DataObjects'] = new \Pimcore\Bundle\AdminBundle\GDPR\DataProvider\DataObjects(($this->services['pimcore_admin.webservice.service'] ?? $this->load('getPimcoreAdmin_Webservice_ServiceService.php')), $this->parameters['pimcore.gdpr-data-extrator.dataobjects']);
