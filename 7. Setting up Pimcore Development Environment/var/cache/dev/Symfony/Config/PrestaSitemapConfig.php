<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'PrestaSitemap'.\DIRECTORY_SEPARATOR.'DefaultsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'PrestaSitemap'.\DIRECTORY_SEPARATOR.'AlternateConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class PrestaSitemapConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $generator;
    private $dumper;
    private $timetolive;
    private $sitemapFilePrefix;
    private $itemsBySet;
    private $routeAnnotationListener;
    private $dumpDirectory;
    private $defaults;
    private $defaultSection;
    private $alternate;
    
    /**
     * @default 'presta_sitemap.generator_default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function generator($value): self
    {
        $this->generator = $value;
    
        return $this;
    }
    
    /**
     * @default 'presta_sitemap.dumper_default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dumper($value): self
    {
        $this->dumper = $value;
    
        return $this;
    }
    
    /**
     * @default 3600
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function timetolive($value): self
    {
        $this->timetolive = $value;
    
        return $this;
    }
    
    /**
     * Sets sitemap filename prefix defaults to "sitemap" -> sitemap.xml (for index); sitemap.<section>.xml(.gz) (for sitemaps)
     * @default 'sitemap'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function sitemapFilePrefix($value): self
    {
        $this->sitemapFilePrefix = $value;
    
        return $this;
    }
    
    /**
     * The maximum number of items allowed in single sitemap.
     * @default 50000
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function itemsBySet($value): self
    {
        $this->itemsBySet = $value;
    
        return $this;
    }
    
    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function routeAnnotationListener($value): self
    {
        $this->routeAnnotationListener = $value;
    
        return $this;
    }
    
    /**
     * The directory to which the sitemap will be dumped. It can be either absolute, or relative (to the place where the command will be triggered). Default to Symfony's public dir.
     * @default '%kernel.project_dir%/public'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dumpDirectory($value): self
    {
        $this->dumpDirectory = $value;
    
        return $this;
    }
    
    public function defaults(array $value = []): \Symfony\Config\PrestaSitemap\DefaultsConfig
    {
        if (null === $this->defaults) {
            $this->defaults = new \Symfony\Config\PrestaSitemap\DefaultsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "defaults()" has already been initialized. You cannot pass values the second time you call defaults().');
        }
    
        return $this->defaults;
    }
    
    /**
     * The default section in which static routes are registered.
     * @default 'default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultSection($value): self
    {
        $this->defaultSection = $value;
    
        return $this;
    }
    
    public function alternate(array $value = []): \Symfony\Config\PrestaSitemap\AlternateConfig
    {
        if (null === $this->alternate) {
            $this->alternate = new \Symfony\Config\PrestaSitemap\AlternateConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "alternate()" has already been initialized. You cannot pass values the second time you call alternate().');
        }
    
        return $this->alternate;
    }
    
    public function getExtensionAlias(): string
    {
        return 'presta_sitemap';
    }
            
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['generator'])) {
            $this->generator = $value['generator'];
            unset($value['generator']);
        }
    
        if (isset($value['dumper'])) {
            $this->dumper = $value['dumper'];
            unset($value['dumper']);
        }
    
        if (isset($value['timetolive'])) {
            $this->timetolive = $value['timetolive'];
            unset($value['timetolive']);
        }
    
        if (isset($value['sitemap_file_prefix'])) {
            $this->sitemapFilePrefix = $value['sitemap_file_prefix'];
            unset($value['sitemap_file_prefix']);
        }
    
        if (isset($value['items_by_set'])) {
            $this->itemsBySet = $value['items_by_set'];
            unset($value['items_by_set']);
        }
    
        if (isset($value['route_annotation_listener'])) {
            $this->routeAnnotationListener = $value['route_annotation_listener'];
            unset($value['route_annotation_listener']);
        }
    
        if (isset($value['dump_directory'])) {
            $this->dumpDirectory = $value['dump_directory'];
            unset($value['dump_directory']);
        }
    
        if (isset($value['defaults'])) {
            $this->defaults = new \Symfony\Config\PrestaSitemap\DefaultsConfig($value['defaults']);
            unset($value['defaults']);
        }
    
        if (isset($value['default_section'])) {
            $this->defaultSection = $value['default_section'];
            unset($value['default_section']);
        }
    
        if (isset($value['alternate'])) {
            $this->alternate = new \Symfony\Config\PrestaSitemap\AlternateConfig($value['alternate']);
            unset($value['alternate']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->generator) {
            $output['generator'] = $this->generator;
        }
        if (null !== $this->dumper) {
            $output['dumper'] = $this->dumper;
        }
        if (null !== $this->timetolive) {
            $output['timetolive'] = $this->timetolive;
        }
        if (null !== $this->sitemapFilePrefix) {
            $output['sitemap_file_prefix'] = $this->sitemapFilePrefix;
        }
        if (null !== $this->itemsBySet) {
            $output['items_by_set'] = $this->itemsBySet;
        }
        if (null !== $this->routeAnnotationListener) {
            $output['route_annotation_listener'] = $this->routeAnnotationListener;
        }
        if (null !== $this->dumpDirectory) {
            $output['dump_directory'] = $this->dumpDirectory;
        }
        if (null !== $this->defaults) {
            $output['defaults'] = $this->defaults->toArray();
        }
        if (null !== $this->defaultSection) {
            $output['default_section'] = $this->defaultSection;
        }
        if (null !== $this->alternate) {
            $output['alternate'] = $this->alternate->toArray();
        }
    
        return $output;
    }
    

}
