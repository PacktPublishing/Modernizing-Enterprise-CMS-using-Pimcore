<?php

namespace Symfony\Config\PimcoreAdmin;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class CsrfProtectionConfig 
{
    private $excludedRoutes;
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function excludedRoutes($value): self
    {
        $this->excludedRoutes = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['excluded_routes'])) {
            $this->excludedRoutes = $value['excluded_routes'];
            unset($value['excluded_routes']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->excludedRoutes) {
            $output['excluded_routes'] = $this->excludedRoutes;
        }
    
        return $output;
    }
    

}
