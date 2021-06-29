<?php

namespace Symfony\Config\Pimcore\WorkflowsConfig\TransitionsConfig\Options\Notes;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class CustomHtmlConfig 
{
    private $position;
    private $service;
    
    /**
     * Set position of custom HTML inside modal (top, center, bottom).
     * @default 'top'
     * @param ParamConfigurator|'top'|'center'|'bottom' $value
     * @return $this
     */
    public function position($value): self
    {
        $this->position = $value;
    
        return $this;
    }
    
    /**
     * Define a custom service for rendering custom HTML within the note modal.
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
    
        if (isset($value['position'])) {
            $this->position = $value['position'];
            unset($value['position']);
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
        if (null !== $this->position) {
            $output['position'] = $this->position;
        }
        if (null !== $this->service) {
            $output['service'] = $this->service;
        }
    
        return $output;
    }
    

}
