<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Security'.\DIRECTORY_SEPARATOR.'EncoderFactoriesConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class SecurityConfig 
{
    private $encoderFactories;
    
    public function encoderFactories(string $class, array $value = []): \Symfony\Config\Pimcore\Security\EncoderFactoriesConfig
    {
        if (!isset($this->encoderFactories[$class])) {
            return $this->encoderFactories[$class] = new \Symfony\Config\Pimcore\Security\EncoderFactoriesConfig($value);
        }
        if ([] === $value) {
            return $this->encoderFactories[$class];
        }
    
        throw new InvalidConfigurationException('The node created by "encoderFactories()" has already been initialized. You cannot pass values the second time you call encoderFactories().');
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['encoder_factories'])) {
            $this->encoderFactories = array_map(function ($v) { return new \Symfony\Config\Pimcore\Security\EncoderFactoriesConfig($v); }, $value['encoder_factories']);
            unset($value['encoder_factories']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->encoderFactories) {
            $output['encoder_factories'] = array_map(function ($v) { return $v->toArray(); }, $this->encoderFactories);
        }
    
        return $output;
    }
    

}
