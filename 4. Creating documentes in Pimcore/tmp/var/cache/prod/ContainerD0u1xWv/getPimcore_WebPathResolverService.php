<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'pimcore.web_path_resolver' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/HttpKernel/WebPathResolver.php';

return $this->services['pimcore.web_path_resolver'] = new \Pimcore\HttpKernel\WebPathResolver();