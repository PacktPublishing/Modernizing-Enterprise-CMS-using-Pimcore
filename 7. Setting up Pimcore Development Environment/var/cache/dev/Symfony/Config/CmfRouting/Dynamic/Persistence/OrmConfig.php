<?php

namespace Symfony\Config\CmfRouting\Dynamic\Persistence;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class OrmConfig 
{
    private $enabled;
    private $managerName;
    private $routeClass;
    
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
     * @default 'Symfony\\Cmf\\Bundle\\RoutingBundle\\Doctrine\\Orm\\Route'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function routeClass($value): self
    {
        $this->routeClass = $value;
    
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
    
        if (isset($value['route_class'])) {
            $this->routeClass = $value['route_class'];
            unset($value['route_class']);
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
        if (null !== $this->routeClass) {
            $output['route_class'] = $this->routeClass;
        }
    
        return $output;
    }
    

}
