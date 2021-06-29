<?php

namespace Symfony\Config\Pimcore\Assets;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class FrontendPrefixesConfig 
{
    private $source;
    private $thumbnail;
    private $thumbnailDeferred;
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function source($value): self
    {
        $this->source = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function thumbnail($value): self
    {
        $this->thumbnail = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function thumbnailDeferred($value): self
    {
        $this->thumbnailDeferred = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['source'])) {
            $this->source = $value['source'];
            unset($value['source']);
        }
    
        if (isset($value['thumbnail'])) {
            $this->thumbnail = $value['thumbnail'];
            unset($value['thumbnail']);
        }
    
        if (isset($value['thumbnail_deferred'])) {
            $this->thumbnailDeferred = $value['thumbnail_deferred'];
            unset($value['thumbnail_deferred']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->source) {
            $output['source'] = $this->source;
        }
        if (null !== $this->thumbnail) {
            $output['thumbnail'] = $this->thumbnail;
        }
        if (null !== $this->thumbnailDeferred) {
            $output['thumbnail_deferred'] = $this->thumbnailDeferred;
        }
    
        return $output;
    }
    

}
