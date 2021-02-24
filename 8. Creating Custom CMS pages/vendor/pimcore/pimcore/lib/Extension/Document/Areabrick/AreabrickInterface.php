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

namespace Pimcore\Extension\Document\Areabrick;

use Pimcore\Model\Document\Tag\Area\Info;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method string hasTemplate()
 * @method string getTemplate()
 */
interface AreabrickInterface
{
    /**
     * The brick ID as registered on AreabrickManager
     *
     * @param string $id
     */
    public function setId($id);

    /**
     * Brick ID - needs to be unique throughout the system.
     *
     * @return string
     */
    public function getId();

    /**
     * A descriptive name as shown in extension manager and edit mode.
     *
     * @return string
     */
    public function getName();

    /**
     * Area description as shown in extension manager.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Area version as shown in extension manager.
     *
     * @return string
     */
    public function getVersion();

    /**
     * Icon as absolute path, e.g. /bundles/websitedemo/img/areas/foo/icon.png
     *
     * @return string|null
     */
    public function getIcon();

    /**
     * Determines if the brick has a view template
     *
     * @deprecated use hasTemplate() instead
     *
     * @return bool
     */
    public function hasViewTemplate();

    /**
     * Get view template
     *
     * @deprecated use getTemplate() instead
     *
     * @return string|null
     */
    public function getViewTemplate();

    /**
     * Determines if the brick has a view template
     *
     * @TODO active in Pimcore v7
     *
     * @return bool
     */
    //public function hasTemplate();

    /**
     * Get view template
     *
     * @TODO active in Pimcore v7
     *
     * @return string|null
     */
    //public function getTemplate();

    /**
     * Determines if the brick has an edit template
     *
     * @deprecated method will be removed in v7, please use the editable dialog box instead
     *
     * @return bool
     */
    public function hasEditTemplate();

    /**
     * Get edit template
     *
     * @deprecated method will be removed in v7, please use the editable dialog box instead
     *
     * @return string|null
     */
    public function getEditTemplate();

    /**
     * Will be called before the view is rendered. Acts as extension point for custom area logic.
     *
     * If this method returns a Response object, it will be pushed onto the response stack and returned to the client.
     *
     * @param Info $info
     *
     * @return null|Response
     */
    public function action(Info $info);

    /**
     * Will be called after rendering.
     *
     * If this method returns a Response object, it will be pushed onto the response stack and returned to the client.
     *
     * @param Info $info
     *
     * @return null|Response
     */
    public function postRenderAction(Info $info);

    /**
     * Returns the brick HTML open tag.
     *
     * @param Info $info
     *
     * @return string
     */
    public function getHtmlTagOpen(Info $info);

    /**
     * Returns the brick HTML close tag.
     *
     * @param Info $info
     *
     * @return string
     */
    public function getHtmlTagClose(Info $info);
}
