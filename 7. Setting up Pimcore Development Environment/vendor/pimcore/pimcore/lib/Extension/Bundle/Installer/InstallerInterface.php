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

namespace Pimcore\Extension\Bundle\Installer;

use Pimcore\Extension\Bundle\Installer\Exception\InstallationException;
use Symfony\Component\Console\Output\OutputInterface;

interface InstallerInterface
{
    /**
     * Installs the bundle
     *
     * @throws InstallationException
     */
    public function install();

    /**
     * Uninstalls the bundle
     *
     * @throws InstallationException
     */
    public function uninstall();

    /**
     * Determine if bundle is installed
     *
     * @return bool
     */
    public function isInstalled();

    /**
     * Determine if bundle is ready to be installed. Can be used to check prerequisites
     *
     * @return bool
     */
    public function canBeInstalled();

    /**
     * Determine if bundle can be uninstalled
     *
     * @return bool
     */
    public function canBeUninstalled();

    /**
     * Determines if admin interface should be reloaded after installation/uninstallation
     *
     * @return bool
     */
    public function needsReloadAfterInstall();

    public function getOutput(): OutputInterface;
}
