<?php

namespace Symfony\Config\Pimcore\Admin;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Session'.\DIRECTORY_SEPARATOR.'AttributeBagsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class SessionConfig 
{
    private $attributeBags;
    
    public function attributeBags(string $name, array $value = []): \Symfony\Config\Pimcore\Admin\Session\AttributeBagsConfig
    {
        if (!isset($this->attributeBags[$name])) {
            return $this->attributeBags[$name] = new \Symfony\Config\Pimcore\Admin\Session\AttributeBagsConfig($value);
        }
        if ([] === $value) {
            return $this->attributeBags[$name];
        }
    
        throw new InvalidConfigurationException('The node created by "attributeBags()" has already been initialized. You cannot pass values the second time you call attributeBags().');
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['attribute_bags'])) {
            $this->attributeBags = array_map(function ($v) { return new \Symfony\Config\Pimcore\Admin\Session\AttributeBagsConfig($v); }, $value['attribute_bags']);
            unset($value['attribute_bags']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->attributeBags) {
            $output['attribute_bags'] = array_map(function ($v) { return $v->toArray(); }, $this->attributeBags);
        }
    
        return $output;
    }
    

}
