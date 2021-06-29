<?php

namespace Symfony\Config\PimcoreAdmin\GdprDataExtractor\DataObjects;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class ClassesConfig 
{
    private $include;
    private $allowDelete;
    private $includedRelations;
    
    /**
     * Set if class should be considered in export.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function include($value): self
    {
        $this->include = $value;
    
        return $this;
    }
    
    /**
     * Allow delete of objects directly in preview grid.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function allowDelete($value): self
    {
        $this->allowDelete = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function includedRelations($value): self
    {
        $this->includedRelations = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['include'])) {
            $this->include = $value['include'];
            unset($value['include']);
        }
    
        if (isset($value['allowDelete'])) {
            $this->allowDelete = $value['allowDelete'];
            unset($value['allowDelete']);
        }
    
        if (isset($value['includedRelations'])) {
            $this->includedRelations = $value['includedRelations'];
            unset($value['includedRelations']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->include) {
            $output['include'] = $this->include;
        }
        if (null !== $this->allowDelete) {
            $output['allowDelete'] = $this->allowDelete;
        }
        if (null !== $this->includedRelations) {
            $output['includedRelations'] = $this->includedRelations;
        }
    
        return $output;
    }
    

}
