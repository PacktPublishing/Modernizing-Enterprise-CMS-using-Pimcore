<?php

namespace Symfony\Config\Pimcore\Translations;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class DebuggingConfig 
{
    private $enabled;
    private $parameter;
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): self
    {
        $this->enabled = $value;
    
        return $this;
    }
    
    /**
     * @default 'pimcore_debug_translations'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function parameter($value): self
    {
        $this->parameter = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['enabled'])) {
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }
    
        if (isset($value['parameter'])) {
            $this->parameter = $value['parameter'];
            unset($value['parameter']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->enabled) {
            $output['enabled'] = $this->enabled;
        }
        if (null !== $this->parameter) {
            $output['parameter'] = $this->parameter;
        }
    
        return $output;
    }
    

}
