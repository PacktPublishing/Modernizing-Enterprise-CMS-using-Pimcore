<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Translations'.\DIRECTORY_SEPARATOR.'DebuggingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Translations'.\DIRECTORY_SEPARATOR.'DataObjectConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class TranslationsConfig 
{
    private $adminTranslationMapping;
    private $debugging;
    private $dataObject;
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function adminTranslationMapping(string $locale, $value): self
    {
        $this->adminTranslationMapping[$locale] = $value;
    
        return $this;
    }
    
    public function debugging(array $value = []): \Symfony\Config\Pimcore\Translations\DebuggingConfig
    {
        if (null === $this->debugging) {
            $this->debugging = new \Symfony\Config\Pimcore\Translations\DebuggingConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "debugging()" has already been initialized. You cannot pass values the second time you call debugging().');
        }
    
        return $this->debugging;
    }
    
    public function dataObject(array $value = []): \Symfony\Config\Pimcore\Translations\DataObjectConfig
    {
        if (null === $this->dataObject) {
            $this->dataObject = new \Symfony\Config\Pimcore\Translations\DataObjectConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "dataObject()" has already been initialized. You cannot pass values the second time you call dataObject().');
        }
    
        return $this->dataObject;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['admin_translation_mapping'])) {
            $this->adminTranslationMapping = $value['admin_translation_mapping'];
            unset($value['admin_translation_mapping']);
        }
    
        if (isset($value['debugging'])) {
            $this->debugging = new \Symfony\Config\Pimcore\Translations\DebuggingConfig($value['debugging']);
            unset($value['debugging']);
        }
    
        if (isset($value['data_object'])) {
            $this->dataObject = new \Symfony\Config\Pimcore\Translations\DataObjectConfig($value['data_object']);
            unset($value['data_object']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->adminTranslationMapping) {
            $output['admin_translation_mapping'] = $this->adminTranslationMapping;
        }
        if (null !== $this->debugging) {
            $output['debugging'] = $this->debugging->toArray();
        }
        if (null !== $this->dataObject) {
            $output['data_object'] = $this->dataObject->toArray();
        }
    
        return $output;
    }
    

}
