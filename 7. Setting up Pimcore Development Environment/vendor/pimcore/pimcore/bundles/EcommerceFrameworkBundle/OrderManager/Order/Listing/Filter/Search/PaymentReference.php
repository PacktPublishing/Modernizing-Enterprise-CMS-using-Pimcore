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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\Order\Listing\Filter\Search;

use Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\Order\Listing\Filter\AbstractSearch;
use Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\OrderListInterface;

class PaymentReference extends AbstractSearch
{
    /**
     * @return string
     */
    protected function getConditionColumn()
    {
        return 'paymentInfo.paymentReference';
    }

    /**
     * @return string
     */
    protected function getConditionValue()
    {
        $value = parent::getConditionValue();
        $value = ',' . $value . ',';

        return $value;
    }

    /**
     * Join paymentInfo
     *
     * @param OrderListInterface $orderList
     */
    protected function prepareApply(OrderListInterface $orderList)
    {
        $orderList->joinPaymentInfo();
    }
}
