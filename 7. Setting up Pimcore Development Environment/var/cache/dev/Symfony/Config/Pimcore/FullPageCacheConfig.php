<?php

namespace Symfony\Config\Pimcore;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class FullPageCacheConfig 
{
    private $enabled;
    private $lifetime;
    private $excludePatterns;
    private $excludeCookie;
    
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
     * Optional output-cache lifetime (in seconds) after the cache expires, if not defined the cache will be cleaned on every action inside the CMS, otherwise not (for high traffic sites)
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function lifetime($value): self
    {
        $this->lifetime = $value;
    
        return $this;
    }
    
    /**
     * Regular Expressions like: /^\/dir\/toexclude/
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function excludePatterns($value): self
    {
        $this->excludePatterns = $value;
    
        return $this;
    }
    
    /**
     * Comma separated list of cookie names, that will automatically disable the full-page cache
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function excludeCookie($value): self
    {
        $this->excludeCookie = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['enabled'])) {
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }
    
        if (isset($value['lifetime'])) {
            $this->lifetime = $value['lifetime'];
            unset($value['lifetime']);
        }
    
        if (isset($value['exclude_patterns'])) {
            $this->excludePatterns = $value['exclude_patterns'];
            unset($value['exclude_patterns']);
        }
    
        if (isset($value['exclude_cookie'])) {
            $this->excludeCookie = $value['exclude_cookie'];
            unset($value['exclude_cookie']);
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
        if (null !== $this->lifetime) {
            $output['lifetime'] = $this->lifetime;
        }
        if (null !== $this->excludePatterns) {
            $output['exclude_patterns'] = $this->excludePatterns;
        }
        if (null !== $this->excludeCookie) {
            $output['exclude_cookie'] = $this->excludeCookie;
        }
    
        return $output;
    }
    

}
