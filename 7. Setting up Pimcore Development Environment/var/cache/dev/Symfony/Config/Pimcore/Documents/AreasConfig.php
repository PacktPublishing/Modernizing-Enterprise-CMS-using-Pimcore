<?php

namespace Symfony\Config\Pimcore\Documents;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class AreasConfig 
{
    private $autoload;
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function autoload($value): self
    {
        $this->autoload = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['autoload'])) {
            $this->autoload = $value['autoload'];
            unset($value['autoload']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->autoload) {
            $output['autoload'] = $this->autoload;
        }
    
        return $output;
    }
    

}
