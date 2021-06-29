<?php

namespace Symfony\Config\Pimcore\Newsletter;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class SenderConfig 
{
    private $name;
    private $email;
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function name($value): self
    {
        $this->name = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function email($value): self
    {
        $this->email = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['name'])) {
            $this->name = $value['name'];
            unset($value['name']);
        }
    
        if (isset($value['email'])) {
            $this->email = $value['email'];
            unset($value['email']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->name) {
            $output['name'] = $this->name;
        }
        if (null !== $this->email) {
            $output['email'] = $this->email;
        }
    
        return $output;
    }
    

}
