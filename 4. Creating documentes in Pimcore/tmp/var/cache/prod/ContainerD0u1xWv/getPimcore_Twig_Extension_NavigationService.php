<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'pimcore.twig.extension.navigation' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/ExtensionInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/AbstractExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Twig/Extension/NavigationExtension.php';

return $this->services['pimcore.twig.extension.navigation'] = new \Pimcore\Twig\Extension\NavigationExtension(($this->services['pimcore.templating.view_helper.navigation'] ?? $this->load('getPimcore_Templating_ViewHelper_NavigationService.php')));
