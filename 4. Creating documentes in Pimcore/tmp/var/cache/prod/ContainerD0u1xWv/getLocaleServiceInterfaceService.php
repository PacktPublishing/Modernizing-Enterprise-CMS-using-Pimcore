<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'Pimcore\Localization\LocaleServiceInterface' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Localization/LocaleServiceInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Localization/LocaleService.php';

return $this->services['Pimcore\\Localization\\LocaleServiceInterface'] = new \Pimcore\Localization\LocaleService(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $this->getTranslatorInterfaceService()));
