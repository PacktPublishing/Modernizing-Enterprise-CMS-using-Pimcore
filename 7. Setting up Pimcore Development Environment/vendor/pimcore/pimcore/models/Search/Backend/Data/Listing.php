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

namespace Pimcore\Model\Search\Backend\Data;

use Pimcore\Model\Search\Backend\Data;

/**
 * @internal
 *
 * @method \Pimcore\Model\Search\Backend\Data\Listing\Dao getDao()
 * @method Data[] load()
 * @method Data current()
 * @method int getTotalCount()
 */
class Listing extends \Pimcore\Model\Listing\AbstractListing
{
    /**
     * @return Data[]
     */
    public function getEntries()
    {
        return $this->getData();
    }

    /**
     * @param Data[]|null $entries
     *
     * @return static
     */
    public function setEntries($entries)
    {
        return $this->setData($entries);
    }

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->initDao(__CLASS__);
    }
}
