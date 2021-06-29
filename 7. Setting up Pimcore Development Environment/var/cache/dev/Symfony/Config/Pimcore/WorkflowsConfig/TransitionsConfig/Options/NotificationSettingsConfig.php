<?php

namespace Symfony\Config\Pimcore\WorkflowsConfig\TransitionsConfig\Options;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class NotificationSettingsConfig 
{
    private $condition;
    private $notifyUsers;
    private $notifyRoles;
    private $channelType;
    private $mailType;
    private $mailPath;
    
    /**
     * A symfony expression can be configured here. All sets of notification which are matching the condition will be used.
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
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function notifyUsers($value): self
    {
        $this->notifyUsers = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function notifyRoles($value): self
    {
        $this->notifyRoles = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function channelType($value): self
    {
        $this->channelType = $value;
    
        return $this;
    }
    
    /**
     * Type of mail source.
     * @default 'template'
     * @param ParamConfigurator|'template'|'pimcore_document' $value
     * @return $this
     */
    public function mailType($value): self
    {
        $this->mailType = $value;
    
        return $this;
    }
    
    /**
     * Path to mail source - either Symfony path to template or fullpath to Pimcore document. Optional use %_locale% as placeholder for language.
     * @default '@PimcoreCore/Workflow/NotificationEmail/notificationEmail.html.twig'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function mailPath($value): self
    {
        $this->mailPath = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['condition'])) {
            $this->condition = $value['condition'];
            unset($value['condition']);
        }
    
        if (isset($value['notifyUsers'])) {
            $this->notifyUsers = $value['notifyUsers'];
            unset($value['notifyUsers']);
        }
    
        if (isset($value['notifyRoles'])) {
            $this->notifyRoles = $value['notifyRoles'];
            unset($value['notifyRoles']);
        }
    
        if (isset($value['channelType'])) {
            $this->channelType = $value['channelType'];
            unset($value['channelType']);
        }
    
        if (isset($value['mailType'])) {
            $this->mailType = $value['mailType'];
            unset($value['mailType']);
        }
    
        if (isset($value['mailPath'])) {
            $this->mailPath = $value['mailPath'];
            unset($value['mailPath']);
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
        if (null !== $this->notifyUsers) {
            $output['notifyUsers'] = $this->notifyUsers;
        }
        if (null !== $this->notifyRoles) {
            $output['notifyRoles'] = $this->notifyRoles;
        }
        if (null !== $this->channelType) {
            $output['channelType'] = $this->channelType;
        }
        if (null !== $this->mailType) {
            $output['mailType'] = $this->mailType;
        }
        if (null !== $this->mailPath) {
            $output['mailPath'] = $this->mailPath;
        }
    
        return $output;
    }
    

}
