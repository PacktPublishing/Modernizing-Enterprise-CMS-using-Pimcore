<?php

namespace Symfony\Config\Pimcore\Sitemaps;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class GeneratorsConfig 
{
    private $enabled;
    private $generatorId;
    private $priority;
    
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
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function generatorId($value): self
    {
        $this->generatorId = $value;
    
        return $this;
    }
    
    /**
     * @default 0
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function priority($value): self
    {
        $this->priority = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['enabled'])) {
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }
    
        if (isset($value['generator_id'])) {
            $this->generatorId = $value['generator_id'];
            unset($value['generator_id']);
        }
    
        if (isset($value['priority'])) {
            $this->priority = $value['priority'];
            unset($value['priority']);
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
        if (null !== $this->generatorId) {
            $output['generator_id'] = $this->generatorId;
        }
        if (null !== $this->priority) {
            $output['priority'] = $this->priority;
        }
    
        return $output;
    }
    

}
