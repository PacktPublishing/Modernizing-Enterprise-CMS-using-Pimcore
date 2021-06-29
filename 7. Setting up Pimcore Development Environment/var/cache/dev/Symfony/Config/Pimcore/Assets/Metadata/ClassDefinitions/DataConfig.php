<?php

namespace Symfony\Config\Pimcore\Assets\Metadata\ClassDefinitions;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class DataConfig 
{
    private $map;
    private $prefixes;
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function map(string $name, $value): self
    {
        $this->map[$name] = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function prefixes($value): self
    {
        $this->prefixes = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['map'])) {
            $this->map = $value['map'];
            unset($value['map']);
        }
    
        if (isset($value['prefixes'])) {
            $this->prefixes = $value['prefixes'];
            unset($value['prefixes']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->map) {
            $output['map'] = $this->map;
        }
        if (null !== $this->prefixes) {
            $output['prefixes'] = $this->prefixes;
        }
    
        return $output;
    }
    

}
