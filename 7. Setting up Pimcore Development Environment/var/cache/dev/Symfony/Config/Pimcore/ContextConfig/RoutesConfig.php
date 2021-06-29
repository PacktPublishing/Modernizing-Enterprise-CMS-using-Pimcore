<?php

namespace Symfony\Config\Pimcore\ContextConfig;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class RoutesConfig 
{
    private $path;
    private $route;
    private $host;
    private $methods;
    
    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function path($value): self
    {
        $this->path = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function route($value): self
    {
        $this->route = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function host($value): self
    {
        $this->host = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function methods($value): self
    {
        $this->methods = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['path'])) {
            $this->path = $value['path'];
            unset($value['path']);
        }
    
        if (isset($value['route'])) {
            $this->route = $value['route'];
            unset($value['route']);
        }
    
        if (isset($value['host'])) {
            $this->host = $value['host'];
            unset($value['host']);
        }
    
        if (isset($value['methods'])) {
            $this->methods = $value['methods'];
            unset($value['methods']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->path) {
            $output['path'] = $this->path;
        }
        if (null !== $this->route) {
            $output['route'] = $this->route;
        }
        if (null !== $this->host) {
            $output['host'] = $this->host;
        }
        if (null !== $this->methods) {
            $output['methods'] = $this->methods;
        }
    
        return $output;
    }
    

}
