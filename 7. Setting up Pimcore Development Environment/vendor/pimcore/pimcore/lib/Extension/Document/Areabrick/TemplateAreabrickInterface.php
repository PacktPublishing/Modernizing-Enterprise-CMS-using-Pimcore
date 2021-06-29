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

namespace Pimcore\Extension\Document\Areabrick;

/**
 * Bricks implementing this interface auto-resolve view templates if hasTemplate properties are set.
 * Depending on the result of getTemplateLocation and getTemplateSuffix the tag handler builds the following references:
 *
 * - <currentBundle>:Areas/<brickId>/(view|edit).<suffix>
 * - Areas/<brickId>/(view|edit).<suffix> -> resolves to app/Resources
 */
interface TemplateAreabrickInterface extends AreabrickInterface
{
    const TEMPLATE_LOCATION_GLOBAL = 'global';

    const TEMPLATE_LOCATION_BUNDLE = 'bundle';

    const TEMPLATE_SUFFIX_TWIG = 'html.twig';

    /**
     * Determines if template should be auto-located in area bundle or in app/Resources
     *
     * @return string
     */
    public function getTemplateLocation();

    /**
     * Returns view suffix used to auto-build view names
     *
     * @return string
     */
    public function getTemplateSuffix();
}
