<?php

namespace Symfony\Config\Flysystem;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class StorageConfig 
{
    private $adapter;
    private $options;
    private $visibility;
    private $caseSensitive;
    private $disableAsserts;
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function adapter($value): self
    {
        $this->adapter = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function options($value): self
    {
        $this->options = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function visibility($value): self
    {
        $this->visibility = $value;
    
        return $this;
    }
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function caseSensitive($value): self
    {
        $this->caseSensitive = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function disableAsserts($value): self
    {
        $this->disableAsserts = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['adapter'])) {
            $this->adapter = $value['adapter'];
            unset($value['adapter']);
        }
    
        if (isset($value['options'])) {
            $this->options = $value['options'];
            unset($value['options']);
        }
    
        if (isset($value['visibility'])) {
            $this->visibility = $value['visibility'];
            unset($value['visibility']);
        }
    
        if (isset($value['case_sensitive'])) {
            $this->caseSensitive = $value['case_sensitive'];
            unset($value['case_sensitive']);
        }
    
        if (isset($value['disable_asserts'])) {
            $this->disableAsserts = $value['disable_asserts'];
            unset($value['disable_asserts']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->adapter) {
            $output['adapter'] = $this->adapter;
        }
        if (null !== $this->options) {
            $output['options'] = $this->options;
        }
        if (null !== $this->visibility) {
            $output['visibility'] = $this->visibility;
        }
        if (null !== $this->caseSensitive) {
            $output['case_sensitive'] = $this->caseSensitive;
        }
        if (null !== $this->disableAsserts) {
            $output['disable_asserts'] = $this->disableAsserts;
        }
    
        return $output;
    }
    

}
