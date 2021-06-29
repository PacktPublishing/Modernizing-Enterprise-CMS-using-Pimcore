<?php

namespace Symfony\Config\Pimcore\Newsletter;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class DebugConfig 
{
    private $emailAddresses;
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function emailAddresses($value): self
    {
        $this->emailAddresses = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['email_addresses'])) {
            $this->emailAddresses = $value['email_addresses'];
            unset($value['email_addresses']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->emailAddresses) {
            $output['email_addresses'] = $this->emailAddresses;
        }
    
        return $output;
    }
    

}
