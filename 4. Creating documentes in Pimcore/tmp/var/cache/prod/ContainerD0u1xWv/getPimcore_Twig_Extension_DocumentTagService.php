<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'pimcore.twig.extension.document_tag' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/ExtensionInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/AbstractExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Twig/Extension/DocumentEditableExtension.php';

return $this->services['pimcore.twig.extension.document_tag'] = new \Pimcore\Twig\Extension\DocumentTagExtension(($this->services['Pimcore\\Templating\\Renderer\\EditableRenderer'] ?? $this->load('getEditableRendererService.php')));
