<?php

namespace Symfony\Config\PrestaSitemap;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class DefaultsConfig 
{
    private $priority;
    private $changefreq;
    private $lastmod;
    
    /**
     * @default 0.5
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function priority($value): self
    {
        $this->priority = $value;
    
        return $this;
    }
    
    /**
     * @default 'daily'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function changefreq($value): self
    {
        $this->changefreq = $value;
    
        return $this;
    }
    
    /**
     * @default 'now'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function lastmod($value): self
    {
        $this->lastmod = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['priority'])) {
            $this->priority = $value['priority'];
            unset($value['priority']);
        }
    
        if (isset($value['changefreq'])) {
            $this->changefreq = $value['changefreq'];
            unset($value['changefreq']);
        }
    
        if (isset($value['lastmod'])) {
            $this->lastmod = $value['lastmod'];
            unset($value['lastmod']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->priority) {
            $output['priority'] = $this->priority;
        }
        if (null !== $this->changefreq) {
            $output['changefreq'] = $this->changefreq;
        }
        if (null !== $this->lastmod) {
            $output['lastmod'] = $this->lastmod;
        }
    
        return $output;
    }
    

}
