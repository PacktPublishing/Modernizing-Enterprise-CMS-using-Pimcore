<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'swiftmailer.mailer.pimcore_mailer' shared service.

include_once \dirname(__DIR__, 4).'/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mailer.php';

return $this->services['swiftmailer.mailer.pimcore_mailer'] = new \Swift_Mailer(($this->services['swiftmailer.mailer.pimcore_mailer.transport'] ?? $this->load('getSwiftmailer_Mailer_PimcoreMailer_TransportService.php')));