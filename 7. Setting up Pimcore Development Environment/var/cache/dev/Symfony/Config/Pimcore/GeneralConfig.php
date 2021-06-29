<?php

namespace Symfony\Config\Pimcore;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class GeneralConfig 
{
    private $timezone;
    private $pathVariable;
    private $domain;
    private $redirectToMaindomain;
    private $language;
    private $validLanguages;
    private $fallbackLanguages;
    private $defaultLanguage;
    private $disableUsageStatistics;
    private $debugAdminTranslations;
    private $instanceIdentifier;
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function timezone($value): self
    {
        $this->timezone = $value;
    
        return $this;
    }
    
    /**
     * Additional $PATH variable (: separated) (/x/y:/foo/bar):
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function pathVariable($value): self
    {
        $this->pathVariable = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function domain($value): self
    {
        $this->domain = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function redirectToMaindomain($value): self
    {
        $this->redirectToMaindomain = $value;
    
        return $this;
    }
    
    /**
     * @default 'en'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function language($value): self
    {
        $this->language = $value;
    
        return $this;
    }
    
    /**
     * @default 'en'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function validLanguages($value): self
    {
        $this->validLanguages = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function fallbackLanguages($value): self
    {
        $this->fallbackLanguages = $value;
    
        return $this;
    }
    
    /**
     * @default 'en'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultLanguage($value): self
    {
        $this->defaultLanguage = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function disableUsageStatistics($value): self
    {
        $this->disableUsageStatistics = $value;
    
        return $this;
    }
    
    /**
     * Debug Admin-Translations (displayed wrapped in +)
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function debugAdminTranslations($value): self
    {
        $this->debugAdminTranslations = $value;
    
        return $this;
    }
    
    /**
     * UUID instance identifier. Has to be unique throughout multiple Pimcore instances. UUID generation will be automatically enabled if a Instance identifier is provided (do not change the instance identifier afterwards - this will cause invalid UUIDs)
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function instanceIdentifier($value): self
    {
        $this->instanceIdentifier = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['timezone'])) {
            $this->timezone = $value['timezone'];
            unset($value['timezone']);
        }
    
        if (isset($value['path_variable'])) {
            $this->pathVariable = $value['path_variable'];
            unset($value['path_variable']);
        }
    
        if (isset($value['domain'])) {
            $this->domain = $value['domain'];
            unset($value['domain']);
        }
    
        if (isset($value['redirect_to_maindomain'])) {
            $this->redirectToMaindomain = $value['redirect_to_maindomain'];
            unset($value['redirect_to_maindomain']);
        }
    
        if (isset($value['language'])) {
            $this->language = $value['language'];
            unset($value['language']);
        }
    
        if (isset($value['valid_languages'])) {
            $this->validLanguages = $value['valid_languages'];
            unset($value['valid_languages']);
        }
    
        if (isset($value['fallback_languages'])) {
            $this->fallbackLanguages = $value['fallback_languages'];
            unset($value['fallback_languages']);
        }
    
        if (isset($value['default_language'])) {
            $this->defaultLanguage = $value['default_language'];
            unset($value['default_language']);
        }
    
        if (isset($value['disable_usage_statistics'])) {
            $this->disableUsageStatistics = $value['disable_usage_statistics'];
            unset($value['disable_usage_statistics']);
        }
    
        if (isset($value['debug_admin_translations'])) {
            $this->debugAdminTranslations = $value['debug_admin_translations'];
            unset($value['debug_admin_translations']);
        }
    
        if (isset($value['instance_identifier'])) {
            $this->instanceIdentifier = $value['instance_identifier'];
            unset($value['instance_identifier']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->timezone) {
            $output['timezone'] = $this->timezone;
        }
        if (null !== $this->pathVariable) {
            $output['path_variable'] = $this->pathVariable;
        }
        if (null !== $this->domain) {
            $output['domain'] = $this->domain;
        }
        if (null !== $this->redirectToMaindomain) {
            $output['redirect_to_maindomain'] = $this->redirectToMaindomain;
        }
        if (null !== $this->language) {
            $output['language'] = $this->language;
        }
        if (null !== $this->validLanguages) {
            $output['valid_languages'] = $this->validLanguages;
        }
        if (null !== $this->fallbackLanguages) {
            $output['fallback_languages'] = $this->fallbackLanguages;
        }
        if (null !== $this->defaultLanguage) {
            $output['default_language'] = $this->defaultLanguage;
        }
        if (null !== $this->disableUsageStatistics) {
            $output['disable_usage_statistics'] = $this->disableUsageStatistics;
        }
        if (null !== $this->debugAdminTranslations) {
            $output['debug_admin_translations'] = $this->debugAdminTranslations;
        }
        if (null !== $this->instanceIdentifier) {
            $output['instance_identifier'] = $this->instanceIdentifier;
        }
    
        return $output;
    }
    

}
