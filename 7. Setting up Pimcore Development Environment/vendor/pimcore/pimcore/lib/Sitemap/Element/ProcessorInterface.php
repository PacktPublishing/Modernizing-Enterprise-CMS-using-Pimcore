<?php

declare(strict_types=1);

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

namespace Pimcore\Sitemap\Element;

use Pimcore\Model\Element\ElementInterface;
use Presta\SitemapBundle\Sitemap\Url\Url;

interface ProcessorInterface
{
    /**
     * Processes an URL. The processor is expected to return the same or a new URL instance or null
     *
     * @param Url $url
     * @param ElementInterface $element
     * @param GeneratorContextInterface $context
     *
     * @return Url|null
     */
    public function process(Url $url, ElementInterface $element, GeneratorContextInterface $context);
}
