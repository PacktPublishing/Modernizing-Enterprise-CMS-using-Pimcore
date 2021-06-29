<?php

namespace Symfony\Config\Pimcore\Assets;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class VersionsConfig 
{
    private $days;
    private $steps;
    private $useHardlinks;
    private $disableStackTrace;
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function days($value): self
    {
        $this->days = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function steps($value): self
    {
        $this->steps = $value;
    
        return $this;
    }
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function useHardlinks($value): self
    {
        $this->useHardlinks = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function disableStackTrace($value): self
    {
        $this->disableStackTrace = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['days'])) {
            $this->days = $value['days'];
            unset($value['days']);
        }
    
        if (isset($value['steps'])) {
            $this->steps = $value['steps'];
            unset($value['steps']);
        }
    
        if (isset($value['use_hardlinks'])) {
            $this->useHardlinks = $value['use_hardlinks'];
            unset($value['use_hardlinks']);
        }
    
        if (isset($value['disable_stack_trace'])) {
            $this->disableStackTrace = $value['disable_stack_trace'];
            unset($value['disable_stack_trace']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->days) {
            $output['days'] = $this->days;
        }
        if (null !== $this->steps) {
            $output['steps'] = $this->steps;
        }
        if (null !== $this->useHardlinks) {
            $output['use_hardlinks'] = $this->useHardlinks;
        }
        if (null !== $this->disableStackTrace) {
            $output['disable_stack_trace'] = $this->disableStackTrace;
        }
    
        return $output;
    }
    

}
