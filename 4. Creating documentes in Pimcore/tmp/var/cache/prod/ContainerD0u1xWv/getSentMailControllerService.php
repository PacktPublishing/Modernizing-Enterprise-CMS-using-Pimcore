<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'Pimcore\Bundle\AdminBundle\Controller\GDPR\SentMailController' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/DependencyInjection/ContainerAwareInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/DependencyInjection/ContainerAwareTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Controller/ControllerTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Controller/Controller.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Controller/Controller.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/DoubleAuthenticationControllerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/AdminControllerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/AdminController.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/GDPR/SentMailController.php';

return $this->services['Pimcore\\Bundle\\AdminBundle\\Controller\\GDPR\\SentMailController'] = new \Pimcore\Bundle\AdminBundle\Controller\GDPR\SentMailController();
