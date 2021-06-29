<?php

namespace Symfony\Config\Pimcore\WorkflowsConfig\TransitionsConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Options'.\DIRECTORY_SEPARATOR.'NotesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Options'.\DIRECTORY_SEPARATOR.'NotificationSettingsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class OptionsConfig 
{
    private $label;
    private $notes;
    private $iconClass;
    private $objectLayout;
    private $notificationSettings;
    private $changePublishedState;
    
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
    
    public function notes(array $value = []): \Symfony\Config\Pimcore\WorkflowsConfig\TransitionsConfig\Options\NotesConfig
    {
        if (null === $this->notes) {
            $this->notes = new \Symfony\Config\Pimcore\WorkflowsConfig\TransitionsConfig\Options\NotesConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "notes()" has already been initialized. You cannot pass values the second time you call notes().');
        }
    
        return $this->notes;
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
     * Forces an object layout after the transition was performed. This objectLayout setting overrules all objectLayout settings within the places configs.
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function objectLayout($value): self
    {
        $this->objectLayout = $value;
    
        return $this;
    }
    
    public function notificationSettings(array $value = []): \Symfony\Config\Pimcore\WorkflowsConfig\TransitionsConfig\Options\NotificationSettingsConfig
    {
        return $this->notificationSettings[] = new \Symfony\Config\Pimcore\WorkflowsConfig\TransitionsConfig\Options\NotificationSettingsConfig($value);
    }
    
    /**
     * Change published state of element while transition (only available for documents and data objects).
     * @default 'no_change'
     * @param ParamConfigurator|'no_change'|'force_unpublished'|'force_published'|'save_version' $value
     * @return $this
     */
    public function changePublishedState($value): self
    {
        $this->changePublishedState = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['label'])) {
            $this->label = $value['label'];
            unset($value['label']);
        }
    
        if (isset($value['notes'])) {
            $this->notes = new \Symfony\Config\Pimcore\WorkflowsConfig\TransitionsConfig\Options\NotesConfig($value['notes']);
            unset($value['notes']);
        }
    
        if (isset($value['iconClass'])) {
            $this->iconClass = $value['iconClass'];
            unset($value['iconClass']);
        }
    
        if (isset($value['objectLayout'])) {
            $this->objectLayout = $value['objectLayout'];
            unset($value['objectLayout']);
        }
    
        if (isset($value['notificationSettings'])) {
            $this->notificationSettings = array_map(function ($v) { return new \Symfony\Config\Pimcore\WorkflowsConfig\TransitionsConfig\Options\NotificationSettingsConfig($v); }, $value['notificationSettings']);
            unset($value['notificationSettings']);
        }
    
        if (isset($value['changePublishedState'])) {
            $this->changePublishedState = $value['changePublishedState'];
            unset($value['changePublishedState']);
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
        if (null !== $this->notes) {
            $output['notes'] = $this->notes->toArray();
        }
        if (null !== $this->iconClass) {
            $output['iconClass'] = $this->iconClass;
        }
        if (null !== $this->objectLayout) {
            $output['objectLayout'] = $this->objectLayout;
        }
        if (null !== $this->notificationSettings) {
            $output['notificationSettings'] = array_map(function ($v) { return $v->toArray(); }, $this->notificationSettings);
        }
        if (null !== $this->changePublishedState) {
            $output['changePublishedState'] = $this->changePublishedState;
        }
    
        return $output;
    }
    

}
