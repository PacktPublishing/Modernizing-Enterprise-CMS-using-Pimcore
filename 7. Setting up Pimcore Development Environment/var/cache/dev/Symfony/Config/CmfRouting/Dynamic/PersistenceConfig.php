<?php

namespace Symfony\Config\CmfRouting\Dynamic;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Persistence'.\DIRECTORY_SEPARATOR.'PhpcrConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Persistence'.\DIRECTORY_SEPARATOR.'OrmConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class PersistenceConfig 
{
    private $phpcr;
    private $orm;
    
    public function phpcr(array $value = []): \Symfony\Config\CmfRouting\Dynamic\Persistence\PhpcrConfig
    {
        if (null === $this->phpcr) {
            $this->phpcr = new \Symfony\Config\CmfRouting\Dynamic\Persistence\PhpcrConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "phpcr()" has already been initialized. You cannot pass values the second time you call phpcr().');
        }
    
        return $this->phpcr;
    }
    
    public function orm(array $value = []): \Symfony\Config\CmfRouting\Dynamic\Persistence\OrmConfig
    {
        if (null === $this->orm) {
            $this->orm = new \Symfony\Config\CmfRouting\Dynamic\Persistence\OrmConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "orm()" has already been initialized. You cannot pass values the second time you call orm().');
        }
    
        return $this->orm;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['phpcr'])) {
            $this->phpcr = new \Symfony\Config\CmfRouting\Dynamic\Persistence\PhpcrConfig($value['phpcr']);
            unset($value['phpcr']);
        }
    
        if (isset($value['orm'])) {
            $this->orm = new \Symfony\Config\CmfRouting\Dynamic\Persistence\OrmConfig($value['orm']);
            unset($value['orm']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->phpcr) {
            $output['phpcr'] = $this->phpcr->toArray();
        }
        if (null !== $this->orm) {
            $output['orm'] = $this->orm->toArray();
        }
    
        return $output;
    }
    

}
