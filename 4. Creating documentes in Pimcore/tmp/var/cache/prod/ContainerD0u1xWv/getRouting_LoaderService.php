<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'routing.loader' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Config/Loader/LoaderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Config/Loader/Loader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Config/Loader/DelegatingLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Routing/DelegatingLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Config/Loader/LoaderResolverInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Config/Loader/LoaderResolver.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Config/Loader/FileLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Loader/XmlFileLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Loader/YamlFileLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Loader/PhpFileLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Loader/GlobFileLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Loader/DirectoryLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Loader/ObjectLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Loader/ContainerLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Routing/LegacyRouteLoaderContainer.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Routing/Loader/BundleRoutingLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Config/BundleConfigLocator.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Routing/Loader/FOSJsRoutingLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Loader/AnnotationClassLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Routing/AnnotatedRouteControllerLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Routing/Loader/AnnotatedRouteControllerLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Loader/AnnotationFileLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Routing/Loader/AnnotationDirectoryLoader.php';

$a = new \Symfony\Component\Config\Loader\LoaderResolver();

$b = ($this->privates['file_locator'] ?? $this->load('getFileLocatorService.php'));
$c = new \Pimcore\Routing\Loader\AnnotatedRouteControllerLoader(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()));

$a->addLoader(new \Symfony\Component\Routing\Loader\XmlFileLoader($b));
$a->addLoader(new \Symfony\Component\Routing\Loader\YamlFileLoader($b));
$a->addLoader(new \Symfony\Component\Routing\Loader\PhpFileLoader($b));
$a->addLoader(new \Symfony\Component\Routing\Loader\GlobFileLoader($b));
$a->addLoader(new \Symfony\Component\Routing\Loader\DirectoryLoader($b));
$a->addLoader(new \Symfony\Component\Routing\Loader\ContainerLoader(new \Symfony\Bundle\FrameworkBundle\Routing\LegacyRouteLoaderContainer($this, new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [], []))));
$a->addLoader(new \Pimcore\Routing\Loader\BundleRoutingLoader(new \Pimcore\Config\BundleConfigLocator(($this->services['kernel'] ?? $this->get('kernel', 1)))));
$a->addLoader(new \Pimcore\Routing\Loader\FOSJsRoutingLoader());
$a->addLoader($c);
$a->addLoader(new \Symfony\Component\Routing\Loader\AnnotationDirectoryLoader($b, $c));
$a->addLoader(new \Symfony\Component\Routing\Loader\AnnotationFileLoader($b, $c));

return $this->services['routing.loader'] = new \Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader($a, [], ($this->privates['.legacy_controller_name_converter'] ?? ($this->privates['.legacy_controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(($this->services['kernel'] ?? $this->get('kernel', 1)), false))));
