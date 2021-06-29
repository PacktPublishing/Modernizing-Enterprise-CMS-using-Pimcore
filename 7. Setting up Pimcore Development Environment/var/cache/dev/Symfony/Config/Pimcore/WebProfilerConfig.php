<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'WebProfiler'.\DIRECTORY_SEPARATOR.'ToolbarConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class WebProfilerConfig 
{
    private $toolbar;
    
    public function toolbar(array $value = []): \Symfony\Config\Pimcore\WebProfiler\ToolbarConfig
    {
        if (null === $this->toolbar) {
            $this->toolbar = new \Symfony\Config\Pimcore\WebProfiler\ToolbarConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "toolbar()" has already been initialized. You cannot pass values the second time you call toolbar().');
        }
    
        return $this->toolbar;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['toolbar'])) {
            $this->toolbar = new \Symfony\Config\Pimcore\WebProfiler\ToolbarConfig($value['toolbar']);
            unset($value['toolbar']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->toolbar) {
            $output['toolbar'] = $this->toolbar->toArray();
        }
    
        return $output;
    }
    

}
