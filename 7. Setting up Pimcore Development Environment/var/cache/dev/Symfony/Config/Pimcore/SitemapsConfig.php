<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Sitemaps'.\DIRECTORY_SEPARATOR.'GeneratorsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class SitemapsConfig 
{
    private $generators;
    
    public function generators(string $name, array $value = []): \Symfony\Config\Pimcore\Sitemaps\GeneratorsConfig
    {
        if (!isset($this->generators[$name])) {
            return $this->generators[$name] = new \Symfony\Config\Pimcore\Sitemaps\GeneratorsConfig($value);
        }
        if ([] === $value) {
            return $this->generators[$name];
        }
    
        throw new InvalidConfigurationException('The node created by "generators()" has already been initialized. You cannot pass values the second time you call generators().');
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['generators'])) {
            $this->generators = array_map(function ($v) { return new \Symfony\Config\Pimcore\Sitemaps\GeneratorsConfig($v); }, $value['generators']);
            unset($value['generators']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->generators) {
            $output['generators'] = array_map(function ($v) { return $v->toArray(); }, $this->generators);
        }
    
        return $output;
    }
    

}
