<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Maintenance'.\DIRECTORY_SEPARATOR.'HousekeepingConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class MaintenanceConfig 
{
    private $housekeeping;
    
    public function housekeeping(array $value = []): \Symfony\Config\Pimcore\Maintenance\HousekeepingConfig
    {
        if (null === $this->housekeeping) {
            $this->housekeeping = new \Symfony\Config\Pimcore\Maintenance\HousekeepingConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "housekeeping()" has already been initialized. You cannot pass values the second time you call housekeeping().');
        }
    
        return $this->housekeeping;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['housekeeping'])) {
            $this->housekeeping = new \Symfony\Config\Pimcore\Maintenance\HousekeepingConfig($value['housekeeping']);
            unset($value['housekeeping']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->housekeeping) {
            $output['housekeeping'] = $this->housekeeping->toArray();
        }
    
        return $output;
    }
    

}
