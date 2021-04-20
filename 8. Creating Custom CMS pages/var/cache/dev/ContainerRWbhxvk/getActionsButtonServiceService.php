<?php

namespace ContainerRWbhxvk;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getActionsButtonServiceService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Pimcore\Workflow\ActionsButtonService' shared autowired service.
     *
     * @return \Pimcore\Workflow\ActionsButtonService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Workflow/ActionsButtonService.php';

        return $container->privates['Pimcore\\Workflow\\ActionsButtonService'] = new \Pimcore\Workflow\ActionsButtonService(($container->services['Pimcore\\Workflow\\Manager'] ?? $container->load('getManagerService')));
    }
}
