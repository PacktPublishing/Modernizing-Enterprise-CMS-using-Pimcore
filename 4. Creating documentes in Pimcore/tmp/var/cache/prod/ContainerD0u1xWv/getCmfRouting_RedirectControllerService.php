<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'cmf_routing.redirect_controller' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony-cmf/routing-bundle/src/Controller/RedirectController.php';

return $this->services['cmf_routing.redirect_controller'] = new \Symfony\Cmf\Bundle\RoutingBundle\Controller\RedirectController(($this->services['router'] ?? $this->getRouterService()));
