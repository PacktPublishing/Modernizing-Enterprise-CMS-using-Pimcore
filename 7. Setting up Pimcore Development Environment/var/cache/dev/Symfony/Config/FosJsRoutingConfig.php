<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'FosJsRouting'.\DIRECTORY_SEPARATOR.'CacheControlConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class FosJsRoutingConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $serializer;
    private $routesToExpose;
    private $router;
    private $requestContextBaseUrl;
    private $cacheControl;
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function serializer($value): self
    {
        $this->serializer = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function routesToExpose($value): self
    {
        $this->routesToExpose = $value;
    
        return $this;
    }
    
    /**
     * @default 'router'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function router($value): self
    {
        $this->router = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function requestContextBaseUrl($value): self
    {
        $this->requestContextBaseUrl = $value;
    
        return $this;
    }
    
    public function cacheControl(array $value = []): \Symfony\Config\FosJsRouting\CacheControlConfig
    {
        if (null === $this->cacheControl) {
            $this->cacheControl = new \Symfony\Config\FosJsRouting\CacheControlConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "cacheControl()" has already been initialized. You cannot pass values the second time you call cacheControl().');
        }
    
        return $this->cacheControl;
    }
    
    public function getExtensionAlias(): string
    {
        return 'fos_js_routing';
    }
            
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['serializer'])) {
            $this->serializer = $value['serializer'];
            unset($value['serializer']);
        }
    
        if (isset($value['routes_to_expose'])) {
            $this->routesToExpose = $value['routes_to_expose'];
            unset($value['routes_to_expose']);
        }
    
        if (isset($value['router'])) {
            $this->router = $value['router'];
            unset($value['router']);
        }
    
        if (isset($value['request_context_base_url'])) {
            $this->requestContextBaseUrl = $value['request_context_base_url'];
            unset($value['request_context_base_url']);
        }
    
        if (isset($value['cache_control'])) {
            $this->cacheControl = new \Symfony\Config\FosJsRouting\CacheControlConfig($value['cache_control']);
            unset($value['cache_control']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->serializer) {
            $output['serializer'] = $this->serializer;
        }
        if (null !== $this->routesToExpose) {
            $output['routes_to_expose'] = $this->routesToExpose;
        }
        if (null !== $this->router) {
            $output['router'] = $this->router;
        }
        if (null !== $this->requestContextBaseUrl) {
            $output['request_context_base_url'] = $this->requestContextBaseUrl;
        }
        if (null !== $this->cacheControl) {
            $output['cache_control'] = $this->cacheControl->toArray();
        }
    
        return $output;
    }
    

}
