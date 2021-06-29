<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'ErrorHandlingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'BundlesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'TranslationsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'MapsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'GeneralConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'MaintenanceConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'ServicesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'ObjectsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'AssetsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'DocumentsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'EncryptionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'ModelsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'RoutingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'FullPageCacheConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'ContextConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'AdminConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'WebProfilerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'SecurityConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'EmailConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'NewsletterConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'CustomReportConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'TargetingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'SitemapsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'WorkflowsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'HttpclientConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pimcore'.\DIRECTORY_SEPARATOR.'ApplicationlogConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class PimcoreConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $errorHandling;
    private $bundles;
    private $flags;
    private $translations;
    private $maps;
    private $general;
    private $maintenance;
    private $services;
    private $objects;
    private $assets;
    private $documents;
    private $encryption;
    private $models;
    private $routing;
    private $fullPageCache;
    private $context;
    private $admin;
    private $webProfiler;
    private $security;
    private $email;
    private $newsletter;
    private $customReport;
    private $targeting;
    private $sitemaps;
    private $workflows;
    private $httpclient;
    private $applicationlog;
    
    public function errorHandling(array $value = []): \Symfony\Config\Pimcore\ErrorHandlingConfig
    {
        if (null === $this->errorHandling) {
            $this->errorHandling = new \Symfony\Config\Pimcore\ErrorHandlingConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "errorHandling()" has already been initialized. You cannot pass values the second time you call errorHandling().');
        }
    
        return $this->errorHandling;
    }
    
    public function bundles(array $value = []): \Symfony\Config\Pimcore\BundlesConfig
    {
        if (null === $this->bundles) {
            $this->bundles = new \Symfony\Config\Pimcore\BundlesConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "bundles()" has already been initialized. You cannot pass values the second time you call bundles().');
        }
    
        return $this->bundles;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function flags($value): self
    {
        $this->flags = $value;
    
        return $this;
    }
    
    public function translations(array $value = []): \Symfony\Config\Pimcore\TranslationsConfig
    {
        if (null === $this->translations) {
            $this->translations = new \Symfony\Config\Pimcore\TranslationsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "translations()" has already been initialized. You cannot pass values the second time you call translations().');
        }
    
        return $this->translations;
    }
    
    public function maps(array $value = []): \Symfony\Config\Pimcore\MapsConfig
    {
        if (null === $this->maps) {
            $this->maps = new \Symfony\Config\Pimcore\MapsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "maps()" has already been initialized. You cannot pass values the second time you call maps().');
        }
    
        return $this->maps;
    }
    
    public function general(array $value = []): \Symfony\Config\Pimcore\GeneralConfig
    {
        if (null === $this->general) {
            $this->general = new \Symfony\Config\Pimcore\GeneralConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "general()" has already been initialized. You cannot pass values the second time you call general().');
        }
    
        return $this->general;
    }
    
    public function maintenance(array $value = []): \Symfony\Config\Pimcore\MaintenanceConfig
    {
        if (null === $this->maintenance) {
            $this->maintenance = new \Symfony\Config\Pimcore\MaintenanceConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "maintenance()" has already been initialized. You cannot pass values the second time you call maintenance().');
        }
    
        return $this->maintenance;
    }
    
    public function services(array $value = []): \Symfony\Config\Pimcore\ServicesConfig
    {
        if (null === $this->services) {
            $this->services = new \Symfony\Config\Pimcore\ServicesConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "services()" has already been initialized. You cannot pass values the second time you call services().');
        }
    
        return $this->services;
    }
    
    public function objects(array $value = []): \Symfony\Config\Pimcore\ObjectsConfig
    {
        if (null === $this->objects) {
            $this->objects = new \Symfony\Config\Pimcore\ObjectsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "objects()" has already been initialized. You cannot pass values the second time you call objects().');
        }
    
        return $this->objects;
    }
    
    public function assets(array $value = []): \Symfony\Config\Pimcore\AssetsConfig
    {
        if (null === $this->assets) {
            $this->assets = new \Symfony\Config\Pimcore\AssetsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "assets()" has already been initialized. You cannot pass values the second time you call assets().');
        }
    
        return $this->assets;
    }
    
    public function documents(array $value = []): \Symfony\Config\Pimcore\DocumentsConfig
    {
        if (null === $this->documents) {
            $this->documents = new \Symfony\Config\Pimcore\DocumentsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "documents()" has already been initialized. You cannot pass values the second time you call documents().');
        }
    
        return $this->documents;
    }
    
    public function encryption(array $value = []): \Symfony\Config\Pimcore\EncryptionConfig
    {
        if (null === $this->encryption) {
            $this->encryption = new \Symfony\Config\Pimcore\EncryptionConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "encryption()" has already been initialized. You cannot pass values the second time you call encryption().');
        }
    
        return $this->encryption;
    }
    
    public function models(array $value = []): \Symfony\Config\Pimcore\ModelsConfig
    {
        if (null === $this->models) {
            $this->models = new \Symfony\Config\Pimcore\ModelsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "models()" has already been initialized. You cannot pass values the second time you call models().');
        }
    
        return $this->models;
    }
    
    public function routing(array $value = []): \Symfony\Config\Pimcore\RoutingConfig
    {
        if (null === $this->routing) {
            $this->routing = new \Symfony\Config\Pimcore\RoutingConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "routing()" has already been initialized. You cannot pass values the second time you call routing().');
        }
    
        return $this->routing;
    }
    
    public function fullPageCache(array $value = []): \Symfony\Config\Pimcore\FullPageCacheConfig
    {
        if (null === $this->fullPageCache) {
            $this->fullPageCache = new \Symfony\Config\Pimcore\FullPageCacheConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "fullPageCache()" has already been initialized. You cannot pass values the second time you call fullPageCache().');
        }
    
        return $this->fullPageCache;
    }
    
    public function context(string $name, array $value = []): \Symfony\Config\Pimcore\ContextConfig
    {
        if (!isset($this->context[$name])) {
            return $this->context[$name] = new \Symfony\Config\Pimcore\ContextConfig($value);
        }
        if ([] === $value) {
            return $this->context[$name];
        }
    
        throw new InvalidConfigurationException('The node created by "context()" has already been initialized. You cannot pass values the second time you call context().');
    }
    
    public function admin(array $value = []): \Symfony\Config\Pimcore\AdminConfig
    {
        if (null === $this->admin) {
            $this->admin = new \Symfony\Config\Pimcore\AdminConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "admin()" has already been initialized. You cannot pass values the second time you call admin().');
        }
    
        return $this->admin;
    }
    
    public function webProfiler(array $value = []): \Symfony\Config\Pimcore\WebProfilerConfig
    {
        if (null === $this->webProfiler) {
            $this->webProfiler = new \Symfony\Config\Pimcore\WebProfilerConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "webProfiler()" has already been initialized. You cannot pass values the second time you call webProfiler().');
        }
    
        return $this->webProfiler;
    }
    
    public function security(array $value = []): \Symfony\Config\Pimcore\SecurityConfig
    {
        if (null === $this->security) {
            $this->security = new \Symfony\Config\Pimcore\SecurityConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "security()" has already been initialized. You cannot pass values the second time you call security().');
        }
    
        return $this->security;
    }
    
    public function email(array $value = []): \Symfony\Config\Pimcore\EmailConfig
    {
        if (null === $this->email) {
            $this->email = new \Symfony\Config\Pimcore\EmailConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "email()" has already been initialized. You cannot pass values the second time you call email().');
        }
    
        return $this->email;
    }
    
    public function newsletter(array $value = []): \Symfony\Config\Pimcore\NewsletterConfig
    {
        if (null === $this->newsletter) {
            $this->newsletter = new \Symfony\Config\Pimcore\NewsletterConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "newsletter()" has already been initialized. You cannot pass values the second time you call newsletter().');
        }
    
        return $this->newsletter;
    }
    
    public function customReport(array $value = []): \Symfony\Config\Pimcore\CustomReportConfig
    {
        if (null === $this->customReport) {
            $this->customReport = new \Symfony\Config\Pimcore\CustomReportConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "customReport()" has already been initialized. You cannot pass values the second time you call customReport().');
        }
    
        return $this->customReport;
    }
    
    public function targeting(array $value = []): \Symfony\Config\Pimcore\TargetingConfig
    {
        if (null === $this->targeting) {
            $this->targeting = new \Symfony\Config\Pimcore\TargetingConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "targeting()" has already been initialized. You cannot pass values the second time you call targeting().');
        }
    
        return $this->targeting;
    }
    
    public function sitemaps(array $value = []): \Symfony\Config\Pimcore\SitemapsConfig
    {
        if (null === $this->sitemaps) {
            $this->sitemaps = new \Symfony\Config\Pimcore\SitemapsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "sitemaps()" has already been initialized. You cannot pass values the second time you call sitemaps().');
        }
    
        return $this->sitemaps;
    }
    
    public function workflows(string $name, array $value = []): \Symfony\Config\Pimcore\WorkflowsConfig
    {
        if (!isset($this->workflows[$name])) {
            return $this->workflows[$name] = new \Symfony\Config\Pimcore\WorkflowsConfig($value);
        }
        if ([] === $value) {
            return $this->workflows[$name];
        }
    
        throw new InvalidConfigurationException('The node created by "workflows()" has already been initialized. You cannot pass values the second time you call workflows().');
    }
    
    public function httpclient(array $value = []): \Symfony\Config\Pimcore\HttpclientConfig
    {
        if (null === $this->httpclient) {
            $this->httpclient = new \Symfony\Config\Pimcore\HttpclientConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "httpclient()" has already been initialized. You cannot pass values the second time you call httpclient().');
        }
    
        return $this->httpclient;
    }
    
    public function applicationlog(array $value = []): \Symfony\Config\Pimcore\ApplicationlogConfig
    {
        if (null === $this->applicationlog) {
            $this->applicationlog = new \Symfony\Config\Pimcore\ApplicationlogConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "applicationlog()" has already been initialized. You cannot pass values the second time you call applicationlog().');
        }
    
        return $this->applicationlog;
    }
    
    public function getExtensionAlias(): string
    {
        return 'pimcore';
    }
            
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['error_handling'])) {
            $this->errorHandling = new \Symfony\Config\Pimcore\ErrorHandlingConfig($value['error_handling']);
            unset($value['error_handling']);
        }
    
        if (isset($value['bundles'])) {
            $this->bundles = new \Symfony\Config\Pimcore\BundlesConfig($value['bundles']);
            unset($value['bundles']);
        }
    
        if (isset($value['flags'])) {
            $this->flags = $value['flags'];
            unset($value['flags']);
        }
    
        if (isset($value['translations'])) {
            $this->translations = new \Symfony\Config\Pimcore\TranslationsConfig($value['translations']);
            unset($value['translations']);
        }
    
        if (isset($value['maps'])) {
            $this->maps = new \Symfony\Config\Pimcore\MapsConfig($value['maps']);
            unset($value['maps']);
        }
    
        if (isset($value['general'])) {
            $this->general = new \Symfony\Config\Pimcore\GeneralConfig($value['general']);
            unset($value['general']);
        }
    
        if (isset($value['maintenance'])) {
            $this->maintenance = new \Symfony\Config\Pimcore\MaintenanceConfig($value['maintenance']);
            unset($value['maintenance']);
        }
    
        if (isset($value['services'])) {
            $this->services = new \Symfony\Config\Pimcore\ServicesConfig($value['services']);
            unset($value['services']);
        }
    
        if (isset($value['objects'])) {
            $this->objects = new \Symfony\Config\Pimcore\ObjectsConfig($value['objects']);
            unset($value['objects']);
        }
    
        if (isset($value['assets'])) {
            $this->assets = new \Symfony\Config\Pimcore\AssetsConfig($value['assets']);
            unset($value['assets']);
        }
    
        if (isset($value['documents'])) {
            $this->documents = new \Symfony\Config\Pimcore\DocumentsConfig($value['documents']);
            unset($value['documents']);
        }
    
        if (isset($value['encryption'])) {
            $this->encryption = new \Symfony\Config\Pimcore\EncryptionConfig($value['encryption']);
            unset($value['encryption']);
        }
    
        if (isset($value['models'])) {
            $this->models = new \Symfony\Config\Pimcore\ModelsConfig($value['models']);
            unset($value['models']);
        }
    
        if (isset($value['routing'])) {
            $this->routing = new \Symfony\Config\Pimcore\RoutingConfig($value['routing']);
            unset($value['routing']);
        }
    
        if (isset($value['full_page_cache'])) {
            $this->fullPageCache = new \Symfony\Config\Pimcore\FullPageCacheConfig($value['full_page_cache']);
            unset($value['full_page_cache']);
        }
    
        if (isset($value['context'])) {
            $this->context = array_map(function ($v) { return new \Symfony\Config\Pimcore\ContextConfig($v); }, $value['context']);
            unset($value['context']);
        }
    
        if (isset($value['admin'])) {
            $this->admin = new \Symfony\Config\Pimcore\AdminConfig($value['admin']);
            unset($value['admin']);
        }
    
        if (isset($value['web_profiler'])) {
            $this->webProfiler = new \Symfony\Config\Pimcore\WebProfilerConfig($value['web_profiler']);
            unset($value['web_profiler']);
        }
    
        if (isset($value['security'])) {
            $this->security = new \Symfony\Config\Pimcore\SecurityConfig($value['security']);
            unset($value['security']);
        }
    
        if (isset($value['email'])) {
            $this->email = new \Symfony\Config\Pimcore\EmailConfig($value['email']);
            unset($value['email']);
        }
    
        if (isset($value['newsletter'])) {
            $this->newsletter = new \Symfony\Config\Pimcore\NewsletterConfig($value['newsletter']);
            unset($value['newsletter']);
        }
    
        if (isset($value['custom_report'])) {
            $this->customReport = new \Symfony\Config\Pimcore\CustomReportConfig($value['custom_report']);
            unset($value['custom_report']);
        }
    
        if (isset($value['targeting'])) {
            $this->targeting = new \Symfony\Config\Pimcore\TargetingConfig($value['targeting']);
            unset($value['targeting']);
        }
    
        if (isset($value['sitemaps'])) {
            $this->sitemaps = new \Symfony\Config\Pimcore\SitemapsConfig($value['sitemaps']);
            unset($value['sitemaps']);
        }
    
        if (isset($value['workflows'])) {
            $this->workflows = array_map(function ($v) { return new \Symfony\Config\Pimcore\WorkflowsConfig($v); }, $value['workflows']);
            unset($value['workflows']);
        }
    
        if (isset($value['httpclient'])) {
            $this->httpclient = new \Symfony\Config\Pimcore\HttpclientConfig($value['httpclient']);
            unset($value['httpclient']);
        }
    
        if (isset($value['applicationlog'])) {
            $this->applicationlog = new \Symfony\Config\Pimcore\ApplicationlogConfig($value['applicationlog']);
            unset($value['applicationlog']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->errorHandling) {
            $output['error_handling'] = $this->errorHandling->toArray();
        }
        if (null !== $this->bundles) {
            $output['bundles'] = $this->bundles->toArray();
        }
        if (null !== $this->flags) {
            $output['flags'] = $this->flags;
        }
        if (null !== $this->translations) {
            $output['translations'] = $this->translations->toArray();
        }
        if (null !== $this->maps) {
            $output['maps'] = $this->maps->toArray();
        }
        if (null !== $this->general) {
            $output['general'] = $this->general->toArray();
        }
        if (null !== $this->maintenance) {
            $output['maintenance'] = $this->maintenance->toArray();
        }
        if (null !== $this->services) {
            $output['services'] = $this->services->toArray();
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
        if (null !== $this->encryption) {
            $output['encryption'] = $this->encryption->toArray();
        }
        if (null !== $this->models) {
            $output['models'] = $this->models->toArray();
        }
        if (null !== $this->routing) {
            $output['routing'] = $this->routing->toArray();
        }
        if (null !== $this->fullPageCache) {
            $output['full_page_cache'] = $this->fullPageCache->toArray();
        }
        if (null !== $this->context) {
            $output['context'] = array_map(function ($v) { return $v->toArray(); }, $this->context);
        }
        if (null !== $this->admin) {
            $output['admin'] = $this->admin->toArray();
        }
        if (null !== $this->webProfiler) {
            $output['web_profiler'] = $this->webProfiler->toArray();
        }
        if (null !== $this->security) {
            $output['security'] = $this->security->toArray();
        }
        if (null !== $this->email) {
            $output['email'] = $this->email->toArray();
        }
        if (null !== $this->newsletter) {
            $output['newsletter'] = $this->newsletter->toArray();
        }
        if (null !== $this->customReport) {
            $output['custom_report'] = $this->customReport->toArray();
        }
        if (null !== $this->targeting) {
            $output['targeting'] = $this->targeting->toArray();
        }
        if (null !== $this->sitemaps) {
            $output['sitemaps'] = $this->sitemaps->toArray();
        }
        if (null !== $this->workflows) {
            $output['workflows'] = array_map(function ($v) { return $v->toArray(); }, $this->workflows);
        }
        if (null !== $this->httpclient) {
            $output['httpclient'] = $this->httpclient->toArray();
        }
        if (null !== $this->applicationlog) {
            $output['applicationlog'] = $this->applicationlog->toArray();
        }
    
        return $output;
    }
    

}
