<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'presta_sitemap.dumper' shared service.

include_once \dirname(__DIR__, 4).'/vendor/presta/sitemap-bundle/Service/UrlContainerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/presta/sitemap-bundle/Service/AbstractGenerator.php';
include_once \dirname(__DIR__, 4).'/vendor/presta/sitemap-bundle/Service/DumperInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/presta/sitemap-bundle/Service/Dumper.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Filesystem/Filesystem.php';

$this->services['presta_sitemap.dumper'] = $instance = new \Presta\SitemapBundle\Service\Dumper(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->services['filesystem'] ?? ($this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem())), 'sitemap', 50000);

$instance->setDefaults($this->parameters['presta_sitemap.defaults']);

return $instance;
