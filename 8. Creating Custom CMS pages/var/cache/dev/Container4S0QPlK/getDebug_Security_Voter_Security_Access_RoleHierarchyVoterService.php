<?php

namespace Container4S0QPlK;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDebug_Security_Voter_Security_Access_RoleHierarchyVoterService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'debug.security.voter.security.access.role_hierarchy_voter' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\Voter\TraceableVoter
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authorization/Voter/VoterInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authorization/Voter/TraceableVoter.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authorization/Voter/RoleVoter.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Authorization/Voter/RoleHierarchyVoter.php';

        return $container->privates['debug.security.voter.security.access.role_hierarchy_voter'] = new \Symfony\Component\Security\Core\Authorization\Voter\TraceableVoter(new \Symfony\Component\Security\Core\Authorization\Voter\RoleHierarchyVoter(($container->privates['security.role_hierarchy'] ?? $container->getSecurity_RoleHierarchyService())), ($container->services['event_dispatcher'] ?? $container->getEventDispatcherService()));
    }
}
