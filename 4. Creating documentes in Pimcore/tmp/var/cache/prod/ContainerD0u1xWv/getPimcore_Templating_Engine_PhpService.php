<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'pimcore.templating.engine.php' shared service.

@trigger_error('The "pimcore.templating.engine.php" service is deprecated since Symfony 4.3 and will be removed in 5.0.', E_USER_DEPRECATED);

$this->services['pimcore.templating.engine.php'] = $instance = new \Pimcore\Templating\PhpEngine(($this->privates['templating.name_parser'] ?? $this->load('getTemplating_NameParserService.php')), new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'Pimcore\\Templating\\Helper\\Action' => ['services', 'pimcore.templating.view_helper.action', 'getPimcore_Templating_ViewHelper_ActionService.php', true],
    'Pimcore\\Templating\\Helper\\BreachAttackRandomContent' => ['privates', 'Pimcore\\Templating\\Helper\\BreachAttackRandomContent', 'getBreachAttackRandomContentService.php', true],
    'Pimcore\\Templating\\Helper\\Cache' => ['services', 'pimcore.templating.view_helper.cache', 'getPimcore_Templating_ViewHelper_CacheService.php', true],
    'Pimcore\\Templating\\Helper\\Device' => ['services', 'pimcore.templating.view_helper.device', 'getPimcore_Templating_ViewHelper_DeviceService.php', true],
    'Pimcore\\Templating\\Helper\\GetAllParams' => ['services', 'pimcore.templating.view_helper.get_all_params', 'getPimcore_Templating_ViewHelper_GetAllParamsService.php', true],
    'Pimcore\\Templating\\Helper\\GetParam' => ['services', 'pimcore.templating.view_helper.get_param', 'getPimcore_Templating_ViewHelper_GetParamService.php', true],
    'Pimcore\\Templating\\Helper\\Glossary' => ['services', 'pimcore.templating.view_helper.glossary', 'getPimcore_Templating_ViewHelper_GlossaryService.php', true],
    'Pimcore\\Templating\\Helper\\HeadLink' => ['services', 'pimcore.templating.view_helper.head_link', 'getPimcore_Templating_ViewHelper_HeadLinkService.php', true],
    'Pimcore\\Templating\\Helper\\HeadMeta' => ['services', 'pimcore.templating.view_helper.head_meta', 'getPimcore_Templating_ViewHelper_HeadMetaService.php', true],
    'Pimcore\\Templating\\Helper\\HeadScript' => ['services', 'pimcore.templating.view_helper.head_script', 'getPimcore_Templating_ViewHelper_HeadScriptService.php', true],
    'Pimcore\\Templating\\Helper\\HeadStyle' => ['services', 'pimcore.templating.view_helper.head_style', 'getPimcore_Templating_ViewHelper_HeadStyleService.php', true],
    'Pimcore\\Templating\\Helper\\HeadTitle' => ['services', 'pimcore.templating.view_helper.head_title', 'getPimcore_Templating_ViewHelper_HeadTitleService.php', true],
    'Pimcore\\Templating\\Helper\\Inc' => ['services', 'pimcore.templating.view_helper.inc', 'getPimcore_Templating_ViewHelper_IncService.php', true],
    'Pimcore\\Templating\\Helper\\InlineScript' => ['services', 'pimcore.templating.view_helper.inline_script', 'getPimcore_Templating_ViewHelper_InlineScriptService.php', true],
    'Pimcore\\Templating\\Helper\\Navigation' => ['services', 'pimcore.templating.view_helper.navigation', 'getPimcore_Templating_ViewHelper_NavigationService.php', true],
    'Pimcore\\Templating\\Helper\\PimcoreUrl' => ['services', 'pimcore.templating.view_helper.pimcore_url', 'getPimcore_Templating_ViewHelper_PimcoreUrlService.php', true],
    'Pimcore\\Templating\\Helper\\Placeholder' => ['services', 'pimcore.templating.view_helper.placeholder', 'getPimcore_Templating_ViewHelper_PlaceholderService.php', true],
    'Pimcore\\Templating\\Helper\\WebLink' => ['privates', 'Pimcore\\Templating\\Helper\\WebLink', 'getWebLinkService.php', true],
    'Pimcore\\Templating\\Helper\\WebsiteConfig' => ['privates', 'Pimcore\\Templating\\Helper\\WebsiteConfig', 'getWebsiteConfigService.php', true],
    'pimcore.templating.view_helper.translate' => ['privates', 'pimcore.templating.view_helper.translate', 'getPimcore_Templating_ViewHelper_TranslateService.php', true],
    'pimcore.templating.view_helper.translate_admin' => ['privates', 'pimcore.templating.view_helper.translate_admin', 'getPimcore_Templating_ViewHelper_TranslateAdminService.php', true],
    'templating.helper.actions' => ['privates', 'templating.helper.actions', 'getTemplating_Helper_ActionsService.php', true],
    'templating.helper.assets' => ['privates', 'templating.helper.assets', 'getTemplating_Helper_AssetsService.php', true],
    'templating.helper.code' => ['privates', 'templating.helper.code', 'getTemplating_Helper_CodeService.php', true],
    'templating.helper.form' => ['privates', 'templating.helper.form', 'getTemplating_Helper_FormService.php', true],
    'templating.helper.logout_url' => ['privates', 'templating.helper.logout_url', 'getTemplating_Helper_LogoutUrlService.php', true],
    'templating.helper.request' => ['privates', 'templating.helper.request', 'getTemplating_Helper_RequestService.php', true],
    'templating.helper.router' => ['privates', 'templating.helper.router', 'getTemplating_Helper_RouterService.php', true],
    'templating.helper.security' => ['privates', 'templating.helper.security', 'getTemplating_Helper_SecurityService.php', true],
    'templating.helper.session' => ['privates', 'templating.helper.session', 'getTemplating_Helper_SessionService.php', true],
    'templating.helper.slots' => ['privates', 'templating.helper.slots', 'getTemplating_Helper_SlotsService.php', true],
    'templating.helper.stopwatch' => ['privates', 'templating.helper.stopwatch', 'getTemplating_Helper_StopwatchService.php', true],
    'templating.helper.translator' => ['privates', 'templating.helper.translator', 'getTemplating_Helper_TranslatorService.php', true],
], [
    'Pimcore\\Templating\\Helper\\Action' => '?',
    'Pimcore\\Templating\\Helper\\BreachAttackRandomContent' => '?',
    'Pimcore\\Templating\\Helper\\Cache' => '?',
    'Pimcore\\Templating\\Helper\\Device' => '?',
    'Pimcore\\Templating\\Helper\\GetAllParams' => '?',
    'Pimcore\\Templating\\Helper\\GetParam' => '?',
    'Pimcore\\Templating\\Helper\\Glossary' => '?',
    'Pimcore\\Templating\\Helper\\HeadLink' => '?',
    'Pimcore\\Templating\\Helper\\HeadMeta' => '?',
    'Pimcore\\Templating\\Helper\\HeadScript' => '?',
    'Pimcore\\Templating\\Helper\\HeadStyle' => '?',
    'Pimcore\\Templating\\Helper\\HeadTitle' => '?',
    'Pimcore\\Templating\\Helper\\Inc' => '?',
    'Pimcore\\Templating\\Helper\\InlineScript' => '?',
    'Pimcore\\Templating\\Helper\\Navigation' => '?',
    'Pimcore\\Templating\\Helper\\PimcoreUrl' => '?',
    'Pimcore\\Templating\\Helper\\Placeholder' => '?',
    'Pimcore\\Templating\\Helper\\WebLink' => '?',
    'Pimcore\\Templating\\Helper\\WebsiteConfig' => '?',
    'pimcore.templating.view_helper.translate' => '?',
    'pimcore.templating.view_helper.translate_admin' => '?',
    'templating.helper.actions' => '?',
    'templating.helper.assets' => '?',
    'templating.helper.code' => '?',
    'templating.helper.form' => '?',
    'templating.helper.logout_url' => '?',
    'templating.helper.request' => '?',
    'templating.helper.router' => '?',
    'templating.helper.security' => '?',
    'templating.helper.session' => '?',
    'templating.helper.slots' => '?',
    'templating.helper.stopwatch' => '?',
    'templating.helper.translator' => '?',
]), ($this->services['templating.loader'] ?? $this->load('getTemplating_LoaderService.php')), $this->load('getTemplating_GlobalsService.php'));

$instance->setCharset('UTF-8');
$instance->setHelpers(['slots' => 'templating.helper.slots', 'request' => 'templating.helper.request', 'session' => 'templating.helper.session', 'router' => 'templating.helper.router', 'assets' => 'templating.helper.assets', 'actions' => 'templating.helper.actions', 'code' => 'templating.helper.code', 'translator' => 'templating.helper.translator', 'form' => 'templating.helper.form', 'stopwatch' => 'templating.helper.stopwatch', 'logout_url' => 'templating.helper.logout_url', 'security' => 'templating.helper.security', 'action' => 'Pimcore\\Templating\\Helper\\Action', 'getParam' => 'Pimcore\\Templating\\Helper\\GetParam', 'getAllParams' => 'Pimcore\\Templating\\Helper\\GetAllParams', 'breachAttackRandomContent' => 'Pimcore\\Templating\\Helper\\BreachAttackRandomContent', 'glossary' => 'Pimcore\\Templating\\Helper\\Glossary', 'inc' => 'Pimcore\\Templating\\Helper\\Inc', 'pimcoreUrl' => 'Pimcore\\Templating\\Helper\\PimcoreUrl', 'placeholder' => 'Pimcore\\Templating\\Helper\\Placeholder', 'headTitle' => 'Pimcore\\Templating\\Helper\\HeadTitle', 'headLink' => 'Pimcore\\Templating\\Helper\\HeadLink', 'headScript' => 'Pimcore\\Templating\\Helper\\HeadScript', 'inlineScript' => 'Pimcore\\Templating\\Helper\\InlineScript', 'headStyle' => 'Pimcore\\Templating\\Helper\\HeadStyle', 'headMeta' => 'Pimcore\\Templating\\Helper\\HeadMeta', 'webLink' => 'Pimcore\\Templating\\Helper\\WebLink', 'device' => 'Pimcore\\Templating\\Helper\\Device', 'cache' => 'Pimcore\\Templating\\Helper\\Cache', 'navigation' => 'Pimcore\\Templating\\Helper\\Navigation', 'websiteConfig' => 'Pimcore\\Templating\\Helper\\WebsiteConfig', 'translate' => 'pimcore.templating.view_helper.translate', 'translateAdmin' => 'pimcore.templating.view_helper.translate_admin']);
$instance->addHelperBroker($this->load('getHelperShortcutsService.php'));
$instance->addHelperBroker($this->load('getTemplatingHelperService.php'));
$instance->addHelperBroker($this->load('getDocumentEditableService.php'));
$instance->addHelperBroker($this->load('getDocumentMethodService.php'));

return $instance;