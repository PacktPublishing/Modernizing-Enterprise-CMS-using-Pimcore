<?php

namespace Symfony\Config\Pimcore\Assets\Image;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class ThumbnailsConfig 
{
    private $clipAutoSupport;
    private $autoClearTempFiles;
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function clipAutoSupport($value): self
    {
        $this->clipAutoSupport = $value;
    
        return $this;
    }
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function autoClearTempFiles($value): self
    {
        $this->autoClearTempFiles = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['clip_auto_support'])) {
            $this->clipAutoSupport = $value['clip_auto_support'];
            unset($value['clip_auto_support']);
        }
    
        if (isset($value['auto_clear_temp_files'])) {
            $this->autoClearTempFiles = $value['auto_clear_temp_files'];
            unset($value['auto_clear_temp_files']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->clipAutoSupport) {
            $output['clip_auto_support'] = $this->clipAutoSupport;
        }
        if (null !== $this->autoClearTempFiles) {
            $output['auto_clear_temp_files'] = $this->autoClearTempFiles;
        }
    
        return $output;
    }
    

}
