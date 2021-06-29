<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Flysystem'.\DIRECTORY_SEPARATOR.'StorageConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class FlysystemConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $storages;
    
    public function storage(string $name, array $value = []): \Symfony\Config\Flysystem\StorageConfig
    {
        if (!isset($this->storages[$name])) {
            return $this->storages[$name] = new \Symfony\Config\Flysystem\StorageConfig($value);
        }
        if ([] === $value) {
            return $this->storages[$name];
        }
    
        throw new InvalidConfigurationException('The node created by "storage()" has already been initialized. You cannot pass values the second time you call storage().');
    }
    
    public function getExtensionAlias(): string
    {
        return 'flysystem';
    }
            
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['storages'])) {
            $this->storages = array_map(function ($v) { return new \Symfony\Config\Flysystem\StorageConfig($v); }, $value['storages']);
            unset($value['storages']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->storages) {
            $output['storages'] = array_map(function ($v) { return $v->toArray(); }, $this->storages);
        }
    
        return $output;
    }
    

}
