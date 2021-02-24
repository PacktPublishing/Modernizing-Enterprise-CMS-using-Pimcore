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

namespace Pimcore\Bundle\CoreBundle\EventListener\Frontend;

use Pimcore\Bundle\CoreBundle\EventListener\Traits\PimcoreContextAwareTrait;
use Pimcore\Http\Request\Resolver\PimcoreContextResolver;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class GoogleSearchConsoleVerificationListener implements EventSubscriberInterface
{
    use PimcoreContextAwareTrait;

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 64],
        ];
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if (!$event->isMasterRequest()) {
            return;
        }

        if (!$this->matchesPimcoreContext($request, PimcoreContextResolver::CONTEXT_DEFAULT)) {
            return;
        }

        $conf = \Pimcore\Config::getReportConfig();

        if (!is_null($conf->get('webmastertools')) && isset($conf->get('webmastertools')->sites)) {
            $sites = $conf->get('webmastertools')->sites->toArray();

            if (is_array($sites)) {
                foreach ($sites as $site) {
                    if ($site['verification'] && $request->getPathInfo() === '/' . $site['verification']) {
                        $response = new Response('google-site-verification: ' . $site['verification']);
                        $event->setResponse($response);

                        break;
                    }
                }
            }
        }
    }
}
