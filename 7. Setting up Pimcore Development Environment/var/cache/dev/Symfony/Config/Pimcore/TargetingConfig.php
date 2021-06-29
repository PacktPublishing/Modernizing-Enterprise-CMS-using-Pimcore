<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Targeting'.\DIRECTORY_SEPARATOR.'SessionConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class TargetingConfig 
{
    private $enabled;
    private $storageId;
    private $session;
    private $dataProviders;
    private $conditions;
    private $actionHandlers;
    
    /**
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
     * Service ID of the targeting storage which should be used. This ID will be aliased to Pimcore\Targeting\Storage\TargetingStorageInterface
     * @default 'Pimcore\\Targeting\\Storage\\CookieStorage'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function storageId($value): self
    {
        $this->storageId = $value;
    
        return $this;
    }
    
    public function session(array $value = []): \Symfony\Config\Pimcore\Targeting\SessionConfig
    {
        if (null === $this->session) {
            $this->session = new \Symfony\Config\Pimcore\Targeting\SessionConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "session()" has already been initialized. You cannot pass values the second time you call session().');
        }
    
        return $this->session;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dataProviders(string $key, $value): self
    {
        $this->dataProviders[$key] = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function conditions(string $key, $value): self
    {
        $this->conditions[$key] = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function actionHandlers(string $name, $value): self
    {
        $this->actionHandlers[$name] = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['enabled'])) {
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }
    
        if (isset($value['storage_id'])) {
            $this->storageId = $value['storage_id'];
            unset($value['storage_id']);
        }
    
        if (isset($value['session'])) {
            $this->session = new \Symfony\Config\Pimcore\Targeting\SessionConfig($value['session']);
            unset($value['session']);
        }
    
        if (isset($value['data_providers'])) {
            $this->dataProviders = $value['data_providers'];
            unset($value['data_providers']);
        }
    
        if (isset($value['conditions'])) {
            $this->conditions = $value['conditions'];
            unset($value['conditions']);
        }
    
        if (isset($value['action_handlers'])) {
            $this->actionHandlers = $value['action_handlers'];
            unset($value['action_handlers']);
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
        if (null !== $this->storageId) {
            $output['storage_id'] = $this->storageId;
        }
        if (null !== $this->session) {
            $output['session'] = $this->session->toArray();
        }
        if (null !== $this->dataProviders) {
            $output['data_providers'] = $this->dataProviders;
        }
        if (null !== $this->conditions) {
            $output['conditions'] = $this->conditions;
        }
        if (null !== $this->actionHandlers) {
            $output['action_handlers'] = $this->actionHandlers;
        }
    
        return $output;
    }
    

}
