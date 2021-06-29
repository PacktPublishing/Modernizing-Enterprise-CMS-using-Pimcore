<?php

namespace Symfony\Config\Pimcore;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class HttpclientConfig 
{
    private $adapter;
    private $proxyHost;
    private $proxyPort;
    private $proxyUser;
    private $proxyPass;
    
    /**
     * Set to `Proxy` if proxy server should be used
     * @default 'Socket'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function adapter($value): self
    {
        $this->adapter = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function proxyHost($value): self
    {
        $this->proxyHost = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function proxyPort($value): self
    {
        $this->proxyPort = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function proxyUser($value): self
    {
        $this->proxyUser = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function proxyPass($value): self
    {
        $this->proxyPass = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['adapter'])) {
            $this->adapter = $value['adapter'];
            unset($value['adapter']);
        }
    
        if (isset($value['proxy_host'])) {
            $this->proxyHost = $value['proxy_host'];
            unset($value['proxy_host']);
        }
    
        if (isset($value['proxy_port'])) {
            $this->proxyPort = $value['proxy_port'];
            unset($value['proxy_port']);
        }
    
        if (isset($value['proxy_user'])) {
            $this->proxyUser = $value['proxy_user'];
            unset($value['proxy_user']);
        }
    
        if (isset($value['proxy_pass'])) {
            $this->proxyPass = $value['proxy_pass'];
            unset($value['proxy_pass']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->adapter) {
            $output['adapter'] = $this->adapter;
        }
        if (null !== $this->proxyHost) {
            $output['proxy_host'] = $this->proxyHost;
        }
        if (null !== $this->proxyPort) {
            $output['proxy_port'] = $this->proxyPort;
        }
        if (null !== $this->proxyUser) {
            $output['proxy_user'] = $this->proxyUser;
        }
        if (null !== $this->proxyPass) {
            $output['proxy_pass'] = $this->proxyPass;
        }
    
        return $output;
    }
    

}
