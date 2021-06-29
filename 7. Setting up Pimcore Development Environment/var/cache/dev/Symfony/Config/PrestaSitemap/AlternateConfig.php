<?php

namespace Symfony\Config\PrestaSitemap;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class AlternateConfig 
{
    private $enabled;
    private $defaultLocale;
    private $locales;
    private $i18n;
    
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
     * The default locale of your routes.
     * @default 'en'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultLocale($value): self
    {
        $this->defaultLocale = $value;
    
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
     * Strategy used to create your i18n routes.
     * @default 'symfony'
     * @param ParamConfigurator|'symfony'|'jms' $value
     * @return $this
     */
    public function i18n($value): self
    {
        $this->i18n = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['enabled'])) {
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }
    
        if (isset($value['default_locale'])) {
            $this->defaultLocale = $value['default_locale'];
            unset($value['default_locale']);
        }
    
        if (isset($value['locales'])) {
            $this->locales = $value['locales'];
            unset($value['locales']);
        }
    
        if (isset($value['i18n'])) {
            $this->i18n = $value['i18n'];
            unset($value['i18n']);
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
        if (null !== $this->defaultLocale) {
            $output['default_locale'] = $this->defaultLocale;
        }
        if (null !== $this->locales) {
            $output['locales'] = $this->locales;
        }
        if (null !== $this->i18n) {
            $output['i18n'] = $this->i18n;
        }
    
        return $output;
    }
    

}
