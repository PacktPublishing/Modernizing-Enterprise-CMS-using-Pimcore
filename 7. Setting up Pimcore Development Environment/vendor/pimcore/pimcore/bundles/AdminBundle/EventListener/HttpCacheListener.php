<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Bundle\AdminBundle\EventListener;

use Pimcore\Bundle\CoreBundle\EventListener\Traits\PimcoreContextAwareTrait;
use Pimcore\Http\Request\Resolver\PimcoreContextResolver;
use Pimcore\Http\RequestHelper;
use Pimcore\Http\ResponseHelper;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * @internal
 */
class HttpCacheListener implements EventSubscriberInterface
{
    use PimcoreContextAwareTrait;

    /**
     * @var RequestHelper
     */
    protected $requestHelper;

    /**
     * @var ResponseHelper
     */
    protected $responseHelper;

    /**
     * @param RequestHelper $requestHelper
     * @param ResponseHelper $responseHelper
     */
    public function __construct(RequestHelper $requestHelper, ResponseHelper $responseHelper)
    {
        $this->requestHelper = $requestHelper;
        $this->responseHelper = $responseHelper;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::RESPONSE => 'onKernelResponse',
        ];
    }

    public function onKernelResponse(ResponseEvent $event)
    {
        $request = $event->getRequest();

        if (!$event->isMasterRequest()) {
            return;
        }

        $disable = false;
        if ($this->matchesPimcoreContext($request, PimcoreContextResolver::CONTEXT_ADMIN)) {
            $disable = true;
        } else {
            if ($this->requestHelper->isFrontendRequestByAdmin($request)) {
                $disable = true;
            }

            if (\Pimcore::inDebugMode()) {
                $disable = true;
            }
        }

        $response = $event->getResponse();

        if ($disable) {
            // set headers to avoid problems with proxies, ...
            $this->responseHelper->disableCache($response, false);
        }
    }
}
