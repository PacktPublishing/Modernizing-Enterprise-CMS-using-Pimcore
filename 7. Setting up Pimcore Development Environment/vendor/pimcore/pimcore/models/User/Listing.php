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

namespace Pimcore\Model\User;

use Pimcore\Model\User;

/**
 * @method \Pimcore\Model\User\Listing\Dao getDao()
 * @method User[] load()
 */
class Listing extends Listing\AbstractListing
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'user';

    /**
     * Alias for $this->getItems()
     *
     * @return \Pimcore\Model\User[]
     */
    public function getUsers()
    {
        return $this->getItems();
    }
}
