<?php

namespace Symfony\Config\Pimcore\Translations;

require_once __DIR__.\DIRECTORY_SEPARATOR.'DataObject'.\DIRECTORY_SEPARATOR.'TranslationExtractorConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class DataObjectConfig 
{
    private $translationExtractor;
    
    public function translationExtractor(array $value = []): \Symfony\Config\Pimcore\Translations\DataObject\TranslationExtractorConfig
    {
        if (null === $this->translationExtractor) {
            $this->translationExtractor = new \Symfony\Config\Pimcore\Translations\DataObject\TranslationExtractorConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "translationExtractor()" has already been initialized. You cannot pass values the second time you call translationExtractor().');
        }
    
        return $this->translationExtractor;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['translation_extractor'])) {
            $this->translationExtractor = new \Symfony\Config\Pimcore\Translations\DataObject\TranslationExtractorConfig($value['translation_extractor']);
            unset($value['translation_extractor']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->translationExtractor) {
            $output['translation_extractor'] = $this->translationExtractor->toArray();
        }
    
        return $output;
    }
    

}
