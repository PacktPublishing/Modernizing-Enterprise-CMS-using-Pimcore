<?php

namespace Symfony\Config\Pimcore\WorkflowsConfig\TransitionsConfig\Options\Notes;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class AdditionalFieldsConfig 
{
    private $name;
    private $fieldType;
    private $title;
    private $required;
    private $setterFn;
    private $fieldTypeSettings;
    
    /**
     * The technical name used in the input form.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function name($value): self
    {
        $this->name = $value;
    
        return $this;
    }
    
    /**
     * The data component name/field type.
     * @default null
     * @param ParamConfigurator|'input'|'numeric'|'textarea'|'select'|'datetime'|'date'|'user'|'checkbox' $value
     * @return $this
     */
    public function fieldType($value): self
    {
        $this->fieldType = $value;
    
        return $this;
    }
    
    /**
     * The label used by the field
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function title($value): self
    {
        $this->title = $value;
    
        return $this;
    }
    
    /**
     * Whether or not the field is required.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function required($value): self
    {
        $this->required = $value;
    
        return $this;
    }
    
    /**
     * Optional setter function (available in the element, for example in the updated object), if not specified, data will be added to notes. The Workflow manager will call the function with the whole field data.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function setterFn($value): self
    {
        $this->setterFn = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function fieldTypeSettings($value): self
    {
        $this->fieldTypeSettings = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['name'])) {
            $this->name = $value['name'];
            unset($value['name']);
        }
    
        if (isset($value['fieldType'])) {
            $this->fieldType = $value['fieldType'];
            unset($value['fieldType']);
        }
    
        if (isset($value['title'])) {
            $this->title = $value['title'];
            unset($value['title']);
        }
    
        if (isset($value['required'])) {
            $this->required = $value['required'];
            unset($value['required']);
        }
    
        if (isset($value['setterFn'])) {
            $this->setterFn = $value['setterFn'];
            unset($value['setterFn']);
        }
    
        if (isset($value['fieldTypeSettings'])) {
            $this->fieldTypeSettings = $value['fieldTypeSettings'];
            unset($value['fieldTypeSettings']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->name) {
            $output['name'] = $this->name;
        }
        if (null !== $this->fieldType) {
            $output['fieldType'] = $this->fieldType;
        }
        if (null !== $this->title) {
            $output['title'] = $this->title;
        }
        if (null !== $this->required) {
            $output['required'] = $this->required;
        }
        if (null !== $this->setterFn) {
            $output['setterFn'] = $this->setterFn;
        }
        if (null !== $this->fieldTypeSettings) {
            $output['fieldTypeSettings'] = $this->fieldTypeSettings;
        }
    
        return $output;
    }
    

}
