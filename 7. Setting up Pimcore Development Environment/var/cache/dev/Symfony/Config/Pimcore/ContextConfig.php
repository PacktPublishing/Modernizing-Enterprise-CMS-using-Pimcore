<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'ContextConfig'.\DIRECTORY_SEPARATOR.'RoutesConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class ContextConfig 
{
    private $routes;
    
    public function routes(array $value = []): \Symfony\Config\Pimcore\ContextConfig\RoutesConfig
    {
        return $this->routes[] = new \Symfony\Config\Pimcore\ContextConfig\RoutesConfig($value);
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['routes'])) {
            $this->routes = array_map(function ($v) { return new \Symfony\Config\Pimcore\ContextConfig\RoutesConfig($v); }, $value['routes']);
            unset($value['routes']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->routes) {
            $output['routes'] = array_map(function ($v) { return $v->toArray(); }, $this->routes);
        }
    
        return $output;
    }
    

}
