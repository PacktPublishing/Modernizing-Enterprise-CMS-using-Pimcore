<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'form.type.choice' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/FormTypeInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/AbstractType.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Form/Extension/Core/Type/ChoiceType.php';

return $this->privates['form.type.choice'] = new \Symfony\Component\Form\Extension\Core\Type\ChoiceType(($this->privates['form.choice_list_factory.cached'] ?? $this->load('getForm_ChoiceListFactory_CachedService.php')));
