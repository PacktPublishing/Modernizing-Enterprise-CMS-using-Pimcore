<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'swiftmailer.command.send_email' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Console/Command/Command.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/swiftmailer-bundle/Command/AbstractSwiftMailerCommand.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/swiftmailer-bundle/Command/SendEmailCommand.php';

$this->privates['swiftmailer.command.send_email'] = $instance = new \Symfony\Bundle\SwiftmailerBundle\Command\SendEmailCommand();

$instance->setName('swiftmailer:spool:send');

return $instance;
