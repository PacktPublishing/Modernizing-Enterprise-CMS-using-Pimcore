<?php

namespace Symfony\Config\Pimcore\WorkflowsConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'PlacesConfig'.\DIRECTORY_SEPARATOR.'PermissionsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class PlacesConfig 
{
    private $label;
    private $title;
    private $color;
    private $colorInverted;
    private $visibleInHeader;
    private $permissions;
    
    /**
     * Nice name which will be used in the Pimcore backend.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function label($value): self
    {
        $this->label = $value;
    
        return $this;
    }
    
    /**
     * Title/tooltip for this place when it is displayed in the header of the Pimcore element detail view in the backend.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function title($value): self
    {
        $this->title = $value;
    
        return $this;
    }
    
    /**
     * Color of the place which will be used in the Pimcore backend.
     * @default '#bfdadc'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function color($value): self
    {
        $this->color = $value;
    
        return $this;
    }
    
    /**
     * If set to true the color will be used as border and font color otherwise as background color.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function colorInverted($value): self
    {
        $this->colorInverted = $value;
    
        return $this;
    }
    
    /**
     * If set to false, the place will be hidden in the header of the Pimcore element detail view in the backend.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function visibleInHeader($value): self
    {
        $this->visibleInHeader = $value;
    
        return $this;
    }
    
    public function permissions(array $value = []): \Symfony\Config\Pimcore\WorkflowsConfig\PlacesConfig\PermissionsConfig
    {
        return $this->permissions[] = new \Symfony\Config\Pimcore\WorkflowsConfig\PlacesConfig\PermissionsConfig($value);
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['label'])) {
            $this->label = $value['label'];
            unset($value['label']);
        }
    
        if (isset($value['title'])) {
            $this->title = $value['title'];
            unset($value['title']);
        }
    
        if (isset($value['color'])) {
            $this->color = $value['color'];
            unset($value['color']);
        }
    
        if (isset($value['colorInverted'])) {
            $this->colorInverted = $value['colorInverted'];
            unset($value['colorInverted']);
        }
    
        if (isset($value['visibleInHeader'])) {
            $this->visibleInHeader = $value['visibleInHeader'];
            unset($value['visibleInHeader']);
        }
    
        if (isset($value['permissions'])) {
            $this->permissions = array_map(function ($v) { return new \Symfony\Config\Pimcore\WorkflowsConfig\PlacesConfig\PermissionsConfig($v); }, $value['permissions']);
            unset($value['permissions']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->label) {
            $output['label'] = $this->label;
        }
        if (null !== $this->title) {
            $output['title'] = $this->title;
        }
        if (null !== $this->color) {
            $output['color'] = $this->color;
        }
        if (null !== $this->colorInverted) {
            $output['colorInverted'] = $this->colorInverted;
        }
        if (null !== $this->visibleInHeader) {
            $output['visibleInHeader'] = $this->visibleInHeader;
        }
        if (null !== $this->permissions) {
            $output['permissions'] = array_map(function ($v) { return $v->toArray(); }, $this->permissions);
        }
    
        return $output;
    }
    

}
