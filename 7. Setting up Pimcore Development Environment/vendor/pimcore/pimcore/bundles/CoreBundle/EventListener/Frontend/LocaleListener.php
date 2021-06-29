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

namespace Pimcore\Bundle\CoreBundle\EventListener\Frontend;

use Pimcore\Bundle\CoreBundle\EventListener\Traits\PimcoreContextAwareTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * @internal
 */
class LocaleListener implements EventSubscriberInterface
{
    use PimcoreContextAwareTrait;

    protected $lastLocale = null;

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 1], // need to be after ElementListener
            KernelEvents::RESPONSE => ['onKernelResponse'], // need to be after ElementListener
        ];
    }

    /**
     * @param RequestEvent $event
     */
    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();

        $locale = $request->getLocale();

        if ($locale && $locale != $this->lastLocale) {
            $this->lastLocale = $locale;

            // now we prepare everything for setlocale()
            $localeList = [$locale . '.utf8'];
            $primaryLanguage = \Locale::getPrimaryLanguage($locale);

            if (\Locale::getRegion($locale)) {
                // add only the language to the list as a fallback
                $localeList[] = $primaryLanguage . '.utf8';
            } else {
                // try to get a list of territories for this language
                // usually OS have no "language only" locale, only the combination language-territory (eg. Debian)
                $languageRegionMapping = include PIMCORE_PATH . '/bundles/CoreBundle/Resources/misc/cldr-language-territory-mapping.php';
                if (isset($languageRegionMapping[$primaryLanguage])) {
                    foreach ($languageRegionMapping[$primaryLanguage] as $territory) {
                        $localeList[] = $primaryLanguage . '_' . $territory . '.utf8';
                    }
                }
            }

            setlocale(LC_ALL, $localeList);
            setlocale(LC_NUMERIC, 'C');
        }
    }

    public function onKernelResponse(ResponseEvent $event)
    {
        if ($this->lastLocale && $event->isMasterRequest()) {
            $response = $event->getResponse();
            $response->headers->set('Content-Language', strtolower(str_replace('_', '-', $this->lastLocale)), true);
        }
    }
}
