<?php

namespace Symfony\Config\Pimcore\WorkflowsConfig\GlobalActionsConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Notes'.\DIRECTORY_SEPARATOR.'AdditionalFieldsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Notes'.\DIRECTORY_SEPARATOR.'CustomHtmlConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class NotesConfig 
{
    private $commentEnabled;
    private $commentRequired;
    private $commentSetterFn;
    private $commentGetterFn;
    private $type;
    private $title;
    private $additionalFields;
    private $customHtml;
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function commentEnabled($value): self
    {
        $this->commentEnabled = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function commentRequired($value): self
    {
        $this->commentRequired = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function commentSetterFn($value): self
    {
        $this->commentSetterFn = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function commentGetterFn($value): self
    {
        $this->commentGetterFn = $value;
    
        return $this;
    }
    
    /**
     * @default 'Status update'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function type($value): self
    {
        $this->type = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function title($value): self
    {
        $this->title = $value;
    
        return $this;
    }
    
    public function additionalFields(array $value = []): \Symfony\Config\Pimcore\WorkflowsConfig\GlobalActionsConfig\Notes\AdditionalFieldsConfig
    {
        return $this->additionalFields[] = new \Symfony\Config\Pimcore\WorkflowsConfig\GlobalActionsConfig\Notes\AdditionalFieldsConfig($value);
    }
    
    public function customHtml(array $value = []): \Symfony\Config\Pimcore\WorkflowsConfig\GlobalActionsConfig\Notes\CustomHtmlConfig
    {
        if (null === $this->customHtml) {
            $this->customHtml = new \Symfony\Config\Pimcore\WorkflowsConfig\GlobalActionsConfig\Notes\CustomHtmlConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "customHtml()" has already been initialized. You cannot pass values the second time you call customHtml().');
        }
    
        return $this->customHtml;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['commentEnabled'])) {
            $this->commentEnabled = $value['commentEnabled'];
            unset($value['commentEnabled']);
        }
    
        if (isset($value['commentRequired'])) {
            $this->commentRequired = $value['commentRequired'];
            unset($value['commentRequired']);
        }
    
        if (isset($value['commentSetterFn'])) {
            $this->commentSetterFn = $value['commentSetterFn'];
            unset($value['commentSetterFn']);
        }
    
        if (isset($value['commentGetterFn'])) {
            $this->commentGetterFn = $value['commentGetterFn'];
            unset($value['commentGetterFn']);
        }
    
        if (isset($value['type'])) {
            $this->type = $value['type'];
            unset($value['type']);
        }
    
        if (isset($value['title'])) {
            $this->title = $value['title'];
            unset($value['title']);
        }
    
        if (isset($value['additionalFields'])) {
            $this->additionalFields = array_map(function ($v) { return new \Symfony\Config\Pimcore\WorkflowsConfig\GlobalActionsConfig\Notes\AdditionalFieldsConfig($v); }, $value['additionalFields']);
            unset($value['additionalFields']);
        }
    
        if (isset($value['customHtml'])) {
            $this->customHtml = new \Symfony\Config\Pimcore\WorkflowsConfig\GlobalActionsConfig\Notes\CustomHtmlConfig($value['customHtml']);
            unset($value['customHtml']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->commentEnabled) {
            $output['commentEnabled'] = $this->commentEnabled;
        }
        if (null !== $this->commentRequired) {
            $output['commentRequired'] = $this->commentRequired;
        }
        if (null !== $this->commentSetterFn) {
            $output['commentSetterFn'] = $this->commentSetterFn;
        }
        if (null !== $this->commentGetterFn) {
            $output['commentGetterFn'] = $this->commentGetterFn;
        }
        if (null !== $this->type) {
            $output['type'] = $this->type;
        }
        if (null !== $this->title) {
            $output['title'] = $this->title;
        }
        if (null !== $this->additionalFields) {
            $output['additionalFields'] = array_map(function ($v) { return $v->toArray(); }, $this->additionalFields);
        }
        if (null !== $this->customHtml) {
            $output['customHtml'] = $this->customHtml->toArray();
        }
    
        return $output;
    }
    

}
