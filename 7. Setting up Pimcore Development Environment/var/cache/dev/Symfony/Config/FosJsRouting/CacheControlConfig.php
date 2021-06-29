<?php

namespace Symfony\Config\FosJsRouting;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class CacheControlConfig 
{
    private $public;
    private $expires;
    private $maxage;
    private $smaxage;
    private $vary;
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function public($value): self
    {
        $this->public = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function expires($value): self
    {
        $this->expires = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function maxage($value): self
    {
        $this->maxage = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function smaxage($value): self
    {
        $this->smaxage = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function vary($value): self
    {
        $this->vary = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['public'])) {
            $this->public = $value['public'];
            unset($value['public']);
        }
    
        if (isset($value['expires'])) {
            $this->expires = $value['expires'];
            unset($value['expires']);
        }
    
        if (isset($value['maxage'])) {
            $this->maxage = $value['maxage'];
            unset($value['maxage']);
        }
    
        if (isset($value['smaxage'])) {
            $this->smaxage = $value['smaxage'];
            unset($value['smaxage']);
        }
    
        if (isset($value['vary'])) {
            $this->vary = $value['vary'];
            unset($value['vary']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->public) {
            $output['public'] = $this->public;
        }
        if (null !== $this->expires) {
            $output['expires'] = $this->expires;
        }
        if (null !== $this->maxage) {
            $output['maxage'] = $this->maxage;
        }
        if (null !== $this->smaxage) {
            $output['smaxage'] = $this->smaxage;
        }
        if (null !== $this->vary) {
            $output['vary'] = $this->vary;
        }
    
        return $output;
    }
    

}
