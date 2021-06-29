<?php

namespace Symfony\Config\CmfRouting\Dynamic\Persistence;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class PhpcrConfig 
{
    private $enabled;
    private $managerName;
    private $routeBasepaths;
    private $enableInitializer;
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): self
    {
        $this->enabled = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function managerName($value): self
    {
        $this->managerName = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function routeBasepaths($value): self
    {
        $this->routeBasepaths = $value;
    
        return $this;
    }
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enableInitializer($value): self
    {
        $this->enableInitializer = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['enabled'])) {
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }
    
        if (isset($value['manager_name'])) {
            $this->managerName = $value['manager_name'];
            unset($value['manager_name']);
        }
    
        if (isset($value['route_basepaths'])) {
            $this->routeBasepaths = $value['route_basepaths'];
            unset($value['route_basepaths']);
        }
    
        if (isset($value['enable_initializer'])) {
            $this->enableInitializer = $value['enable_initializer'];
            unset($value['enable_initializer']);
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
        if (null !== $this->managerName) {
            $output['manager_name'] = $this->managerName;
        }
        if (null !== $this->routeBasepaths) {
            $output['route_basepaths'] = $this->routeBasepaths;
        }
        if (null !== $this->enableInitializer) {
            $output['enable_initializer'] = $this->enableInitializer;
        }
    
        return $output;
    }
    

}
