<?php

namespace Symfony\Config\PimcoreAdmin;

require_once __DIR__.\DIRECTORY_SEPARATOR.'GdprDataExtractor'.\DIRECTORY_SEPARATOR.'DataObjectsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'GdprDataExtractor'.\DIRECTORY_SEPARATOR.'AssetsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class GdprDataExtractorConfig 
{
    private $dataObjects;
    private $assets;
    
    public function dataObjects(array $value = []): \Symfony\Config\PimcoreAdmin\GdprDataExtractor\DataObjectsConfig
    {
        if (null === $this->dataObjects) {
            $this->dataObjects = new \Symfony\Config\PimcoreAdmin\GdprDataExtractor\DataObjectsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "dataObjects()" has already been initialized. You cannot pass values the second time you call dataObjects().');
        }
    
        return $this->dataObjects;
    }
    
    public function assets(array $value = []): \Symfony\Config\PimcoreAdmin\GdprDataExtractor\AssetsConfig
    {
        if (null === $this->assets) {
            $this->assets = new \Symfony\Config\PimcoreAdmin\GdprDataExtractor\AssetsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "assets()" has already been initialized. You cannot pass values the second time you call assets().');
        }
    
        return $this->assets;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['dataObjects'])) {
            $this->dataObjects = new \Symfony\Config\PimcoreAdmin\GdprDataExtractor\DataObjectsConfig($value['dataObjects']);
            unset($value['dataObjects']);
        }
    
        if (isset($value['assets'])) {
            $this->assets = new \Symfony\Config\PimcoreAdmin\GdprDataExtractor\AssetsConfig($value['assets']);
            unset($value['assets']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->dataObjects) {
            $output['dataObjects'] = $this->dataObjects->toArray();
        }
        if (null !== $this->assets) {
            $output['assets'] = $this->assets->toArray();
        }
    
        return $output;
    }
    

}
