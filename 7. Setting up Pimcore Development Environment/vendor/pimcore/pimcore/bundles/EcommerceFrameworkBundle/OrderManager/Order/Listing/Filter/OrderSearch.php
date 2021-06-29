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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\Order\Listing\Filter;

use Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\OrderListFilterInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\OrderListInterface;

class OrderSearch implements OrderListFilterInterface
{
    /**
     * @var string
     */
    protected $keyword;

    /**
     * @param OrderListInterface $orderList
     *
     * @return OrderListFilterInterface
     */
    public function apply(OrderListInterface $orderList)
    {
        // init
        $queryBuilder = $orderList->getQueryBuilder();
        $condition = <<<'SQL'
0
OR `order`.ordernumber like ?
OR `order`.comment like ?

OR `order`.customerFirstName like ?
OR `order`.customerLastName like ?
OR `order`.customerCompany like ?
OR `order`.customerStreet like ?
OR `order`.customerZip like ?
OR `order`.customerCity like ?
OR `order`.customerCountry like ?

OR `order`.deliveryFirstName like ?
OR `order`.deliveryLastName like ?
OR `order`.deliveryCompany like ?
OR `order`.deliveryStreet like ?
OR `order`.deliveryZip like ?
OR `order`.deliveryCity like ?
OR `order`.deliveryCountry like ?
SQL;

        if ($this->getKeyword()) {
            $queryBuilder->andWhere(str_replace('like ?', 'like :order_keyword', $condition))->setParameter(':order_keyword', $this->getKeyword());
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param string $keyword
     *
     * @return $this
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }
}
