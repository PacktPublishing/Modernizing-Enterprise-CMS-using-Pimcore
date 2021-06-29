<?php

namespace Symfony\Config\Pimcore;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class ModelsConfig 
{
    private $classOverrides;
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function classOverrides(string $name, $value): self
    {
        $this->classOverrides[$name] = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['class_overrides'])) {
            $this->classOverrides = $value['class_overrides'];
            unset($value['class_overrides']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->classOverrides) {
            $output['class_overrides'] = $this->classOverrides;
        }
    
        return $output;
    }
    

}
