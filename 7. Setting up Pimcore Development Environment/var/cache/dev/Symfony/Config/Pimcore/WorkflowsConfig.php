<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'WorkflowsConfig'.\DIRECTORY_SEPARATOR.'AuditTrailConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'WorkflowsConfig'.\DIRECTORY_SEPARATOR.'MarkingStoreConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'WorkflowsConfig'.\DIRECTORY_SEPARATOR.'SupportStrategyConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'WorkflowsConfig'.\DIRECTORY_SEPARATOR.'PlacesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'WorkflowsConfig'.\DIRECTORY_SEPARATOR.'TransitionsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'WorkflowsConfig'.\DIRECTORY_SEPARATOR.'GlobalActionsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class WorkflowsConfig 
{
    private $placeholders;
    private $enabled;
    private $priority;
    private $label;
    private $auditTrail;
    private $type;
    private $markingStore;
    private $supports;
    private $supportStrategy;
    private $initialMarkings;
    private $places;
    private $transitions;
    private $globalActions;
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function placeholders($value): self
    {
        $this->placeholders = $value;
    
        return $this;
    }
    
    /**
     * Can be used to enable or disable the workflow.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): self
    {
        $this->enabled = $value;
    
        return $this;
    }
    
    /**
     * When multiple custom view or permission settings from different places in different workflows are valid, the workflow with the highest priority will be used.
     * @default 0
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function priority($value): self
    {
        $this->priority = $value;
    
        return $this;
    }
    
    /**
     * Will be used in the backend interface as nice name for the workflow. If not set the technical workflow name will be used as label too.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function label($value): self
    {
        $this->label = $value;
    
        return $this;
    }
    
    public function auditTrail(array $value = []): \Symfony\Config\Pimcore\WorkflowsConfig\AuditTrailConfig
    {
        if (null === $this->auditTrail) {
            $this->auditTrail = new \Symfony\Config\Pimcore\WorkflowsConfig\AuditTrailConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "auditTrail()" has already been initialized. You cannot pass values the second time you call auditTrail().');
        }
    
        return $this->auditTrail;
    }
    
    /**
     * A workflow with type "workflow" can handle multiple places at one time whereas a state_machine provides a finite state_machine (only one place at one time). Take a look at the Symfony docs for more details.
     * @default null
     * @param ParamConfigurator|'workflow'|'state_machine' $value
     * @return $this
     */
    public function type($value): self
    {
        $this->type = $value;
    
        return $this;
    }
    
    public function markingStore(array $value = []): \Symfony\Config\Pimcore\WorkflowsConfig\MarkingStoreConfig
    {
        if (null === $this->markingStore) {
            $this->markingStore = new \Symfony\Config\Pimcore\WorkflowsConfig\MarkingStoreConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "markingStore()" has already been initialized. You cannot pass values the second time you call markingStore().');
        }
    
        return $this->markingStore;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function supports($value): self
    {
        $this->supports = $value;
    
        return $this;
    }
    
    public function supportStrategy(array $value = []): \Symfony\Config\Pimcore\WorkflowsConfig\SupportStrategyConfig
    {
        if (null === $this->supportStrategy) {
            $this->supportStrategy = new \Symfony\Config\Pimcore\WorkflowsConfig\SupportStrategyConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "supportStrategy()" has already been initialized. You cannot pass values the second time you call supportStrategy().');
        }
    
        return $this->supportStrategy;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function initialMarkings($value): self
    {
        $this->initialMarkings = $value;
    
        return $this;
    }
    
    public function places(array $value = []): \Symfony\Config\Pimcore\WorkflowsConfig\PlacesConfig
    {
        return $this->places[] = new \Symfony\Config\Pimcore\WorkflowsConfig\PlacesConfig($value);
    }
    
    public function transitions(array $value = []): \Symfony\Config\Pimcore\WorkflowsConfig\TransitionsConfig
    {
        return $this->transitions[] = new \Symfony\Config\Pimcore\WorkflowsConfig\TransitionsConfig($value);
    }
    
    public function globalActions(array $value = []): \Symfony\Config\Pimcore\WorkflowsConfig\GlobalActionsConfig
    {
        return $this->globalActions[] = new \Symfony\Config\Pimcore\WorkflowsConfig\GlobalActionsConfig($value);
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['placeholders'])) {
            $this->placeholders = $value['placeholders'];
            unset($value['placeholders']);
        }
    
        if (isset($value['enabled'])) {
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }
    
        if (isset($value['priority'])) {
            $this->priority = $value['priority'];
            unset($value['priority']);
        }
    
        if (isset($value['label'])) {
            $this->label = $value['label'];
            unset($value['label']);
        }
    
        if (isset($value['audit_trail'])) {
            $this->auditTrail = new \Symfony\Config\Pimcore\WorkflowsConfig\AuditTrailConfig($value['audit_trail']);
            unset($value['audit_trail']);
        }
    
        if (isset($value['type'])) {
            $this->type = $value['type'];
            unset($value['type']);
        }
    
        if (isset($value['marking_store'])) {
            $this->markingStore = new \Symfony\Config\Pimcore\WorkflowsConfig\MarkingStoreConfig($value['marking_store']);
            unset($value['marking_store']);
        }
    
        if (isset($value['supports'])) {
            $this->supports = $value['supports'];
            unset($value['supports']);
        }
    
        if (isset($value['support_strategy'])) {
            $this->supportStrategy = new \Symfony\Config\Pimcore\WorkflowsConfig\SupportStrategyConfig($value['support_strategy']);
            unset($value['support_strategy']);
        }
    
        if (isset($value['initial_markings'])) {
            $this->initialMarkings = $value['initial_markings'];
            unset($value['initial_markings']);
        }
    
        if (isset($value['places'])) {
            $this->places = array_map(function ($v) { return new \Symfony\Config\Pimcore\WorkflowsConfig\PlacesConfig($v); }, $value['places']);
            unset($value['places']);
        }
    
        if (isset($value['transitions'])) {
            $this->transitions = array_map(function ($v) { return new \Symfony\Config\Pimcore\WorkflowsConfig\TransitionsConfig($v); }, $value['transitions']);
            unset($value['transitions']);
        }
    
        if (isset($value['globalActions'])) {
            $this->globalActions = array_map(function ($v) { return new \Symfony\Config\Pimcore\WorkflowsConfig\GlobalActionsConfig($v); }, $value['globalActions']);
            unset($value['globalActions']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->placeholders) {
            $output['placeholders'] = $this->placeholders;
        }
        if (null !== $this->enabled) {
            $output['enabled'] = $this->enabled;
        }
        if (null !== $this->priority) {
            $output['priority'] = $this->priority;
        }
        if (null !== $this->label) {
            $output['label'] = $this->label;
        }
        if (null !== $this->auditTrail) {
            $output['audit_trail'] = $this->auditTrail->toArray();
        }
        if (null !== $this->type) {
            $output['type'] = $this->type;
        }
        if (null !== $this->markingStore) {
            $output['marking_store'] = $this->markingStore->toArray();
        }
        if (null !== $this->supports) {
            $output['supports'] = $this->supports;
        }
        if (null !== $this->supportStrategy) {
            $output['support_strategy'] = $this->supportStrategy->toArray();
        }
        if (null !== $this->initialMarkings) {
            $output['initial_markings'] = $this->initialMarkings;
        }
        if (null !== $this->places) {
            $output['places'] = array_map(function ($v) { return $v->toArray(); }, $this->places);
        }
        if (null !== $this->transitions) {
            $output['transitions'] = array_map(function ($v) { return $v->toArray(); }, $this->transitions);
        }
        if (null !== $this->globalActions) {
            $output['globalActions'] = array_map(function ($v) { return $v->toArray(); }, $this->globalActions);
        }
    
        return $output;
    }
    

}
