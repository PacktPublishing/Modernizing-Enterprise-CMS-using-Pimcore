<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'Pimcore\Extension\Document\Areabrick\AreabrickManagerInterface' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Extension/Document/Areabrick/AreabrickManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Extension/Document/Areabrick/AreabrickManager.php';

return $this->services['Pimcore\\Extension\\Document\\Areabrick\\AreabrickManagerInterface'] = new \Pimcore\Extension\Document\Areabrick\AreabrickManager(($this->services['Pimcore\\Extension\\Config'] ?? $this->get('Pimcore\\Extension\\Config', 1)), new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [], []));
