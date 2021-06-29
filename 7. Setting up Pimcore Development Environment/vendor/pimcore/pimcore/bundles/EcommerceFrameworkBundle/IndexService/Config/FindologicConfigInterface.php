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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config;

use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Worker\DefaultFindologic as DefaultFindologicWorker;

/**
 * Interface for IndexService Tenant Configurations using findologic as index
 */
interface FindologicConfigInterface extends ConfigInterface
{
    /**
     * returns findologic client parameters defined in the tenant config
     *
     * @param string $setting
     *
     * @return array|string
     */
    public function getClientConfig($setting = null);

    /**
     * returns condition for current subtenant
     *
     * @return array
     */
    public function getSubTenantCondition();

    /**
     * creates and returns tenant worker suitable for this tenant configuration
     *
     * @return DefaultFindologicWorker
     */
    public function getTenantWorker();
}
