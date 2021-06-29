<?php

namespace Symfony\Config\Pimcore\WorkflowsConfig\PlacesConfig;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class PermissionsConfig 
{
    private $condition;
    private $save;
    private $publish;
    private $unpublish;
    private $delete;
    private $rename;
    private $view;
    private $settings;
    private $versions;
    private $properties;
    private $modify;
    private $objectLayout;
    
    /**
     * A symfony expression can be configured here. The first set of permissions which are matching the condition will be used.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function condition($value): self
    {
        $this->condition = $value;
    
        return $this;
    }
    
    /**
     * save permission as it can be configured in Pimcore workplaces
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function save($value): self
    {
        $this->save = $value;
    
        return $this;
    }
    
    /**
     * publish permission as it can be configured in Pimcore workplaces
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function publish($value): self
    {
        $this->publish = $value;
    
        return $this;
    }
    
    /**
     * unpublish permission as it can be configured in Pimcore workplaces
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function unpublish($value): self
    {
        $this->unpublish = $value;
    
        return $this;
    }
    
    /**
     * delete permission as it can be configured in Pimcore workplaces
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function delete($value): self
    {
        $this->delete = $value;
    
        return $this;
    }
    
    /**
     * rename permission as it can be configured in Pimcore workplaces
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function rename($value): self
    {
        $this->rename = $value;
    
        return $this;
    }
    
    /**
     * view permission as it can be configured in Pimcore workplaces
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function view($value): self
    {
        $this->view = $value;
    
        return $this;
    }
    
    /**
     * settings permission as it can be configured in Pimcore workplaces
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function settings($value): self
    {
        $this->settings = $value;
    
        return $this;
    }
    
    /**
     * versions permission as it can be configured in Pimcore workplaces
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function versions($value): self
    {
        $this->versions = $value;
    
        return $this;
    }
    
    /**
     * properties permission as it can be configured in Pimcore workplaces
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function properties($value): self
    {
        $this->properties = $value;
    
        return $this;
    }
    
    /**
     * a short hand for save, publish, unpublish, delete + rename
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function modify($value): self
    {
        $this->modify = $value;
    
        return $this;
    }
    
    /**
     * if set, the user will see the configured custom data object layout
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function objectLayout($value): self
    {
        $this->objectLayout = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['condition'])) {
            $this->condition = $value['condition'];
            unset($value['condition']);
        }
    
        if (isset($value['save'])) {
            $this->save = $value['save'];
            unset($value['save']);
        }
    
        if (isset($value['publish'])) {
            $this->publish = $value['publish'];
            unset($value['publish']);
        }
    
        if (isset($value['unpublish'])) {
            $this->unpublish = $value['unpublish'];
            unset($value['unpublish']);
        }
    
        if (isset($value['delete'])) {
            $this->delete = $value['delete'];
            unset($value['delete']);
        }
    
        if (isset($value['rename'])) {
            $this->rename = $value['rename'];
            unset($value['rename']);
        }
    
        if (isset($value['view'])) {
            $this->view = $value['view'];
            unset($value['view']);
        }
    
        if (isset($value['settings'])) {
            $this->settings = $value['settings'];
            unset($value['settings']);
        }
    
        if (isset($value['versions'])) {
            $this->versions = $value['versions'];
            unset($value['versions']);
        }
    
        if (isset($value['properties'])) {
            $this->properties = $value['properties'];
            unset($value['properties']);
        }
    
        if (isset($value['modify'])) {
            $this->modify = $value['modify'];
            unset($value['modify']);
        }
    
        if (isset($value['objectLayout'])) {
            $this->objectLayout = $value['objectLayout'];
            unset($value['objectLayout']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->condition) {
            $output['condition'] = $this->condition;
        }
        if (null !== $this->save) {
            $output['save'] = $this->save;
        }
        if (null !== $this->publish) {
            $output['publish'] = $this->publish;
        }
        if (null !== $this->unpublish) {
            $output['unpublish'] = $this->unpublish;
        }
        if (null !== $this->delete) {
            $output['delete'] = $this->delete;
        }
        if (null !== $this->rename) {
            $output['rename'] = $this->rename;
        }
        if (null !== $this->view) {
            $output['view'] = $this->view;
        }
        if (null !== $this->settings) {
            $output['settings'] = $this->settings;
        }
        if (null !== $this->versions) {
            $output['versions'] = $this->versions;
        }
        if (null !== $this->properties) {
            $output['properties'] = $this->properties;
        }
        if (null !== $this->modify) {
            $output['modify'] = $this->modify;
        }
        if (null !== $this->objectLayout) {
            $output['objectLayout'] = $this->objectLayout;
        }
    
        return $output;
    }
    

}
