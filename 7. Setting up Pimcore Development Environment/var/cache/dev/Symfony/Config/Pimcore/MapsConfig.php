<?php

namespace Symfony\Config\Pimcore;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class MapsConfig 
{
    private $tileLayerUrlTemplate;
    private $geocodingUrlTemplate;
    private $reverseGeocodingUrlTemplate;
    
    /**
     * @default 'https://a.tile.openstreetmap.org/{z}/{x}/{y}.png'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function tileLayerUrlTemplate($value): self
    {
        $this->tileLayerUrlTemplate = $value;
    
        return $this;
    }
    
    /**
     * @default 'https://nominatim.openstreetmap.org/search?q={q}&addressdetails=1&format=json&limit=1'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function geocodingUrlTemplate($value): self
    {
        $this->geocodingUrlTemplate = $value;
    
        return $this;
    }
    
    /**
     * @default 'https://nominatim.openstreetmap.org/reverse?format=json&lat={lat}&lon={lon}&addressdetails=1'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function reverseGeocodingUrlTemplate($value): self
    {
        $this->reverseGeocodingUrlTemplate = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['tile_layer_url_template'])) {
            $this->tileLayerUrlTemplate = $value['tile_layer_url_template'];
            unset($value['tile_layer_url_template']);
        }
    
        if (isset($value['geocoding_url_template'])) {
            $this->geocodingUrlTemplate = $value['geocoding_url_template'];
            unset($value['geocoding_url_template']);
        }
    
        if (isset($value['reverse_geocoding_url_template'])) {
            $this->reverseGeocodingUrlTemplate = $value['reverse_geocoding_url_template'];
            unset($value['reverse_geocoding_url_template']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->tileLayerUrlTemplate) {
            $output['tile_layer_url_template'] = $this->tileLayerUrlTemplate;
        }
        if (null !== $this->geocodingUrlTemplate) {
            $output['geocoding_url_template'] = $this->geocodingUrlTemplate;
        }
        if (null !== $this->reverseGeocodingUrlTemplate) {
            $output['reverse_geocoding_url_template'] = $this->reverseGeocodingUrlTemplate;
        }
    
        return $output;
    }
    

}
