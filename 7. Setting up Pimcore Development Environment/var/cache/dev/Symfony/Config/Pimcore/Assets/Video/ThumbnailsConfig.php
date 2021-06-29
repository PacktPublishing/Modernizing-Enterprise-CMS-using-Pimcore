<?php

namespace Symfony\Config\Pimcore\Assets\Video;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class ThumbnailsConfig 
{
    private $autoClearTempFiles;
    
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
        if (null !== $this->autoClearTempFiles) {
            $output['auto_clear_temp_files'] = $this->autoClearTempFiles;
        }
    
        return $output;
    }
    

}
