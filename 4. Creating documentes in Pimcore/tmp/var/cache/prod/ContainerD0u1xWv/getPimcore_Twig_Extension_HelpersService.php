<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'pimcore.twig.extension.helpers' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/ExtensionInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/AbstractExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Twig/Extension/HelpersExtension.php';

return $this->services['pimcore.twig.extension.helpers'] = new \Pimcore\Twig\Extension\HelpersExtension();
