<?php

namespace Symfony\Config\Pimcore\Assets;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Video'.\DIRECTORY_SEPARATOR.'ThumbnailsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class VideoConfig 
{
    private $thumbnails;
    
    public function thumbnails(array $value = []): \Symfony\Config\Pimcore\Assets\Video\ThumbnailsConfig
    {
        if (null === $this->thumbnails) {
            $this->thumbnails = new \Symfony\Config\Pimcore\Assets\Video\ThumbnailsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "thumbnails()" has already been initialized. You cannot pass values the second time you call thumbnails().');
        }
    
        return $this->thumbnails;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['thumbnails'])) {
            $this->thumbnails = new \Symfony\Config\Pimcore\Assets\Video\ThumbnailsConfig($value['thumbnails']);
            unset($value['thumbnails']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->thumbnails) {
            $output['thumbnails'] = $this->thumbnails->toArray();
        }
    
        return $output;
    }
    

}
