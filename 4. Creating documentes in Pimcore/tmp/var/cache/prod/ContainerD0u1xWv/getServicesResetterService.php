<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'services_resetter' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/DependencyInjection/ServicesResetter.php';

return $this->services['services_resetter'] = new \Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter(new RewindableGenerator(function () {
    if (isset($this->services['cache.app'])) {
        yield 'cache.app' => ($this->services['cache.app'] ?? null);
    }
    if (isset($this->services['cache.system'])) {
        yield 'cache.system' => ($this->services['cache.system'] ?? null);
    }
    if (isset($this->privates['cache.validator'])) {
        yield 'cache.validator' => ($this->privates['cache.validator'] ?? null);
    }
    if (isset($this->privates['cache.serializer'])) {
        yield 'cache.serializer' => ($this->privates['cache.serializer'] ?? null);
    }
    if (isset($this->privates['cache.annotations'])) {
        yield 'cache.annotations' => ($this->privates['cache.annotations'] ?? null);
    }
    if (false) {
        yield 'cache.property_info' => null;
    }
    if (isset($this->privates['form.choice_list_factory.cached'])) {
        yield 'form.choice_list_factory.cached' => ($this->privates['form.choice_list_factory.cached'] ?? null);
    }
    if (isset($this->privates['debug.stopwatch'])) {
        yield 'debug.stopwatch' => ($this->privates['debug.stopwatch'] ?? null);
    }
    if (isset($this->services['security.token_storage'])) {
        yield 'security.token_storage' => ($this->services['security.token_storage'] ?? null);
    }
    if (isset($this->privates['cache.security_expression_language'])) {
        yield 'cache.security_expression_language' => ($this->privates['cache.security_expression_language'] ?? null);
    }
    if (isset($this->privates['monolog.handler.main'])) {
        yield 'monolog.handler.main' => ($this->privates['monolog.handler.main'] ?? null);
    }
    if (isset($this->privates['monolog.handler.console'])) {
        yield 'monolog.handler.console' => ($this->privates['monolog.handler.console'] ?? null);
    }
    if (isset($this->privates['swiftmailer.email_sender.listener'])) {
        yield 'swiftmailer.email_sender.listener' => ($this->privates['swiftmailer.email_sender.listener'] ?? null);
    }
    if (isset($this->services['doctrine'])) {
        yield 'doctrine' => ($this->services['doctrine'] ?? null);
    }
    if (false) {
        yield 'Pimcore\\Bundle\\CoreBundle\\DataCollector\\PimcoreDataCollector' => null;
    }
    if (false) {
        yield 'Pimcore\\Bundle\\CoreBundle\\DataCollector\\PimcoreTargetingDataCollector' => null;
    }
    if (false) {
        yield 'pimcore.cache.core.symfony_adapter.filesystem' => null;
    }
    if (false) {
        yield 'pimcore.cache.core.symfony_adapter.array' => null;
    }
}, function () {
    return 0 + (int) (isset($this->services['cache.app'])) + (int) (isset($this->services['cache.system'])) + (int) (isset($this->privates['cache.validator'])) + (int) (isset($this->privates['cache.serializer'])) + (int) (isset($this->privates['cache.annotations'])) + (int) (false) + (int) (isset($this->privates['form.choice_list_factory.cached'])) + (int) (isset($this->privates['debug.stopwatch'])) + (int) (isset($this->services['security.token_storage'])) + (int) (isset($this->privates['cache.security_expression_language'])) + (int) (isset($this->privates['monolog.handler.main'])) + (int) (isset($this->privates['monolog.handler.console'])) + (int) (isset($this->privates['swiftmailer.email_sender.listener'])) + (int) (isset($this->services['doctrine'])) + (int) (false) + (int) (false) + (int) (false) + (int) (false);
}), ['cache.app' => [0 => 'reset'], 'cache.system' => [0 => 'reset'], 'cache.validator' => [0 => 'reset'], 'cache.serializer' => [0 => 'reset'], 'cache.annotations' => [0 => 'reset'], 'cache.property_info' => [0 => 'reset'], 'form.choice_list_factory.cached' => [0 => 'reset'], 'debug.stopwatch' => [0 => 'reset'], 'security.token_storage' => [0 => 'disableUsageTracking', 1 => 'setToken'], 'cache.security_expression_language' => [0 => 'reset'], 'monolog.handler.main' => [0 => 'reset'], 'monolog.handler.console' => [0 => 'reset'], 'swiftmailer.email_sender.listener' => [0 => 'reset'], 'doctrine' => [0 => 'reset'], 'Pimcore\\Bundle\\CoreBundle\\DataCollector\\PimcoreDataCollector' => [0 => 'reset'], 'Pimcore\\Bundle\\CoreBundle\\DataCollector\\PimcoreTargetingDataCollector' => [0 => 'reset'], 'pimcore.cache.core.symfony_adapter.filesystem' => [0 => 'reset'], 'pimcore.cache.core.symfony_adapter.array' => [0 => 'reset']]);
