<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'twig' shared service.

include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Environment.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Loader/LoaderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Loader/ExistsLoaderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Loader/SourceContextLoaderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Loader/FilesystemLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Loader/FilesystemLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/ExtensionInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/AbstractExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Extension/CsrfExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Extension/LogoutUrlExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Extension/SecurityExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Extension/TranslationExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Extension/AssetExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Extension/CodeExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Extension/RoutingExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Extension/YamlExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Extension/StopwatchExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Extension/ExpressionExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Extension/HttpKernelExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Extension/HttpFoundationExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/HttpFoundation/UrlHelper.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Extension/FormExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Twig/DoctrineExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Twig/Extension/AssetCompressExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Twig/Extension/WebsiteConfigExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Twig/Extension/DumpExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/phive/twig-extensions-deferred/src/DeferredExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/extensions/lib/Twig/Extensions/Extension/Text.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/AppVariable.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/RuntimeLoader/RuntimeLoaderInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/RuntimeLoader/ContainerRuntimeLoader.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/DependencyInjection/Configurator/EnvironmentConfigurator.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Stopwatch/Stopwatch.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Twig/Extension/HelpersExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Twig/Extension/PimcoreObjectExtension.php';

$a = new \Symfony\Bundle\TwigBundle\Loader\FilesystemLoader(($this->privates['templating.locator'] ?? $this->load('getTemplating_LocatorService.php')), ($this->privates['templating.name_parser'] ?? $this->load('getTemplating_NameParserService.php')), \dirname(__DIR__, 4));
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views'), 'Framework');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views'), '!Framework');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/views'), 'Security');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/views'), '!Security');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views'), 'Twig');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views'), '!Twig');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/swiftmailer-bundle/Resources/views'), 'Swiftmailer');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/swiftmailer-bundle/Resources/views'), '!Swiftmailer');
$a->addPath((\dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Resources/views'), 'Doctrine');
$a->addPath((\dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Resources/views'), '!Doctrine');
$a->addPath((\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/views'), 'SchebTwoFactor');
$a->addPath((\dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Resources/views'), '!SchebTwoFactor');
$a->addPath((\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/views'), 'PimcoreCore');
$a->addPath((\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/views'), '!PimcoreCore');
$a->addPath((\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views'), 'PimcoreAdmin');
$a->addPath((\dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views'), '!PimcoreAdmin');
$a->addPath((\dirname(__DIR__, 4).'/app/Resources/views'));
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Resources/views/Email'), 'email');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Resources/views/Email'), '!email');
$a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Resources/views/Form'));

$this->services['twig'] = $instance = new \Twig\Environment($a, ['debug' => false, 'strict_variables' => false, 'autoescape' => 'name', 'cache' => ($this->targetDir.''.'/twig'), 'charset' => 'UTF-8']);

$b = ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()));
$c = new \Symfony\Bridge\Twig\AppVariable();
$c->setEnvironment('prod');
$c->setDebug(false);
if ($this->has('security.token_storage')) {
    $c->setTokenStorage(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()));
}
if ($this->has('request_stack')) {
    $c->setRequestStack($b);
}

$instance->addExtension(new \Symfony\Bridge\Twig\Extension\CsrfExtension());
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\LogoutUrlExtension(($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService())));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\SecurityExtension(($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService())));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension(($this->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $this->getTranslatorInterfaceService())));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\AssetExtension(($this->privates['assets.packages'] ?? $this->getAssets_PackagesService())));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\CodeExtension(($this->privates['debug.file_link_formatter'] ?? ($this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL))), \dirname(__DIR__, 4), 'UTF-8'));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension(($this->services['router'] ?? $this->getRouterService())));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\StopwatchExtension(($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))), false));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\ExpressionExtension());
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpKernelExtension());
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpFoundationExtension(new \Symfony\Component\HttpFoundation\UrlHelper($b, ($this->services['pimcore.routing.router.request_context'] ?? $this->getPimcore_Routing_Router_RequestContextService()))));
$instance->addExtension(($this->services['Symfony\\Bridge\\Twig\\Extension\\WebLinkExtension'] ?? $this->load('getWebLinkExtensionService.php')));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension());
$instance->addExtension(new \Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension());
$instance->addExtension(($this->services['pimcore.twig.extension.helpers'] ?? ($this->services['pimcore.twig.extension.helpers'] = new \Pimcore\Twig\Extension\HelpersExtension())));
$instance->addExtension(($this->services['pimcore.twig.extension.document_tag'] ?? $this->load('getPimcore_Twig_Extension_DocumentTagService.php')));
$instance->addExtension(($this->services['pimcore.twig.extension.subrequest'] ?? $this->load('getPimcore_Twig_Extension_SubrequestService.php')));
$instance->addExtension(($this->services['pimcore.twig.extension.pimcore_object'] ?? ($this->services['pimcore.twig.extension.pimcore_object'] = new \Pimcore\Twig\Extension\PimcoreObjectExtension())));
$instance->addExtension(($this->services['pimcore.twig.extension.templating_helper'] ?? $this->load('getPimcore_Twig_Extension_TemplatingHelperService.php')));
$instance->addExtension(($this->services['pimcore.twig.extension.navigation'] ?? $this->load('getPimcore_Twig_Extension_NavigationService.php')));
$instance->addExtension(($this->services['pimcore.twig.extension.glossary'] ?? $this->load('getPimcore_Twig_Extension_GlossaryService.php')));
$instance->addExtension(new \Pimcore\Twig\Extension\AssetCompressExtension());
$instance->addExtension(new \Pimcore\Twig\Extension\WebsiteConfigExtension());
$instance->addExtension(new \Pimcore\Twig\Extension\DumpExtension());
$instance->addExtension(new \Phive\Twig\Extensions\Deferred\DeferredExtension());
$instance->addExtension(new \Twig_Extensions_Extension_Text());
$instance->addGlobal('app', $c);
$instance->addRuntimeLoader(new \Twig\RuntimeLoader\ContainerRuntimeLoader(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'Symfony\\Bridge\\Twig\\Extension\\CsrfRuntime' => ['privates', 'twig.runtime.security_csrf', 'getTwig_Runtime_SecurityCsrfService.php', true],
    'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => ['privates', 'twig.runtime.httpkernel', 'getTwig_Runtime_HttpkernelService.php', true],
    'Symfony\\Component\\Form\\FormRenderer' => ['privates', 'twig.form.renderer', 'getTwig_Form_RendererService.php', true],
], [
    'Symfony\\Bridge\\Twig\\Extension\\CsrfRuntime' => '?',
    'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => '?',
    'Symfony\\Component\\Form\\FormRenderer' => '?',
])));
$instance->addGlobal('container', $this);
$instance->addGlobal('pimcore_csrf', ($this->services['Pimcore\\Bundle\\AdminBundle\\EventListener\\CsrfProtectionListener'] ?? $this->getCsrfProtectionListenerService()));
(new \Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator('F j, Y H:i', '%d days', NULL, 0, '.', ','))->configure($instance);

return $instance;
