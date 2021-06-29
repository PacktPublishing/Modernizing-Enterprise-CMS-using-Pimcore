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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Getter;

use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config\ConfigInterface;

/**
 * Interface for getter of product index columns which consider sub object ids and tenant configs
 */
interface ExtendedGetterInterface extends GetterInterface
{
    public function get($object, $config = null, $subObjectId = null, ConfigInterface $tenantConfig = null);
}
