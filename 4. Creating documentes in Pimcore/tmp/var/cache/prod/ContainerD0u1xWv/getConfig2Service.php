<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\Analytics\Piwik\Config\Config' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Analytics/Piwik/Config/Config.php';

return ($this->privates['Pimcore\\Analytics\\Piwik\\Config\\ConfigProvider'] ?? ($this->privates['Pimcore\\Analytics\\Piwik\\Config\\ConfigProvider'] = new \Pimcore\Analytics\Piwik\Config\ConfigProvider()))->getConfig();
