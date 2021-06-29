<?php

namespace Symfony\Config\Pimcore;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class BundlesConfig 
{
    private $searchPaths;
    private $handleComposer;
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function searchPaths($value): self
    {
        $this->searchPaths = $value;
    
        return $this;
    }
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function handleComposer($value): self
    {
        $this->handleComposer = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['search_paths'])) {
            $this->searchPaths = $value['search_paths'];
            unset($value['search_paths']);
        }
    
        if (isset($value['handle_composer'])) {
            $this->handleComposer = $value['handle_composer'];
            unset($value['handle_composer']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->searchPaths) {
            $output['search_paths'] = $this->searchPaths;
        }
        if (null !== $this->handleComposer) {
            $output['handle_composer'] = $this->handleComposer;
        }
    
        return $output;
    }
    

}
