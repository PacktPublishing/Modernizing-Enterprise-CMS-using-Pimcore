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

namespace Pimcore\Bundle\CoreBundle\EventListener\Traits;

use Pimcore\Http\Request\Resolver\PimcoreContextResolver;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\HttpFoundation\Request;

/**
 * @internal
 */
trait PimcoreContextAwareTrait
{
    /**
     * @var PimcoreContextResolver
     */
    private $pimcoreContextResolver;

    /**
     * @required
     *
     * @param PimcoreContextResolver $contextResolver
     */
    public function setPimcoreContextResolver(PimcoreContextResolver $contextResolver)
    {
        $this->pimcoreContextResolver = $contextResolver;
    }

    /**
     * Check if the request matches the given pimcore context (e.g. admin)
     *
     * @param Request $request
     * @param string|array $context
     *
     * @return bool
     */
    protected function matchesPimcoreContext(Request $request, $context)
    {
        if (null === $this->pimcoreContextResolver) {
            throw new RuntimeException('Missing pimcore context resolver. Is the listener properly configured?');
        }

        return $this->pimcoreContextResolver->matchesPimcoreContext($request, $context);
    }
}
