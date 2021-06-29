<?php

namespace Symfony\Config\Pimcore\WorkflowsConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'GlobalActionsConfig'.\DIRECTORY_SEPARATOR.'NotesConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class GlobalActionsConfig 
{
    private $label;
    private $iconClass;
    private $objectLayout;
    private $guard;
    private $to;
    private $notes;
    
    /**
     * Nice name for the Pimcore backend.
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
     * Css class to define the icon which will be used in the actions button in the backend.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function iconClass($value): self
    {
        $this->iconClass = $value;
    
        return $this;
    }
    
    /**
     * Forces an object layout after the global action was performed. This objectLayout setting overrules all objectLayout settings within the places configs.
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function objectLayout($value): self
    {
        $this->objectLayout = $value;
    
        return $this;
    }
    
    /**
     * An expression to block the action
     * @example is_fully_authenticated() and has_role('ROLE_JOURNALIST') and subject.getTitle() == 'My first article'
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function guard($value): self
    {
        $this->guard = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function to($value): self
    {
        $this->to = $value;
    
        return $this;
    }
    
    public function notes(array $value = []): \Symfony\Config\Pimcore\WorkflowsConfig\GlobalActionsConfig\NotesConfig
    {
        if (null === $this->notes) {
            $this->notes = new \Symfony\Config\Pimcore\WorkflowsConfig\GlobalActionsConfig\NotesConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "notes()" has already been initialized. You cannot pass values the second time you call notes().');
        }
    
        return $this->notes;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['label'])) {
            $this->label = $value['label'];
            unset($value['label']);
        }
    
        if (isset($value['iconClass'])) {
            $this->iconClass = $value['iconClass'];
            unset($value['iconClass']);
        }
    
        if (isset($value['objectLayout'])) {
            $this->objectLayout = $value['objectLayout'];
            unset($value['objectLayout']);
        }
    
        if (isset($value['guard'])) {
            $this->guard = $value['guard'];
            unset($value['guard']);
        }
    
        if (isset($value['to'])) {
            $this->to = $value['to'];
            unset($value['to']);
        }
    
        if (isset($value['notes'])) {
            $this->notes = new \Symfony\Config\Pimcore\WorkflowsConfig\GlobalActionsConfig\NotesConfig($value['notes']);
            unset($value['notes']);
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
        if (null !== $this->iconClass) {
            $output['iconClass'] = $this->iconClass;
        }
        if (null !== $this->objectLayout) {
            $output['objectLayout'] = $this->objectLayout;
        }
        if (null !== $this->guard) {
            $output['guard'] = $this->guard;
        }
        if (null !== $this->to) {
            $output['to'] = $this->to;
        }
        if (null !== $this->notes) {
            $output['notes'] = $this->notes->toArray();
        }
    
        return $output;
    }
    

}
