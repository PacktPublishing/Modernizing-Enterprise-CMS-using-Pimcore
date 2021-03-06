<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'Pimcore\Document\Editable\DelegatingEditableHandler' shared autowired service.

@trigger_error('The "Pimcore\\Document\\Editable\\DelegatingEditableHandler" service is deprecated. Use "Pimcore\\Document\\Editable\\EditableHandler" instead', E_USER_DEPRECATED);

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Document/Editable/EditableHandlerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Document/Editable/EditableHandler.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/AdminBundle/Translation/AdminUserTranslator.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/HttpKernel/BundleLocator/BundleLocatorInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/HttpKernel/BundleLocator/BundleLocator.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/HttpKernel/WebPathResolver.php';

$this->services['Pimcore\\Document\\Editable\\DelegatingEditableHandler'] = $instance = new \Pimcore\Document\Editable\DelegatingEditableHandler();

$a = new \Pimcore\Document\Editable\EditableHandler(($this->services['Pimcore\\Extension\\Document\\Areabrick\\AreabrickManagerInterface'] ?? $this->load('getAreabrickManagerInterfaceService.php')), ($this->services['templating'] ?? $this->load('getTemplatingService.php')), ($this->services['pimcore.bundle_locator'] ?? ($this->services['pimcore.bundle_locator'] = new \Pimcore\HttpKernel\BundleLocator\BundleLocator(($this->services['kernel'] ?? $this->get('kernel', 1))))), ($this->services['pimcore.web_path_resolver'] ?? ($this->services['pimcore.web_path_resolver'] = new \Pimcore\HttpKernel\WebPathResolver())), ($this->services['pimcore.templating.action_renderer'] ?? $this->load('getPimcore_Templating_ActionRendererService.php')), ($this->services['Pimcore\\Http\\RequestHelper'] ?? $this->getRequestHelperService()), new \Pimcore\Bundle\AdminBundle\Translation\AdminUserTranslator(($this->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $this->getTranslatorInterfaceService()), ($this->services['pimcore_admin.security.user_loader'] ?? $this->getPimcoreAdmin_Security_UserLoaderService())), ($this->privates['Pimcore\\Http\\ResponseStack'] ?? ($this->privates['Pimcore\\Http\\ResponseStack'] = new \Pimcore\Http\ResponseStack())));

$b = ($this->services['monolog.logger.pimcore'] ?? $this->load('getMonolog_Logger_PimcoreService.php'));

$a->setLogger($b);
$a->setLogger($b);

$instance->addHandler($a);

return $instance;
