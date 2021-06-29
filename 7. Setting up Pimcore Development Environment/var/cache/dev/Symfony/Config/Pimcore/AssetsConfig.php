<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Assets'.\DIRECTORY_SEPARATOR.'FrontendPrefixesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Assets'.\DIRECTORY_SEPARATOR.'ImageConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Assets'.\DIRECTORY_SEPARATOR.'VideoConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Assets'.\DIRECTORY_SEPARATOR.'VersionsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Assets'.\DIRECTORY_SEPARATOR.'MetadataConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class AssetsConfig 
{
    private $frontendPrefixes;
    private $previewImageThumbnail;
    private $defaultUploadPath;
    private $treePagingLimit;
    private $image;
    private $video;
    private $versions;
    private $iccRgbProfile;
    private $iccCmykProfile;
    private $hideEditImage;
    private $disableTreePreview;
    private $metadata;
    
    public function frontendPrefixes(array $value = []): \Symfony\Config\Pimcore\Assets\FrontendPrefixesConfig
    {
        if (null === $this->frontendPrefixes) {
            $this->frontendPrefixes = new \Symfony\Config\Pimcore\Assets\FrontendPrefixesConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "frontendPrefixes()" has already been initialized. You cannot pass values the second time you call frontendPrefixes().');
        }
    
        return $this->frontendPrefixes;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function previewImageThumbnail($value): self
    {
        $this->previewImageThumbnail = $value;
    
        return $this;
    }
    
    /**
     * @default '_default_upload_bucket'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultUploadPath($value): self
    {
        $this->defaultUploadPath = $value;
    
        return $this;
    }
    
    /**
     * @default 100
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function treePagingLimit($value): self
    {
        $this->treePagingLimit = $value;
    
        return $this;
    }
    
    public function image(array $value = []): \Symfony\Config\Pimcore\Assets\ImageConfig
    {
        if (null === $this->image) {
            $this->image = new \Symfony\Config\Pimcore\Assets\ImageConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "image()" has already been initialized. You cannot pass values the second time you call image().');
        }
    
        return $this->image;
    }
    
    public function video(array $value = []): \Symfony\Config\Pimcore\Assets\VideoConfig
    {
        if (null === $this->video) {
            $this->video = new \Symfony\Config\Pimcore\Assets\VideoConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "video()" has already been initialized. You cannot pass values the second time you call video().');
        }
    
        return $this->video;
    }
    
    public function versions(array $value = []): \Symfony\Config\Pimcore\Assets\VersionsConfig
    {
        if (null === $this->versions) {
            $this->versions = new \Symfony\Config\Pimcore\Assets\VersionsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "versions()" has already been initialized. You cannot pass values the second time you call versions().');
        }
    
        return $this->versions;
    }
    
    /**
     * Absolute path to default ICC RGB profile (if no embedded profile is given)
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function iccRgbProfile($value): self
    {
        $this->iccRgbProfile = $value;
    
        return $this;
    }
    
    /**
     * Absolute path to default ICC CMYK profile (if no embedded profile is given)
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function iccCmykProfile($value): self
    {
        $this->iccCmykProfile = $value;
    
        return $this;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function hideEditImage($value): self
    {
        $this->hideEditImage = $value;
    
        return $this;
    }
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function disableTreePreview($value): self
    {
        $this->disableTreePreview = $value;
    
        return $this;
    }
    
    public function metadata(array $value = []): \Symfony\Config\Pimcore\Assets\MetadataConfig
    {
        if (null === $this->metadata) {
            $this->metadata = new \Symfony\Config\Pimcore\Assets\MetadataConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "metadata()" has already been initialized. You cannot pass values the second time you call metadata().');
        }
    
        return $this->metadata;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['frontend_prefixes'])) {
            $this->frontendPrefixes = new \Symfony\Config\Pimcore\Assets\FrontendPrefixesConfig($value['frontend_prefixes']);
            unset($value['frontend_prefixes']);
        }
    
        if (isset($value['preview_image_thumbnail'])) {
            $this->previewImageThumbnail = $value['preview_image_thumbnail'];
            unset($value['preview_image_thumbnail']);
        }
    
        if (isset($value['default_upload_path'])) {
            $this->defaultUploadPath = $value['default_upload_path'];
            unset($value['default_upload_path']);
        }
    
        if (isset($value['tree_paging_limit'])) {
            $this->treePagingLimit = $value['tree_paging_limit'];
            unset($value['tree_paging_limit']);
        }
    
        if (isset($value['image'])) {
            $this->image = new \Symfony\Config\Pimcore\Assets\ImageConfig($value['image']);
            unset($value['image']);
        }
    
        if (isset($value['video'])) {
            $this->video = new \Symfony\Config\Pimcore\Assets\VideoConfig($value['video']);
            unset($value['video']);
        }
    
        if (isset($value['versions'])) {
            $this->versions = new \Symfony\Config\Pimcore\Assets\VersionsConfig($value['versions']);
            unset($value['versions']);
        }
    
        if (isset($value['icc_rgb_profile'])) {
            $this->iccRgbProfile = $value['icc_rgb_profile'];
            unset($value['icc_rgb_profile']);
        }
    
        if (isset($value['icc_cmyk_profile'])) {
            $this->iccCmykProfile = $value['icc_cmyk_profile'];
            unset($value['icc_cmyk_profile']);
        }
    
        if (isset($value['hide_edit_image'])) {
            $this->hideEditImage = $value['hide_edit_image'];
            unset($value['hide_edit_image']);
        }
    
        if (isset($value['disable_tree_preview'])) {
            $this->disableTreePreview = $value['disable_tree_preview'];
            unset($value['disable_tree_preview']);
        }
    
        if (isset($value['metadata'])) {
            $this->metadata = new \Symfony\Config\Pimcore\Assets\MetadataConfig($value['metadata']);
            unset($value['metadata']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->frontendPrefixes) {
            $output['frontend_prefixes'] = $this->frontendPrefixes->toArray();
        }
        if (null !== $this->previewImageThumbnail) {
            $output['preview_image_thumbnail'] = $this->previewImageThumbnail;
        }
        if (null !== $this->defaultUploadPath) {
            $output['default_upload_path'] = $this->defaultUploadPath;
        }
        if (null !== $this->treePagingLimit) {
            $output['tree_paging_limit'] = $this->treePagingLimit;
        }
        if (null !== $this->image) {
            $output['image'] = $this->image->toArray();
        }
        if (null !== $this->video) {
            $output['video'] = $this->video->toArray();
        }
        if (null !== $this->versions) {
            $output['versions'] = $this->versions->toArray();
        }
        if (null !== $this->iccRgbProfile) {
            $output['icc_rgb_profile'] = $this->iccRgbProfile;
        }
        if (null !== $this->iccCmykProfile) {
            $output['icc_cmyk_profile'] = $this->iccCmykProfile;
        }
        if (null !== $this->hideEditImage) {
            $output['hide_edit_image'] = $this->hideEditImage;
        }
        if (null !== $this->disableTreePreview) {
            $output['disable_tree_preview'] = $this->disableTreePreview;
        }
        if (null !== $this->metadata) {
            $output['metadata'] = $this->metadata->toArray();
        }
    
        return $output;
    }
    

}
