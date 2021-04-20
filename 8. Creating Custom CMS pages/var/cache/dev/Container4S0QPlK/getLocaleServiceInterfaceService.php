<?php

namespace Container4S0QPlK;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLocaleServiceInterfaceService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Pimcore\Localization\LocaleServiceInterface' shared autowired service.
     *
     * @return \Pimcore\Localization\LocaleService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Localization/LocaleServiceInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Localization/LocaleService.php';

        return $container->services['Pimcore\\Localization\\LocaleServiceInterface'] = new \Pimcore\Localization\LocaleService(($container->services['request_stack'] ?? ($container->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($container->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $container->getTranslatorInterfaceService()));
    }
}
