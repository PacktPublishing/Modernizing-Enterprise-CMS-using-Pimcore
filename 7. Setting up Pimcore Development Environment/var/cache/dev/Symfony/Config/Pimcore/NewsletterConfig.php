<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Newsletter'.\DIRECTORY_SEPARATOR.'SenderConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Newsletter'.\DIRECTORY_SEPARATOR.'ReturnConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Newsletter'.\DIRECTORY_SEPARATOR.'DebugConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class NewsletterConfig 
{
    private $sender;
    private $return;
    private $method;
    private $debug;
    private $useSpecific;
    private $sourceAdapters;
    
    public function sender(array $value = []): \Symfony\Config\Pimcore\Newsletter\SenderConfig
    {
        if (null === $this->sender) {
            $this->sender = new \Symfony\Config\Pimcore\Newsletter\SenderConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "sender()" has already been initialized. You cannot pass values the second time you call sender().');
        }
    
        return $this->sender;
    }
    
    public function return(array $value = []): \Symfony\Config\Pimcore\Newsletter\ReturnConfig
    {
        if (null === $this->return) {
            $this->return = new \Symfony\Config\Pimcore\Newsletter\ReturnConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "return()" has already been initialized. You cannot pass values the second time you call return().');
        }
    
        return $this->return;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function method($value): self
    {
        $this->method = $value;
    
        return $this;
    }
    
    public function debug(array $value = []): \Symfony\Config\Pimcore\Newsletter\DebugConfig
    {
        if (null === $this->debug) {
            $this->debug = new \Symfony\Config\Pimcore\Newsletter\DebugConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "debug()" has already been initialized. You cannot pass values the second time you call debug().');
        }
    
        return $this->debug;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function useSpecific($value): self
    {
        $this->useSpecific = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function sourceAdapters(string $name, $value): self
    {
        $this->sourceAdapters[$name] = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['sender'])) {
            $this->sender = new \Symfony\Config\Pimcore\Newsletter\SenderConfig($value['sender']);
            unset($value['sender']);
        }
    
        if (isset($value['return'])) {
            $this->return = new \Symfony\Config\Pimcore\Newsletter\ReturnConfig($value['return']);
            unset($value['return']);
        }
    
        if (isset($value['method'])) {
            $this->method = $value['method'];
            unset($value['method']);
        }
    
        if (isset($value['debug'])) {
            $this->debug = new \Symfony\Config\Pimcore\Newsletter\DebugConfig($value['debug']);
            unset($value['debug']);
        }
    
        if (isset($value['use_specific'])) {
            $this->useSpecific = $value['use_specific'];
            unset($value['use_specific']);
        }
    
        if (isset($value['source_adapters'])) {
            $this->sourceAdapters = $value['source_adapters'];
            unset($value['source_adapters']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->sender) {
            $output['sender'] = $this->sender->toArray();
        }
        if (null !== $this->return) {
            $output['return'] = $this->return->toArray();
        }
        if (null !== $this->method) {
            $output['method'] = $this->method;
        }
        if (null !== $this->debug) {
            $output['debug'] = $this->debug->toArray();
        }
        if (null !== $this->useSpecific) {
            $output['use_specific'] = $this->useSpecific;
        }
        if (null !== $this->sourceAdapters) {
            $output['source_adapters'] = $this->sourceAdapters;
        }
    
        return $output;
    }
    

}
