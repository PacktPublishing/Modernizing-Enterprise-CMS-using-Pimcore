<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'mime_types' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Mime/MimeTypeGuesserInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Mime/MimeTypesInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Mime/MimeTypes.php';

$this->privates['mime_types'] = $instance = new \Symfony\Component\Mime\MimeTypes();

$instance->setDefault($instance);

return $instance;
