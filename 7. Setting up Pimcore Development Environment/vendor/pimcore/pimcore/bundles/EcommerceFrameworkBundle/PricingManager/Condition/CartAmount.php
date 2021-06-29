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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\PricingManager\Condition;

use Pimcore\Bundle\EcommerceFrameworkBundle\PricingManager\ConditionInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\PricingManager\EnvironmentInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\Type\Decimal;

class CartAmount implements CartAmountInterface
{
    /**
     * @var float
     */
    protected $limit;

    /**
     * @param EnvironmentInterface $environment
     *
     * @return bool
     */
    public function check(EnvironmentInterface $environment)
    {
        if (!$environment->getCart() || $environment->getProduct() !== null) {
            return false;
        }

        $calculator = $environment->getCart()->getPriceCalculator();

        // TODO store limit as Decimal?
        return $calculator->getSubTotal()->getAmount()->greaterThanOrEqual(Decimal::create($this->getLimit()));
    }

    /**
     * @param float $limit
     *
     * @return CartAmountInterface
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @return float
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return string
     */
    public function toJSON()
    {
        return json_encode([
            'type' => 'CartAmount',
            'limit' => $this->getLimit(),
        ]);
    }

    /**
     * @param string $string
     *
     * @return ConditionInterface
     */
    public function fromJSON($string)
    {
        $json = json_decode($string);
        $this->setLimit($json->limit);

        return $this;
    }
}
