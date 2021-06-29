<?php

namespace Symfony\Config\CmfRouting;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Dynamic'.\DIRECTORY_SEPARATOR.'PersistenceConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class DynamicConfig 
{
    private $enabled;
    private $routeCollectionLimit;
    private $genericController;
    private $defaultController;
    private $controllersByType;
    private $controllersByClass;
    private $templatesByClass;
    private $persistence;
    private $uriFilterRegexp;
    private $routeProviderServiceId;
    private $routeFiltersById;
    private $contentRepositoryServiceId;
    private $locales;
    private $limitCandidates;
    private $matchImplicitLocale;
    private $autoLocalePattern;
    private $urlGenerator;
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): self
    {
        $this->enabled = $value;
    
        return $this;
    }
    
    /**
     * @default 0
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function routeCollectionLimit($value): self
    {
        $this->routeCollectionLimit = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function genericController($value): self
    {
        $this->genericController = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultController($value): self
    {
        $this->defaultController = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function controllersByType(string $type, $value): self
    {
        $this->controllersByType[$type] = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function controllerByClass(string $class, $value): self
    {
        $this->controllersByClass[$class] = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function templateByClass(string $class, $value): self
    {
        $this->templatesByClass[$class] = $value;
    
        return $this;
    }
    
    public function persistence(array $value = []): \Symfony\Config\CmfRouting\Dynamic\PersistenceConfig
    {
        if (null === $this->persistence) {
            $this->persistence = new \Symfony\Config\CmfRouting\Dynamic\PersistenceConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "persistence()" has already been initialized. You cannot pass values the second time you call persistence().');
        }
    
        return $this->persistence;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function uriFilterRegexp($value): self
    {
        $this->uriFilterRegexp = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function routeProviderServiceId($value): self
    {
        $this->routeProviderServiceId = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function routeFiltersById(string $id, $value): self
    {
        $this->routeFiltersById[$id] = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function contentRepositoryServiceId($value): self
    {
        $this->contentRepositoryServiceId = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function locales($value): self
    {
        $this->locales = $value;
    
        return $this;
    }
    
    /**
     * @default 20
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function limitCandidates($value): self
    {
        $this->limitCandidates = $value;
    
        return $this;
    }
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function matchImplicitLocale($value): self
    {
        $this->matchImplicitLocale = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function autoLocalePattern($value): self
    {
        $this->autoLocalePattern = $value;
    
        return $this;
    }
    
    /**
     * URL generator service ID
     * @default 'cmf_routing.generator'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function urlGenerator($value): self
    {
        $this->urlGenerator = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['enabled'])) {
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }
    
        if (isset($value['route_collection_limit'])) {
            $this->routeCollectionLimit = $value['route_collection_limit'];
            unset($value['route_collection_limit']);
        }
    
        if (isset($value['generic_controller'])) {
            $this->genericController = $value['generic_controller'];
            unset($value['generic_controller']);
        }
    
        if (isset($value['default_controller'])) {
            $this->defaultController = $value['default_controller'];
            unset($value['default_controller']);
        }
    
        if (isset($value['controllers_by_type'])) {
            $this->controllersByType = $value['controllers_by_type'];
            unset($value['controllers_by_type']);
        }
    
        if (isset($value['controllers_by_class'])) {
            $this->controllersByClass = $value['controllers_by_class'];
            unset($value['controllers_by_class']);
        }
    
        if (isset($value['templates_by_class'])) {
            $this->templatesByClass = $value['templates_by_class'];
            unset($value['templates_by_class']);
        }
    
        if (isset($value['persistence'])) {
            $this->persistence = new \Symfony\Config\CmfRouting\Dynamic\PersistenceConfig($value['persistence']);
            unset($value['persistence']);
        }
    
        if (isset($value['uri_filter_regexp'])) {
            $this->uriFilterRegexp = $value['uri_filter_regexp'];
            unset($value['uri_filter_regexp']);
        }
    
        if (isset($value['route_provider_service_id'])) {
            $this->routeProviderServiceId = $value['route_provider_service_id'];
            unset($value['route_provider_service_id']);
        }
    
        if (isset($value['route_filters_by_id'])) {
            $this->routeFiltersById = $value['route_filters_by_id'];
            unset($value['route_filters_by_id']);
        }
    
        if (isset($value['content_repository_service_id'])) {
            $this->contentRepositoryServiceId = $value['content_repository_service_id'];
            unset($value['content_repository_service_id']);
        }
    
        if (isset($value['locales'])) {
            $this->locales = $value['locales'];
            unset($value['locales']);
        }
    
        if (isset($value['limit_candidates'])) {
            $this->limitCandidates = $value['limit_candidates'];
            unset($value['limit_candidates']);
        }
    
        if (isset($value['match_implicit_locale'])) {
            $this->matchImplicitLocale = $value['match_implicit_locale'];
            unset($value['match_implicit_locale']);
        }
    
        if (isset($value['auto_locale_pattern'])) {
            $this->autoLocalePattern = $value['auto_locale_pattern'];
            unset($value['auto_locale_pattern']);
        }
    
        if (isset($value['url_generator'])) {
            $this->urlGenerator = $value['url_generator'];
            unset($value['url_generator']);
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
        if (null !== $this->routeCollectionLimit) {
            $output['route_collection_limit'] = $this->routeCollectionLimit;
        }
        if (null !== $this->genericController) {
            $output['generic_controller'] = $this->genericController;
        }
        if (null !== $this->defaultController) {
            $output['default_controller'] = $this->defaultController;
        }
        if (null !== $this->controllersByType) {
            $output['controllers_by_type'] = $this->controllersByType;
        }
        if (null !== $this->controllersByClass) {
            $output['controllers_by_class'] = $this->controllersByClass;
        }
        if (null !== $this->templatesByClass) {
            $output['templates_by_class'] = $this->templatesByClass;
        }
        if (null !== $this->persistence) {
            $output['persistence'] = $this->persistence->toArray();
        }
        if (null !== $this->uriFilterRegexp) {
            $output['uri_filter_regexp'] = $this->uriFilterRegexp;
        }
        if (null !== $this->routeProviderServiceId) {
            $output['route_provider_service_id'] = $this->routeProviderServiceId;
        }
        if (null !== $this->routeFiltersById) {
            $output['route_filters_by_id'] = $this->routeFiltersById;
        }
        if (null !== $this->contentRepositoryServiceId) {
            $output['content_repository_service_id'] = $this->contentRepositoryServiceId;
        }
        if (null !== $this->locales) {
            $output['locales'] = $this->locales;
        }
        if (null !== $this->limitCandidates) {
            $output['limit_candidates'] = $this->limitCandidates;
        }
        if (null !== $this->matchImplicitLocale) {
            $output['match_implicit_locale'] = $this->matchImplicitLocale;
        }
        if (null !== $this->autoLocalePattern) {
            $output['auto_locale_pattern'] = $this->autoLocalePattern;
        }
        if (null !== $this->urlGenerator) {
            $output['url_generator'] = $this->urlGenerator;
        }
    
        return $output;
    }
    

}
