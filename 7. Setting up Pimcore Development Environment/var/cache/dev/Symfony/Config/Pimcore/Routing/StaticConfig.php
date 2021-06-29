<?php

namespace Symfony\Config\Pimcore\Routing;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class StaticConfig 
{
    private $localeParams;
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function localeParams($value): self
    {
        $this->localeParams = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['locale_params'])) {
            $this->localeParams = $value['locale_params'];
            unset($value['locale_params']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->localeParams) {
            $output['locale_params'] = $this->localeParams;
        }
    
        return $output;
    }
    

}
