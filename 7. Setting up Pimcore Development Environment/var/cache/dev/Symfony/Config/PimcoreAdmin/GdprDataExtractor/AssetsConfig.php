<?php

namespace Symfony\Config\PimcoreAdmin\GdprDataExtractor;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Assets'.\DIRECTORY_SEPARATOR.'TypesConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class AssetsConfig 
{
    private $types;
    
    public function types(array $value = []): \Symfony\Config\PimcoreAdmin\GdprDataExtractor\Assets\TypesConfig
    {
        return $this->types[] = new \Symfony\Config\PimcoreAdmin\GdprDataExtractor\Assets\TypesConfig($value);
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['types'])) {
            $this->types = array_map(function ($v) { return new \Symfony\Config\PimcoreAdmin\GdprDataExtractor\Assets\TypesConfig($v); }, $value['types']);
            unset($value['types']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->types) {
            $output['types'] = array_map(function ($v) { return $v->toArray(); }, $this->types);
        }
    
        return $output;
    }
    

}
