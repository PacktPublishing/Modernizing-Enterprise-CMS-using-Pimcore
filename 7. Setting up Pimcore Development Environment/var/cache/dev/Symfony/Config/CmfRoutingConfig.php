<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'CmfRouting'.\DIRECTORY_SEPARATOR.'ChainConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'CmfRouting'.\DIRECTORY_SEPARATOR.'DynamicConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class CmfRoutingConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $chain;
    private $dynamic;
    
    public function chain(array $value = []): \Symfony\Config\CmfRouting\ChainConfig
    {
        if (null === $this->chain) {
            $this->chain = new \Symfony\Config\CmfRouting\ChainConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "chain()" has already been initialized. You cannot pass values the second time you call chain().');
        }
    
        return $this->chain;
    }
    
    public function dynamic(array $value = []): \Symfony\Config\CmfRouting\DynamicConfig
    {
        if (null === $this->dynamic) {
            $this->dynamic = new \Symfony\Config\CmfRouting\DynamicConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "dynamic()" has already been initialized. You cannot pass values the second time you call dynamic().');
        }
    
        return $this->dynamic;
    }
    
    public function getExtensionAlias(): string
    {
        return 'cmf_routing';
    }
            
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['chain'])) {
            $this->chain = new \Symfony\Config\CmfRouting\ChainConfig($value['chain']);
            unset($value['chain']);
        }
    
        if (isset($value['dynamic'])) {
            $this->dynamic = new \Symfony\Config\CmfRouting\DynamicConfig($value['dynamic']);
            unset($value['dynamic']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->chain) {
            $output['chain'] = $this->chain->toArray();
        }
        if (null !== $this->dynamic) {
            $output['dynamic'] = $this->dynamic->toArray();
        }
    
        return $output;
    }
    

}
