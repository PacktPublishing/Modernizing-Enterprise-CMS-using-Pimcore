<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Bundle\AdminBundle\Security\Guard;

use Pimcore\Bundle\AdminBundle\Security\Authentication\Token\TwoFactorRequiredToken;
use Pimcore\Bundle\AdminBundle\Security\BruteforceProtectionHandler;
use Pimcore\Bundle\AdminBundle\Security\User\User;
use Pimcore\Cache\Runtime;
use Pimcore\Event\Admin\Login\LoginCredentialsEvent;
use Pimcore\Event\Admin\Login\LoginFailedEvent;
use Pimcore\Event\AdminEvents;
use Pimcore\Model\User as UserModel;
use Pimcore\Tool\Admin;
use Pimcore\Tool\Authentication;
use Pimcore\Tool\Session;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Http\HttpUtils;
use Symfony\Contracts\Translation\TranslatorInterface;

class AdminAuthenticator extends AbstractGuardAuthenticator implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @var TokenStorageInterface
     */
    protected $tokenStorage;

    /**
     * @var RouterInterface
     */
    protected $router;

    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * @var TranslatorInterface
     */
    protected $translator;

    /**
     * @var HttpUtils
     */
    protected $httpUtils;

    /**
     * @var BruteforceProtectionHandler
     */
    protected $bruteforceProtectionHandler;

    /**
     * @var bool
     */
    protected $twoFactorRequired = false;

    /**
     * @param TokenStorageInterface $tokenStorage
     * @param RouterInterface $router
     * @param EventDispatcherInterface $dispatcher
     * @param TranslatorInterface $translator
     * @param HttpUtils $httpUtils
     * @param BruteforceProtectionHandler $bruteforceProtectionHandler
     */
    public function __construct(
        TokenStorageInterface $tokenStorage,
        RouterInterface $router,
        EventDispatcherInterface $dispatcher,
        TranslatorInterface $translator,
        HttpUtils $httpUtils,
        BruteforceProtectionHandler $bruteforceProtectionHandler
    ) {
        $this->tokenStorage = $tokenStorage;
        $this->router = $router;
        $this->dispatcher = $dispatcher;
        $this->translator = $translator;
        $this->httpUtils = $httpUtils;

        $this->bruteforceProtectionHandler = $bruteforceProtectionHandler;
    }

    /**
     * @inheritDoc
     */
    public function supports(Request $request)
    {
        return $request->attributes->get('_route') === 'pimcore_admin_login_check'
            || Authentication::authenticateSession($request);
    }

    /**
     * @inheritDoc
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        if ($request->isXmlHttpRequest()) {
            // TODO use a JSON formatted error response?
            $response = new Response('Session expired or unauthorized request. Please reload and try again!');
            $response->setStatusCode(Response::HTTP_FORBIDDEN);

            return $response;
        }

        $url = $this->router->generate('pimcore_admin_login', ['perspective' => strip_tags($request->get('perspective'))]);

        return new RedirectResponse($url);
    }

    /**
     * @inheritDoc
     */
    public function getCredentials(Request $request)
    {
        $credentials = [];

        if ($request->attributes->get('_route') === 'pimcore_admin_login_check') {
            $username = $request->get('username');
            if ($request->getMethod() === 'POST' && $request->get('password') && $username) {
                $this->bruteforceProtectionHandler->checkProtection($username);
                $credentials = [
                    'username' => $username,
                    'password' => $request->get('password'),
                ];
            } elseif ($token = $request->get('token')) {
                $this->bruteforceProtectionHandler->checkProtection();
                $credentials = [
                    'token' => $token,
                    'reset' => (bool) $request->get('reset', false),
                ];
            } else {
                $this->bruteforceProtectionHandler->checkProtection();
                throw new AuthenticationException('Missing username or token');
            }

            $event = new LoginCredentialsEvent($request, $credentials);
            $this->dispatcher->dispatch(AdminEvents::LOGIN_CREDENTIALS, $event);

            return $event->getCredentials();
        } else {
            if ($pimcoreUser = Authentication::authenticateSession($request)) {
                return [
                    'user' => $pimcoreUser,
                ];
            }
        }

        return $credentials;
    }

    /**
     * @inheritDoc
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        /** @var User|null $user */
        $user = null;

        if (!is_array($credentials)) {
            throw new AuthenticationException('Invalid credentials');
        }

        if (isset($credentials['user']) && $credentials['user'] instanceof UserModel) {
            $user = new User($credentials['user']);
            $session = Session::getReadOnly();
            if ($session->has('2fa_required') && $session->get('2fa_required') === true) {
                $this->twoFactorRequired = true;
            }
        } else {
            if (!isset($credentials['username']) && !isset($credentials['token'])) {
                throw new AuthenticationException('Missing username/token');
            }

            if (isset($credentials['password'])) {
                $pimcoreUser = Authentication::authenticatePlaintext($credentials['username'], $credentials['password']);

                if ($pimcoreUser) {
                    $user = new User($pimcoreUser);
                } else {
                    // trigger LOGIN_FAILED event if user could not be authenticated via username/password
                    $event = new LoginFailedEvent($credentials);
                    $this->dispatcher->dispatch(AdminEvents::LOGIN_FAILED, $event);

                    if ($event->hasUser()) {
                        $user = new User($event->getUser());
                    } else {
                        throw new AuthenticationException('Failed to authenticate with username and password');
                    }
                }
            } elseif (isset($credentials['token'])) {
                $pimcoreUser = Authentication::authenticateToken($credentials['token']);

                if ($pimcoreUser) {
                    //disable two factor authentication for token based credentials e.g. reset password, admin access links
                    $pimcoreUser->setTwoFactorAuthentication('required', false);
                    $user = new User($pimcoreUser);
                } else {
                    throw new AuthenticationException('Failed to authenticate with username and token');
                }

                if ($credentials['reset']) {
                    // save the information to session when the user want's to reset the password
                    // this is because otherwise the old password is required => see also PIMCORE-1468

                    Session::useSession(function (AttributeBagInterface $adminSession) {
                        $adminSession->set('password_reset', true);
                    });
                }
            } else {
                throw new AuthenticationException('Invalid authentication method, must be either password or token');
            }

            if ($user && Authentication::isValidUser($user->getUser())) {
                $pimcoreUser = $user->getUser();

                Session::useSession(function (AttributeBagInterface $adminSession) use ($pimcoreUser) {
                    Session::regenerateId();
                    $adminSession->set('user', $pimcoreUser);

                    // this flag gets removed after successful authentication in \Pimcore\Bundle\AdminBundle\EventListener\TwoFactorListener
                    if ($pimcoreUser->getTwoFactorAuthentication('required') && $pimcoreUser->getTwoFactorAuthentication('enabled')) {
                        $adminSession->set('2fa_required', true);
                    }
                });
            }
        }

        return $user;
    }

    /**
     * @inheritDoc
     */
    public function checkCredentials($credentials, UserInterface $user)
    {
        // we rely on getUser returning a valid user
        if ($user instanceof User) {
            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $this->bruteforceProtectionHandler->addEntry($request->get('username'), $request);

        $url = $this->router->generate('pimcore_admin_login', [
            'auth_failed' => 'true',
        ]);

        return new RedirectResponse($url);
    }

    /**
     * @inheritDoc
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        /** @var UserModel $user */
        $user = $token->getUser()->getUser();

        // set user language
        $request->setLocale($user->getLanguage());
        $this->translator->setLocale($user->getLanguage());

        // set user on runtime cache for legacy compatibility
        Runtime::set('pimcore_admin_user', $user);

        if ($user->isAdmin()) {
            if (Admin::isMaintenanceModeScheduledForLogin()) {
                Admin::activateMaintenanceMode(Session::getSessionId());
                Admin::unscheduleMaintenanceModeOnLogin();
            }
        }

        // as we authenticate statelessly (short lived sessions) the authentication is called for
        // every request. therefore we only redirect if we're on the login page
        if (!in_array($request->attributes->get('_route'), [
            'pimcore_admin_login',
            'pimcore_admin_login_check',
        ])) {
            return null;
        }

        $url = null;
        if ($request->get('deeplink') && $request->get('deeplink') !== 'true') {
            $url = $this->router->generate('pimcore_admin_login_deeplink');
            $url .= '?' . $request->get('deeplink');
        } else {
            $url = $this->router->generate('pimcore_admin_index', [
                '_dc' => time(),
                'perspective' => strip_tags($request->get('perspective')),
            ]);
        }

        if ($url) {
            $response = new RedirectResponse($url);
            $response->headers->setCookie(new Cookie('pimcore_admin_sid', true, 0, '/', null, false, true));

            return $response;
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public function supportsRememberMe()
    {
        return false;
    }

    public function createAuthenticatedToken(UserInterface $user, $providerKey)
    {
        if ($this->twoFactorRequired) {
            return new TwoFactorRequiredToken(
                $user,
                $providerKey,
                $user->getRoles()
            );
        } else {
            return parent::createAuthenticatedToken($user, $providerKey);
        }
    }
}
