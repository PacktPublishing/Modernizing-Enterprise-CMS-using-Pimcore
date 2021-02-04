<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'pimcore.twig.extension.subrequest' shared autowired service.

if ($lazyLoad) {
    return $this->services['pimcore.twig.extension.subrequest'] = $this->createProxy('SubrequestExtension_ac4dffd', function () {
        return \SubrequestExtension_ac4dffd::staticProxyConstructor(function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) {
            $wrappedInstance = $this->load('getPimcore_Twig_Extension_SubrequestService.php', false);

            $proxy->setProxyInitializer(null);

            return true;
        });
    });
}

include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/ExtensionInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/AbstractExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Twig/Extension/SubrequestExtension.php';

return new \Pimcore\Twig\Extension\SubrequestExtension(($this->services['pimcore.templating.view_helper.inc'] ?? $this->load('getPimcore_Templating_ViewHelper_IncService.php')), ($this->services['pimcore.templating.view_helper.action'] ?? $this->load('getPimcore_Templating_ViewHelper_ActionService.php')));
