<?php

namespace Symfony\Config\Pimcore\WebProfiler;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Toolbar'.\DIRECTORY_SEPARATOR.'ExcludedRoutesConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class ToolbarConfig 
{
    private $excludedRoutes;
    
    public function excludedRoutes(array $value = []): \Symfony\Config\Pimcore\WebProfiler\Toolbar\ExcludedRoutesConfig
    {
        return $this->excludedRoutes[] = new \Symfony\Config\Pimcore\WebProfiler\Toolbar\ExcludedRoutesConfig($value);
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['excluded_routes'])) {
            $this->excludedRoutes = array_map(function ($v) { return new \Symfony\Config\Pimcore\WebProfiler\Toolbar\ExcludedRoutesConfig($v); }, $value['excluded_routes']);
            unset($value['excluded_routes']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->excludedRoutes) {
            $output['excluded_routes'] = array_map(function ($v) { return $v->toArray(); }, $this->excludedRoutes);
        }
    
        return $output;
    }
    

}
