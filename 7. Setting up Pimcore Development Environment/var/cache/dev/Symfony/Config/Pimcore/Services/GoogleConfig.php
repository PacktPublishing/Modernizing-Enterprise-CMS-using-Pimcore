<?php

namespace Symfony\Config\Pimcore\Services;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class GoogleConfig 
{
    private $clientId;
    private $email;
    private $simpleApiKey;
    private $browserApiKey;
    
    /**
     * This is required for the Google API integrations. Only use a `Service Account´ from the Google Cloud Console.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function clientId($value): self
    {
        $this->clientId = $value;
    
        return $this;
    }
    
    /**
     * Email address of the Google service account
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function email($value): self
    {
        $this->email = $value;
    
        return $this;
    }
    
    /**
     * Server API key
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function simpleApiKey($value): self
    {
        $this->simpleApiKey = $value;
    
        return $this;
    }
    
    /**
     * Browser API key
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function browserApiKey($value): self
    {
        $this->browserApiKey = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['client_id'])) {
            $this->clientId = $value['client_id'];
            unset($value['client_id']);
        }
    
        if (isset($value['email'])) {
            $this->email = $value['email'];
            unset($value['email']);
        }
    
        if (isset($value['simple_api_key'])) {
            $this->simpleApiKey = $value['simple_api_key'];
            unset($value['simple_api_key']);
        }
    
        if (isset($value['browser_api_key'])) {
            $this->browserApiKey = $value['browser_api_key'];
            unset($value['browser_api_key']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->clientId) {
            $output['client_id'] = $this->clientId;
        }
        if (null !== $this->email) {
            $output['email'] = $this->email;
        }
        if (null !== $this->simpleApiKey) {
            $output['simple_api_key'] = $this->simpleApiKey;
        }
        if (null !== $this->browserApiKey) {
            $output['browser_api_key'] = $this->browserApiKey;
        }
    
        return $output;
    }
    

}
