<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Admin'.\DIRECTORY_SEPARATOR.'SessionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Admin'.\DIRECTORY_SEPARATOR.'UnauthenticatedRoutesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Admin'.\DIRECTORY_SEPARATOR.'TranslationsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class AdminConfig 
{
    private $session;
    private $unauthenticatedRoutes;
    private $translations;
    
    public function session(array $value = []): \Symfony\Config\Pimcore\Admin\SessionConfig
    {
        if (null === $this->session) {
            $this->session = new \Symfony\Config\Pimcore\Admin\SessionConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "session()" has already been initialized. You cannot pass values the second time you call session().');
        }
    
        return $this->session;
    }
    
    public function unauthenticatedRoutes(array $value = []): \Symfony\Config\Pimcore\Admin\UnauthenticatedRoutesConfig
    {
        return $this->unauthenticatedRoutes[] = new \Symfony\Config\Pimcore\Admin\UnauthenticatedRoutesConfig($value);
    }
    
    public function translations(array $value = []): \Symfony\Config\Pimcore\Admin\TranslationsConfig
    {
        if (null === $this->translations) {
            $this->translations = new \Symfony\Config\Pimcore\Admin\TranslationsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "translations()" has already been initialized. You cannot pass values the second time you call translations().');
        }
    
        return $this->translations;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['session'])) {
            $this->session = new \Symfony\Config\Pimcore\Admin\SessionConfig($value['session']);
            unset($value['session']);
        }
    
        if (isset($value['unauthenticated_routes'])) {
            $this->unauthenticatedRoutes = array_map(function ($v) { return new \Symfony\Config\Pimcore\Admin\UnauthenticatedRoutesConfig($v); }, $value['unauthenticated_routes']);
            unset($value['unauthenticated_routes']);
        }
    
        if (isset($value['translations'])) {
            $this->translations = new \Symfony\Config\Pimcore\Admin\TranslationsConfig($value['translations']);
            unset($value['translations']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->session) {
            $output['session'] = $this->session->toArray();
        }
        if (null !== $this->unauthenticatedRoutes) {
            $output['unauthenticated_routes'] = array_map(function ($v) { return $v->toArray(); }, $this->unauthenticatedRoutes);
        }
        if (null !== $this->translations) {
            $output['translations'] = $this->translations->toArray();
        }
    
        return $output;
    }
    

}
