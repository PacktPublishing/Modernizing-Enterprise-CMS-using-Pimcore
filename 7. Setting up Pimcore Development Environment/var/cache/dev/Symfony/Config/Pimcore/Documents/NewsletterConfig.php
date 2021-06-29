<?php

namespace Symfony\Config\Pimcore\Documents;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class NewsletterConfig 
{
    private $defaultUrlPrefix;
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultUrlPrefix($value): self
    {
        $this->defaultUrlPrefix = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['defaultUrlPrefix'])) {
            $this->defaultUrlPrefix = $value['defaultUrlPrefix'];
            unset($value['defaultUrlPrefix']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->defaultUrlPrefix) {
            $output['defaultUrlPrefix'] = $this->defaultUrlPrefix;
        }
    
        return $output;
    }
    

}
