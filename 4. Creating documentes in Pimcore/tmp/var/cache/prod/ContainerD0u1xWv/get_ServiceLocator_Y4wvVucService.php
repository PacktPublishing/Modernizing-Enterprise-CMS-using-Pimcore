<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.y4wvVuc' shared service.

return $this->privates['.service_locator.y4wvVuc'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'importDataExtractor' => ['privates', 'Pimcore\\Translation\\ImportDataExtractor\\ImportDataExtractorInterface', 'getImportDataExtractorInterfaceService.php', true],
], [
    'importDataExtractor' => 'Pimcore\\Translation\\ImportDataExtractor\\ImportDataExtractorInterface',
]);