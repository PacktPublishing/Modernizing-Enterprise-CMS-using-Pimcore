<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.n4ezAEP' shared service.

return $this->privates['.service_locator.n4ezAEP'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'csv' => ['privates', 'Pimcore\\Routing\\Redirect\\Csv', 'getCsvService.php', true],
], [
    'csv' => 'Pimcore\\Routing\\Redirect\\Csv',
]);
