<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'pimcore.bundle_locator' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/HttpKernel/BundleLocator/BundleLocatorInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/HttpKernel/BundleLocator/BundleLocator.php';

return $this->services['pimcore.bundle_locator'] = new \Pimcore\HttpKernel\BundleLocator\BundleLocator(($this->services['kernel'] ?? $this->get('kernel', 1)));
