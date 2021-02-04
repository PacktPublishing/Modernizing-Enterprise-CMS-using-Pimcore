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

namespace Pimcore\Extension\Bundle;

use Pimcore\Extension\Bundle\Installer\InstallerInterface;
use Pimcore\Routing\RouteReferenceInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;

interface PimcoreBundleInterface extends BundleInterface
{
    /**
     * Bundle name as shown in extension manager
     *
     * @return string
     */
    public function getNiceName();

    /**
     * Bundle description as shown in extension manager
     *
     * @return string
     */
    public function getDescription();

    /**
     * Bundle version as shown in extension manager
     *
     * @return string
     */
    public function getVersion();

    /**
     * If the bundle has an installation routine, an installer is responsible of handling installation related tasks
     *
     * @return InstallerInterface|null
     */
    public function getInstaller();

    /**
     * Get path to include in admin iframe
     *
     * @return string|RouteReferenceInterface|null
     */
    public function getAdminIframePath();

    /**
     * Get javascripts to include in admin interface
     *
     * Strings will be directly included, RouteReferenceInterface objects are used to generate an URL through the
     * router.
     *
     * @return string[]|RouteReferenceInterface[]
     */
    public function getJsPaths();

    /**
     * Get stylesheets to include in admin interface
     *
     * Strings will be directly included, RouteReferenceInterface objects are used to generate an URL through the
     * router.
     *
     * @return string[]|RouteReferenceInterface[]
     */
    public function getCssPaths();

    /**
     * Get javascripts to include in editmode
     *
     * Strings will be directly included, RouteReferenceInterface objects are used to generate an URL through the
     * router.
     *
     * @return string[]|RouteReferenceInterface[]
     */
    public function getEditmodeJsPaths();

    /**
     * Get stylesheets to include in editmode
     *
     * Strings will be directly included, RouteReferenceInterface objects are used to generate an URL through the
     * router.
     *
     * @return string[]|RouteReferenceInterface[]
     */
    public function getEditmodeCssPaths();
}
