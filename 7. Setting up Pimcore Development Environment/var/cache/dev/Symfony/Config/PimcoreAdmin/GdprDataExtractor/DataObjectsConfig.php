<?php

namespace Symfony\Config\PimcoreAdmin\GdprDataExtractor;

require_once __DIR__.\DIRECTORY_SEPARATOR.'DataObjects'.\DIRECTORY_SEPARATOR.'ClassesConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class DataObjectsConfig 
{
    private $classes;
    
    public function classes(array $value = []): \Symfony\Config\PimcoreAdmin\GdprDataExtractor\DataObjects\ClassesConfig
    {
        return $this->classes[] = new \Symfony\Config\PimcoreAdmin\GdprDataExtractor\DataObjects\ClassesConfig($value);
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['classes'])) {
            $this->classes = array_map(function ($v) { return new \Symfony\Config\PimcoreAdmin\GdprDataExtractor\DataObjects\ClassesConfig($v); }, $value['classes']);
            unset($value['classes']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->classes) {
            $output['classes'] = array_map(function ($v) { return $v->toArray(); }, $this->classes);
        }
    
        return $output;
    }
    

}
