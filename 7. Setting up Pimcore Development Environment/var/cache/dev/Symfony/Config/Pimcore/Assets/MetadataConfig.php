<?php

namespace Symfony\Config\Pimcore\Assets;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Metadata'.\DIRECTORY_SEPARATOR.'ClassDefinitionsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class MetadataConfig 
{
    private $classDefinitions;
    
    public function classDefinitions(array $value = []): \Symfony\Config\Pimcore\Assets\Metadata\ClassDefinitionsConfig
    {
        if (null === $this->classDefinitions) {
            $this->classDefinitions = new \Symfony\Config\Pimcore\Assets\Metadata\ClassDefinitionsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "classDefinitions()" has already been initialized. You cannot pass values the second time you call classDefinitions().');
        }
    
        return $this->classDefinitions;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['class_definitions'])) {
            $this->classDefinitions = new \Symfony\Config\Pimcore\Assets\Metadata\ClassDefinitionsConfig($value['class_definitions']);
            unset($value['class_definitions']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->classDefinitions) {
            $output['class_definitions'] = $this->classDefinitions->toArray();
        }
    
        return $output;
    }
    

}
