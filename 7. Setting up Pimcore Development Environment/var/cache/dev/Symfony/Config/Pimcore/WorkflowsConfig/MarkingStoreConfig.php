<?php

namespace Symfony\Config\Pimcore\WorkflowsConfig;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class MarkingStoreConfig 
{
    private $type;
    private $arguments;
    private $service;
    
    /**
     * @default null
     * @param ParamConfigurator|'multiple_state'|'single_state'|'state_table'|'data_object_multiple_state'|'data_object_splitted_state' $value
     * @return $this
     */
    public function type($value): self
    {
        $this->type = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function arguments($value): self
    {
        $this->arguments = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function service($value): self
    {
        $this->service = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['type'])) {
            $this->type = $value['type'];
            unset($value['type']);
        }
    
        if (isset($value['arguments'])) {
            $this->arguments = $value['arguments'];
            unset($value['arguments']);
        }
    
        if (isset($value['service'])) {
            $this->service = $value['service'];
            unset($value['service']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->type) {
            $output['type'] = $this->type;
        }
        if (null !== $this->arguments) {
            $output['arguments'] = $this->arguments;
        }
        if (null !== $this->service) {
            $output['service'] = $this->service;
        }
    
        return $output;
    }
    

}
