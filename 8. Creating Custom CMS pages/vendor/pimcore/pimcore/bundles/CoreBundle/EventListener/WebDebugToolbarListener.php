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

namespace Pimcore\Bundle\CoreBundle\EventListener;

use Pimcore\Http\RequestHelper;
use Pimcore\Http\RequestMatcherFactory;
use Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener as SymfonyWebDebugToolbarListener;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestMatcherInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Disables the web debug toolbar for frontend requests by admins (iframes inside admin interface)
 *
 * @internal
 */
final class WebDebugToolbarListener implements EventSubscriberInterface
{
    /**
     * @var RequestHelper
     */
    protected $requestHelper;

    /**
     * @var RequestMatcherFactory
     */
    protected $requestMatcherFactory;

    /**
     * @var array
     */
    protected $excludeRoutes = [];

    /**
     * @var RequestMatcherInterface[]
     */
    protected $excludeMatchers;

    /**
     * @var SymfonyWebDebugToolbarListener|null
     */
    protected $debugToolbarListener;

    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    public function __construct(
        RequestHelper $requestHelper,
        RequestMatcherFactory $requestMatcherFactory,
        ?SymfonyWebDebugToolbarListener $debugToolbarListener,
        EventDispatcherInterface $eventDispatcher,
        array $excludeRoutes
    ) {
        $this->requestHelper = $requestHelper;
        $this->requestMatcherFactory = $requestMatcherFactory;
        $this->excludeRoutes = $excludeRoutes;
        $this->debugToolbarListener = $debugToolbarListener;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => ['onKernelResponse', -118],
        ];
    }

    /**
     * @param RequestEvent $event
     */
    public function onKernelResponse(RequestEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $request = $event->getRequest();

        // do not show toolbar on frontend-admin requests
        if ($this->requestHelper->isFrontendRequestByAdmin($request)) {
            $this->disableWebDebugToolbar();
        }

        // do not show toolbar on excluded routes (pimcore.web_profiler.toolbar.excluded_routes config entry)
        foreach ($this->getExcludeMatchers() as $excludeMatcher) {
            if ($excludeMatcher->matches($request)) {
                $this->disableWebDebugToolbar();
            }
        }
    }

    /**
     * @return RequestMatcherInterface[]
     */
    protected function getExcludeMatchers()
    {
        if (null === $this->excludeMatchers) {
            $this->excludeMatchers = $this->requestMatcherFactory->buildRequestMatchers($this->excludeRoutes);
        }

        return $this->excludeMatchers;
    }

    protected function disableWebDebugToolbar(): void
    {
        if ($this->debugToolbarListener) {
            $this->eventDispatcher->removeSubscriber($this->debugToolbarListener);
        }
    }
}
