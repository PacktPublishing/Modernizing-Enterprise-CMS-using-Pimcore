<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\Controller\ArgumentValueResolver\ViewModelValueResolver' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Controller/ArgumentValueResolverInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Controller/ArgumentValueResolver/ViewModelValueResolver.php';

return $this->privates['Pimcore\\Controller\\ArgumentValueResolver\\ViewModelValueResolver'] = new \Pimcore\Controller\ArgumentValueResolver\ViewModelValueResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\ViewModelResolver'] ?? $this->getViewModelResolverService()));
