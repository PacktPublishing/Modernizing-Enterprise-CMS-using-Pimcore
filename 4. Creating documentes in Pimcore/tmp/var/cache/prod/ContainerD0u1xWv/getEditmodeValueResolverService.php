<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Pimcore\Controller\ArgumentValueResolver\EditmodeValueResolver' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Controller/ArgumentValueResolverInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Controller/ArgumentValueResolver/EditmodeValueResolver.php';

return $this->privates['Pimcore\\Controller\\ArgumentValueResolver\\EditmodeValueResolver'] = new \Pimcore\Controller\ArgumentValueResolver\EditmodeValueResolver(($this->services['Pimcore\\Http\\Request\\Resolver\\EditmodeResolver'] ?? $this->getEditmodeResolverService()));
