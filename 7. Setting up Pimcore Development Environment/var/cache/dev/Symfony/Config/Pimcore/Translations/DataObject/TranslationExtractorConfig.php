<?php

namespace Symfony\Config\Pimcore\Translations\DataObject;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class TranslationExtractorConfig 
{
    private $attributes;
    
    /**
     * @param ParamConfigurator|list<array|ParamConfigurator> $value
     * @return $this
     */
    public function attributes($value): self
    {
        $this->attributes = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['attributes'])) {
            $this->attributes = $value['attributes'];
            unset($value['attributes']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->attributes) {
            $output['attributes'] = $this->attributes;
        }
    
        return $output;
    }
    

}
