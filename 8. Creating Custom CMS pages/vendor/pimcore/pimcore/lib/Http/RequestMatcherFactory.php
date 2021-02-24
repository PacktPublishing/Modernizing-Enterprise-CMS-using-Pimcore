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

namespace Pimcore\Http;

use Symfony\Component\HttpFoundation\RequestMatcher;
use Symfony\Component\HttpFoundation\RequestMatcherInterface;

class RequestMatcherFactory
{
    /**
     * Builds a set of request matchers from a config definition as configured in pimcore.admin.routes (see PimcoreCoreBundle
     * configuration).
     *
     * @param array $entries
     *
     * @return RequestMatcherInterface[]
     */
    public function buildRequestMatchers(array $entries)
    {
        $matchers = [];
        foreach ($entries as $entry) {
            $matchers[] = $this->buildRequestMatcher($entry);
        }

        return $matchers;
    }

    /**
     * Builds a request matcher from a route configuration
     *
     * @param array $entry
     *
     * @return RequestMatcher
     */
    public function buildRequestMatcher(array $entry)
    {
        // TODO add support for IPs, attributes and schemes if necessary
        $matcher = new RequestMatcher();

        if (isset($entry['path']) && $entry['path']) {
            $matcher->matchPath($entry['path']);
        }

        if (isset($entry['host']) && $entry['host']) {
            $matcher->matchHost($entry['host']);
        }

        if (isset($entry['methods']) && $entry['methods']) {
            $matcher->matchMethod($entry['methods']);
        }

        if (isset($entry['route']) && $entry['route']) {
            $matcher->matchAttribute('_route', $entry['route']);
        }

        return $matcher;
    }
}
