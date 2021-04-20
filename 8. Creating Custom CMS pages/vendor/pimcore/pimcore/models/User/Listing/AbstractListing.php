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
 * @category   Pimcore
 * @package    User
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\User\Listing;

use Pimcore\Model;

/**
 * @method \Pimcore\Model\User\Listing\AbstractListing\Dao getDao()
 * @method Model\User[] load()
 * @method Model\User current()
 */
class AbstractListing extends Model\Listing\AbstractListing
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->getData();
    }

    /**
     * @param array $items
     *
     * @return static
     */
    public function setItems($items)
    {
        return $this->setData($items);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
