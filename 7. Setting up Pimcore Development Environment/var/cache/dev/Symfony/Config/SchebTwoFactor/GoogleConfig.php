<?php

namespace Symfony\Config\SchebTwoFactor;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class GoogleConfig 
{
    private $enabled;
    private $formRenderer;
    private $issuer;
    private $serverName;
    private $template;
    private $digits;
    private $window;
    
    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function enabled($value): self
    {
        $this->enabled = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function formRenderer($value): self
    {
        $this->formRenderer = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function issuer($value): self
    {
        $this->issuer = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function serverName($value): self
    {
        $this->serverName = $value;
    
        return $this;
    }
    
    /**
     * @default '@SchebTwoFactor/Authentication/form.html.twig'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function template($value): self
    {
        $this->template = $value;
    
        return $this;
    }
    
    /**
     * @default 6
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function digits($value): self
    {
        $this->digits = $value;
    
        return $this;
    }
    
    /**
     * @default 1
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function window($value): self
    {
        $this->window = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['enabled'])) {
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }
    
        if (isset($value['form_renderer'])) {
            $this->formRenderer = $value['form_renderer'];
            unset($value['form_renderer']);
        }
    
        if (isset($value['issuer'])) {
            $this->issuer = $value['issuer'];
            unset($value['issuer']);
        }
    
        if (isset($value['server_name'])) {
            $this->serverName = $value['server_name'];
            unset($value['server_name']);
        }
    
        if (isset($value['template'])) {
            $this->template = $value['template'];
            unset($value['template']);
        }
    
        if (isset($value['digits'])) {
            $this->digits = $value['digits'];
            unset($value['digits']);
        }
    
        if (isset($value['window'])) {
            $this->window = $value['window'];
            unset($value['window']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->enabled) {
            $output['enabled'] = $this->enabled;
        }
        if (null !== $this->formRenderer) {
            $output['form_renderer'] = $this->formRenderer;
        }
        if (null !== $this->issuer) {
            $output['issuer'] = $this->issuer;
        }
        if (null !== $this->serverName) {
            $output['server_name'] = $this->serverName;
        }
        if (null !== $this->template) {
            $output['template'] = $this->template;
        }
        if (null !== $this->digits) {
            $output['digits'] = $this->digits;
        }
        if (null !== $this->window) {
            $output['window'] = $this->window;
        }
    
        return $output;
    }
    

}
