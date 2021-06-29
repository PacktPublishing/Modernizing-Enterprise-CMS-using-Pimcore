<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Objects'.\DIRECTORY_SEPARATOR.'VersionsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Objects'.\DIRECTORY_SEPARATOR.'ClassDefinitionsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class ObjectsConfig 
{
    private $ignoreLocalizedQueryFallback;
    private $treePagingLimit;
    private $autoSaveInterval;
    private $versions;
    private $classDefinitions;
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function ignoreLocalizedQueryFallback($value): self
    {
        $this->ignoreLocalizedQueryFallback = $value;
    
        return $this;
    }
    
    /**
     * @default 30
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function treePagingLimit($value): self
    {
        $this->treePagingLimit = $value;
    
        return $this;
    }
    
    /**
     * @default 60
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function autoSaveInterval($value): self
    {
        $this->autoSaveInterval = $value;
    
        return $this;
    }
    
    public function versions(array $value = []): \Symfony\Config\Pimcore\Objects\VersionsConfig
    {
        if (null === $this->versions) {
            $this->versions = new \Symfony\Config\Pimcore\Objects\VersionsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "versions()" has already been initialized. You cannot pass values the second time you call versions().');
        }
    
        return $this->versions;
    }
    
    public function classDefinitions(array $value = []): \Symfony\Config\Pimcore\Objects\ClassDefinitionsConfig
    {
        if (null === $this->classDefinitions) {
            $this->classDefinitions = new \Symfony\Config\Pimcore\Objects\ClassDefinitionsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "classDefinitions()" has already been initialized. You cannot pass values the second time you call classDefinitions().');
        }
    
        return $this->classDefinitions;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['ignore_localized_query_fallback'])) {
            $this->ignoreLocalizedQueryFallback = $value['ignore_localized_query_fallback'];
            unset($value['ignore_localized_query_fallback']);
        }
    
        if (isset($value['tree_paging_limit'])) {
            $this->treePagingLimit = $value['tree_paging_limit'];
            unset($value['tree_paging_limit']);
        }
    
        if (isset($value['auto_save_interval'])) {
            $this->autoSaveInterval = $value['auto_save_interval'];
            unset($value['auto_save_interval']);
        }
    
        if (isset($value['versions'])) {
            $this->versions = new \Symfony\Config\Pimcore\Objects\VersionsConfig($value['versions']);
            unset($value['versions']);
        }
    
        if (isset($value['class_definitions'])) {
            $this->classDefinitions = new \Symfony\Config\Pimcore\Objects\ClassDefinitionsConfig($value['class_definitions']);
            unset($value['class_definitions']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->ignoreLocalizedQueryFallback) {
            $output['ignore_localized_query_fallback'] = $this->ignoreLocalizedQueryFallback;
        }
        if (null !== $this->treePagingLimit) {
            $output['tree_paging_limit'] = $this->treePagingLimit;
        }
        if (null !== $this->autoSaveInterval) {
            $output['auto_save_interval'] = $this->autoSaveInterval;
        }
        if (null !== $this->versions) {
            $output['versions'] = $this->versions->toArray();
        }
        if (null !== $this->classDefinitions) {
            $output['class_definitions'] = $this->classDefinitions->toArray();
        }
    
        return $output;
    }
    

}
