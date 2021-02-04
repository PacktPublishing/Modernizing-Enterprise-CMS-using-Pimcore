<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'session' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpFoundation/Session/SessionInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpFoundation/Session/Session.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpFoundation/Session/Storage/SessionStorageInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpFoundation/Session/Storage/NativeSessionStorage.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpFoundation/Session/SessionBagInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpFoundation/Session/Storage/MetadataBag.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Session/SessionConfiguratorInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Session/SessionConfigurator.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/Session/AdminSessionBagConfigurator.php';

$this->services['session'] = $instance = new \Symfony\Component\HttpFoundation\Session\Session(new \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage($this->parameters['session.storage.options'], NULL, new \Symfony\Component\HttpFoundation\Session\Storage\MetadataBag('_sf2_meta', 0)));

$a = new \Pimcore\Session\SessionConfigurator();
$a->addConfigurator(new \Pimcore\Bundle\AdminBundle\Session\AdminSessionBagConfigurator($this->parameters['pimcore.admin.session.attribute_bags']));

$a->configure($instance);

return $instance;
