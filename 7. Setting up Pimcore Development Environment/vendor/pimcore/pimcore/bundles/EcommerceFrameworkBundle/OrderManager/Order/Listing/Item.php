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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\Order\Listing;

use Pimcore\Bundle\EcommerceFrameworkBundle\Model\AbstractOrder as Order;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\AbstractOrderItem as OrderItem;
use Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\AbstractOrderListItem;
use Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\OrderListItemInterface;
use Pimcore\Model\DataObject\Concrete;

class Item extends AbstractOrderListItem implements OrderListItemInterface
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->resultRow['Id'];
    }

    /**
     * @param string $method
     * @param array $args
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function __call($method, $args)
    {
        $field = substr($method, 3);
        if (substr($method, 0, 3) == 'get' && array_key_exists($field, $this->resultRow)) {
            return $this->resultRow[$field];
        }

        $object = $this->reference();
        if ($object) {
            return call_user_func_array([$object, $method], $args);
        }

        throw new \Exception("Object with {$this->getId()} not found.");
    }

    /**
     * @return Order|OrderItem|null
     */
    public function reference()
    {
        $object = Concrete::getById($this->getId());

        if ($object instanceof Order || $object instanceof OrderItem) {
            return $object;
        }

        return null;
    }
}
