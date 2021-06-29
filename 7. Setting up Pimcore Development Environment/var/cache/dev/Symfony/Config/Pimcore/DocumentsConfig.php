<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Documents'.\DIRECTORY_SEPARATOR.'VersionsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Documents'.\DIRECTORY_SEPARATOR.'ErrorPagesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Documents'.\DIRECTORY_SEPARATOR.'EditablesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Documents'.\DIRECTORY_SEPARATOR.'AreasConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Documents'.\DIRECTORY_SEPARATOR.'NewsletterConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Documents'.\DIRECTORY_SEPARATOR.'WebToPrintConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class DocumentsConfig 
{
    private $versions;
    private $defaultController;
    private $errorPages;
    private $allowTrailingSlash;
    private $generatePreview;
    private $treePagingLimit;
    private $editables;
    private $areas;
    private $newsletter;
    private $webToPrint;
    private $autoSaveInterval;
    
    public function versions(array $value = []): \Symfony\Config\Pimcore\Documents\VersionsConfig
    {
        if (null === $this->versions) {
            $this->versions = new \Symfony\Config\Pimcore\Documents\VersionsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "versions()" has already been initialized. You cannot pass values the second time you call versions().');
        }
    
        return $this->versions;
    }
    
    /**
     * @default 'App\\Controller\\DefaultController::defaultAction'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultController($value): self
    {
        $this->defaultController = $value;
    
        return $this;
    }
    
    public function errorPages(array $value = []): \Symfony\Config\Pimcore\Documents\ErrorPagesConfig
    {
        if (null === $this->errorPages) {
            $this->errorPages = new \Symfony\Config\Pimcore\Documents\ErrorPagesConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "errorPages()" has already been initialized. You cannot pass values the second time you call errorPages().');
        }
    
        return $this->errorPages;
    }
    
    /**
     * @default 'no'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function allowTrailingSlash($value): self
    {
        $this->allowTrailingSlash = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function generatePreview($value): self
    {
        $this->generatePreview = $value;
    
        return $this;
    }
    
    /**
     * @default 50
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function treePagingLimit($value): self
    {
        $this->treePagingLimit = $value;
    
        return $this;
    }
    
    public function editables(array $value = []): \Symfony\Config\Pimcore\Documents\EditablesConfig
    {
        if (null === $this->editables) {
            $this->editables = new \Symfony\Config\Pimcore\Documents\EditablesConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "editables()" has already been initialized. You cannot pass values the second time you call editables().');
        }
    
        return $this->editables;
    }
    
    public function areas(array $value = []): \Symfony\Config\Pimcore\Documents\AreasConfig
    {
        if (null === $this->areas) {
            $this->areas = new \Symfony\Config\Pimcore\Documents\AreasConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "areas()" has already been initialized. You cannot pass values the second time you call areas().');
        }
    
        return $this->areas;
    }
    
    public function newsletter(array $value = []): \Symfony\Config\Pimcore\Documents\NewsletterConfig
    {
        if (null === $this->newsletter) {
            $this->newsletter = new \Symfony\Config\Pimcore\Documents\NewsletterConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "newsletter()" has already been initialized. You cannot pass values the second time you call newsletter().');
        }
    
        return $this->newsletter;
    }
    
    public function webToPrint(array $value = []): \Symfony\Config\Pimcore\Documents\WebToPrintConfig
    {
        if (null === $this->webToPrint) {
            $this->webToPrint = new \Symfony\Config\Pimcore\Documents\WebToPrintConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "webToPrint()" has already been initialized. You cannot pass values the second time you call webToPrint().');
        }
    
        return $this->webToPrint;
    }
    
    /**
     * @default 60
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function autoSaveInterval($value): self
    {
        $this->autoSaveInterval = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['versions'])) {
            $this->versions = new \Symfony\Config\Pimcore\Documents\VersionsConfig($value['versions']);
            unset($value['versions']);
        }
    
        if (isset($value['default_controller'])) {
            $this->defaultController = $value['default_controller'];
            unset($value['default_controller']);
        }
    
        if (isset($value['error_pages'])) {
            $this->errorPages = new \Symfony\Config\Pimcore\Documents\ErrorPagesConfig($value['error_pages']);
            unset($value['error_pages']);
        }
    
        if (isset($value['allow_trailing_slash'])) {
            $this->allowTrailingSlash = $value['allow_trailing_slash'];
            unset($value['allow_trailing_slash']);
        }
    
        if (isset($value['generate_preview'])) {
            $this->generatePreview = $value['generate_preview'];
            unset($value['generate_preview']);
        }
    
        if (isset($value['tree_paging_limit'])) {
            $this->treePagingLimit = $value['tree_paging_limit'];
            unset($value['tree_paging_limit']);
        }
    
        if (isset($value['editables'])) {
            $this->editables = new \Symfony\Config\Pimcore\Documents\EditablesConfig($value['editables']);
            unset($value['editables']);
        }
    
        if (isset($value['areas'])) {
            $this->areas = new \Symfony\Config\Pimcore\Documents\AreasConfig($value['areas']);
            unset($value['areas']);
        }
    
        if (isset($value['newsletter'])) {
            $this->newsletter = new \Symfony\Config\Pimcore\Documents\NewsletterConfig($value['newsletter']);
            unset($value['newsletter']);
        }
    
        if (isset($value['web_to_print'])) {
            $this->webToPrint = new \Symfony\Config\Pimcore\Documents\WebToPrintConfig($value['web_to_print']);
            unset($value['web_to_print']);
        }
    
        if (isset($value['auto_save_interval'])) {
            $this->autoSaveInterval = $value['auto_save_interval'];
            unset($value['auto_save_interval']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->versions) {
            $output['versions'] = $this->versions->toArray();
        }
        if (null !== $this->defaultController) {
            $output['default_controller'] = $this->defaultController;
        }
        if (null !== $this->errorPages) {
            $output['error_pages'] = $this->errorPages->toArray();
        }
        if (null !== $this->allowTrailingSlash) {
            $output['allow_trailing_slash'] = $this->allowTrailingSlash;
        }
        if (null !== $this->generatePreview) {
            $output['generate_preview'] = $this->generatePreview;
        }
        if (null !== $this->treePagingLimit) {
            $output['tree_paging_limit'] = $this->treePagingLimit;
        }
        if (null !== $this->editables) {
            $output['editables'] = $this->editables->toArray();
        }
        if (null !== $this->areas) {
            $output['areas'] = $this->areas->toArray();
        }
        if (null !== $this->newsletter) {
            $output['newsletter'] = $this->newsletter->toArray();
        }
        if (null !== $this->webToPrint) {
            $output['web_to_print'] = $this->webToPrint->toArray();
        }
        if (null !== $this->autoSaveInterval) {
            $output['auto_save_interval'] = $this->autoSaveInterval;
        }
    
        return $output;
    }
    

}
