<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\Bundle\AdminBundle\EventListener\AdminExceptionListener' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/EventListener/AdminExceptionListener.php';

$this->privates['Pimcore\\Bundle\\AdminBundle\\EventListener\\AdminExceptionListener'] = $instance = new \Pimcore\Bundle\AdminBundle\EventListener\AdminExceptionListener();

$instance->setPimcoreContextResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\PimcoreContextResolver'] ?? $this->getPimcoreContextResolverService()));

return $instance;
