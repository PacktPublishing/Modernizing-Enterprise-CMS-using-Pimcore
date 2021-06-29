<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Email'.\DIRECTORY_SEPARATOR.'SenderConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Email'.\DIRECTORY_SEPARATOR.'ReturnConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Email'.\DIRECTORY_SEPARATOR.'DebugConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class EmailConfig 
{
    private $sender;
    private $return;
    private $debug;
    private $usespecific;
    
    public function sender(array $value = []): \Symfony\Config\Pimcore\Email\SenderConfig
    {
        if (null === $this->sender) {
            $this->sender = new \Symfony\Config\Pimcore\Email\SenderConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "sender()" has already been initialized. You cannot pass values the second time you call sender().');
        }
    
        return $this->sender;
    }
    
    public function return(array $value = []): \Symfony\Config\Pimcore\Email\ReturnConfig
    {
        if (null === $this->return) {
            $this->return = new \Symfony\Config\Pimcore\Email\ReturnConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "return()" has already been initialized. You cannot pass values the second time you call return().');
        }
    
        return $this->return;
    }
    
    public function debug(array $value = []): \Symfony\Config\Pimcore\Email\DebugConfig
    {
        if (null === $this->debug) {
            $this->debug = new \Symfony\Config\Pimcore\Email\DebugConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "debug()" has already been initialized. You cannot pass values the second time you call debug().');
        }
    
        return $this->debug;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function usespecific($value): self
    {
        $this->usespecific = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['sender'])) {
            $this->sender = new \Symfony\Config\Pimcore\Email\SenderConfig($value['sender']);
            unset($value['sender']);
        }
    
        if (isset($value['return'])) {
            $this->return = new \Symfony\Config\Pimcore\Email\ReturnConfig($value['return']);
            unset($value['return']);
        }
    
        if (isset($value['debug'])) {
            $this->debug = new \Symfony\Config\Pimcore\Email\DebugConfig($value['debug']);
            unset($value['debug']);
        }
    
        if (isset($value['usespecific'])) {
            $this->usespecific = $value['usespecific'];
            unset($value['usespecific']);
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
        if (null !== $this->debug) {
            $output['debug'] = $this->debug->toArray();
        }
        if (null !== $this->usespecific) {
            $output['usespecific'] = $this->usespecific;
        }
    
        return $output;
    }
    

}
