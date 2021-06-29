<?php

namespace Symfony\Config\Pimcore\Assets;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Image'.\DIRECTORY_SEPARATOR.'LowQualityImagePreviewConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Image'.\DIRECTORY_SEPARATOR.'FocalPointDetectionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Image'.\DIRECTORY_SEPARATOR.'ThumbnailsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class ImageConfig 
{
    private $lowQualityImagePreview;
    private $focalPointDetection;
    private $thumbnails;
    
    public function lowQualityImagePreview(array $value = []): \Symfony\Config\Pimcore\Assets\Image\LowQualityImagePreviewConfig
    {
        if (null === $this->lowQualityImagePreview) {
            $this->lowQualityImagePreview = new \Symfony\Config\Pimcore\Assets\Image\LowQualityImagePreviewConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "lowQualityImagePreview()" has already been initialized. You cannot pass values the second time you call lowQualityImagePreview().');
        }
    
        return $this->lowQualityImagePreview;
    }
    
    public function focalPointDetection(array $value = []): \Symfony\Config\Pimcore\Assets\Image\FocalPointDetectionConfig
    {
        if (null === $this->focalPointDetection) {
            $this->focalPointDetection = new \Symfony\Config\Pimcore\Assets\Image\FocalPointDetectionConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "focalPointDetection()" has already been initialized. You cannot pass values the second time you call focalPointDetection().');
        }
    
        return $this->focalPointDetection;
    }
    
    public function thumbnails(array $value = []): \Symfony\Config\Pimcore\Assets\Image\ThumbnailsConfig
    {
        if (null === $this->thumbnails) {
            $this->thumbnails = new \Symfony\Config\Pimcore\Assets\Image\ThumbnailsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "thumbnails()" has already been initialized. You cannot pass values the second time you call thumbnails().');
        }
    
        return $this->thumbnails;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['low_quality_image_preview'])) {
            $this->lowQualityImagePreview = new \Symfony\Config\Pimcore\Assets\Image\LowQualityImagePreviewConfig($value['low_quality_image_preview']);
            unset($value['low_quality_image_preview']);
        }
    
        if (isset($value['focal_point_detection'])) {
            $this->focalPointDetection = new \Symfony\Config\Pimcore\Assets\Image\FocalPointDetectionConfig($value['focal_point_detection']);
            unset($value['focal_point_detection']);
        }
    
        if (isset($value['thumbnails'])) {
            $this->thumbnails = new \Symfony\Config\Pimcore\Assets\Image\ThumbnailsConfig($value['thumbnails']);
            unset($value['thumbnails']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->lowQualityImagePreview) {
            $output['low_quality_image_preview'] = $this->lowQualityImagePreview->toArray();
        }
        if (null !== $this->focalPointDetection) {
            $output['focal_point_detection'] = $this->focalPointDetection->toArray();
        }
        if (null !== $this->thumbnails) {
            $output['thumbnails'] = $this->thumbnails->toArray();
        }
    
        return $output;
    }
    

}
