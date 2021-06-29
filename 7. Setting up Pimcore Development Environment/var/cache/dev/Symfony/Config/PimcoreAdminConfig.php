<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'PimcoreAdmin'.\DIRECTORY_SEPARATOR.'GdprDataExtractorConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'PimcoreAdmin'.\DIRECTORY_SEPARATOR.'ObjectsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'PimcoreAdmin'.\DIRECTORY_SEPARATOR.'AssetsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'PimcoreAdmin'.\DIRECTORY_SEPARATOR.'DocumentsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'PimcoreAdmin'.\DIRECTORY_SEPARATOR.'CsrfProtectionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'PimcoreAdmin'.\DIRECTORY_SEPARATOR.'BrandingConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class PimcoreAdminConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $gdprDataExtractor;
    private $objects;
    private $assets;
    private $documents;
    private $adminLanguages;
    private $csrfProtection;
    private $customAdminPathIdentifier;
    private $branding;
    
    public function gdprDataExtractor(array $value = []): \Symfony\Config\PimcoreAdmin\GdprDataExtractorConfig
    {
        if (null === $this->gdprDataExtractor) {
            $this->gdprDataExtractor = new \Symfony\Config\PimcoreAdmin\GdprDataExtractorConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "gdprDataExtractor()" has already been initialized. You cannot pass values the second time you call gdprDataExtractor().');
        }
    
        return $this->gdprDataExtractor;
    }
    
    public function objects(array $value = []): \Symfony\Config\PimcoreAdmin\ObjectsConfig
    {
        if (null === $this->objects) {
            $this->objects = new \Symfony\Config\PimcoreAdmin\ObjectsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "objects()" has already been initialized. You cannot pass values the second time you call objects().');
        }
    
        return $this->objects;
    }
    
    public function assets(array $value = []): \Symfony\Config\PimcoreAdmin\AssetsConfig
    {
        if (null === $this->assets) {
            $this->assets = new \Symfony\Config\PimcoreAdmin\AssetsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "assets()" has already been initialized. You cannot pass values the second time you call assets().');
        }
    
        return $this->assets;
    }
    
    public function documents(array $value = []): \Symfony\Config\PimcoreAdmin\DocumentsConfig
    {
        if (null === $this->documents) {
            $this->documents = new \Symfony\Config\PimcoreAdmin\DocumentsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "documents()" has already been initialized. You cannot pass values the second time you call documents().');
        }
    
        return $this->documents;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function adminLanguages($value): self
    {
        $this->adminLanguages = $value;
    
        return $this;
    }
    
    public function csrfProtection(array $value = []): \Symfony\Config\PimcoreAdmin\CsrfProtectionConfig
    {
        if (null === $this->csrfProtection) {
            $this->csrfProtection = new \Symfony\Config\PimcoreAdmin\CsrfProtectionConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "csrfProtection()" has already been initialized. You cannot pass values the second time you call csrfProtection().');
        }
    
        return $this->csrfProtection;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function customAdminPathIdentifier($value): self
    {
        $this->customAdminPathIdentifier = $value;
    
        return $this;
    }
    
    public function branding(array $value = []): \Symfony\Config\PimcoreAdmin\BrandingConfig
    {
        if (null === $this->branding) {
            $this->branding = new \Symfony\Config\PimcoreAdmin\BrandingConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "branding()" has already been initialized. You cannot pass values the second time you call branding().');
        }
    
        return $this->branding;
    }
    
    public function getExtensionAlias(): string
    {
        return 'pimcore_admin';
    }
            
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['gdpr_data_extractor'])) {
            $this->gdprDataExtractor = new \Symfony\Config\PimcoreAdmin\GdprDataExtractorConfig($value['gdpr_data_extractor']);
            unset($value['gdpr_data_extractor']);
        }
    
        if (isset($value['objects'])) {
            $this->objects = new \Symfony\Config\PimcoreAdmin\ObjectsConfig($value['objects']);
            unset($value['objects']);
        }
    
        if (isset($value['assets'])) {
            $this->assets = new \Symfony\Config\PimcoreAdmin\AssetsConfig($value['assets']);
            unset($value['assets']);
        }
    
        if (isset($value['documents'])) {
            $this->documents = new \Symfony\Config\PimcoreAdmin\DocumentsConfig($value['documents']);
            unset($value['documents']);
        }
    
        if (isset($value['admin_languages'])) {
            $this->adminLanguages = $value['admin_languages'];
            unset($value['admin_languages']);
        }
    
        if (isset($value['csrf_protection'])) {
            $this->csrfProtection = new \Symfony\Config\PimcoreAdmin\CsrfProtectionConfig($value['csrf_protection']);
            unset($value['csrf_protection']);
        }
    
        if (isset($value['custom_admin_path_identifier'])) {
            $this->customAdminPathIdentifier = $value['custom_admin_path_identifier'];
            unset($value['custom_admin_path_identifier']);
        }
    
        if (isset($value['branding'])) {
            $this->branding = new \Symfony\Config\PimcoreAdmin\BrandingConfig($value['branding']);
            unset($value['branding']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->gdprDataExtractor) {
            $output['gdpr_data_extractor'] = $this->gdprDataExtractor->toArray();
        }
        if (null !== $this->objects) {
            $output['objects'] = $this->objects->toArray();
        }
        if (null !== $this->assets) {
            $output['assets'] = $this->assets->toArray();
        }
        if (null !== $this->documents) {
            $output['documents'] = $this->documents->toArray();
        }
        if (null !== $this->adminLanguages) {
            $output['admin_languages'] = $this->adminLanguages;
        }
        if (null !== $this->csrfProtection) {
            $output['csrf_protection'] = $this->csrfProtection->toArray();
        }
        if (null !== $this->customAdminPathIdentifier) {
            $output['custom_admin_path_identifier'] = $this->customAdminPathIdentifier;
        }
        if (null !== $this->branding) {
            $output['branding'] = $this->branding->toArray();
        }
    
        return $output;
    }
    

}
