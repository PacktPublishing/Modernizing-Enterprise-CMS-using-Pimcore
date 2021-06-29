<?php

namespace Symfony\Config\CmfRouting;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class ChainConfig 
{
    private $routersById;
    private $replaceSymfonyRouter;
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function routersById(string $id, $value): self
    {
        $this->routersById[$id] = $value;
    
        return $this;
    }
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function replaceSymfonyRouter($value): self
    {
        $this->replaceSymfonyRouter = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['routers_by_id'])) {
            $this->routersById = $value['routers_by_id'];
            unset($value['routers_by_id']);
        }
    
        if (isset($value['replace_symfony_router'])) {
            $this->replaceSymfonyRouter = $value['replace_symfony_router'];
            unset($value['replace_symfony_router']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->routersById) {
            $output['routers_by_id'] = $this->routersById;
        }
        if (null !== $this->replaceSymfonyRouter) {
            $output['replace_symfony_router'] = $this->replaceSymfonyRouter;
        }
    
        return $output;
    }
    

}
