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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\PricingManager\Action;

use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\CartPriceModificator\CartPriceModificatorInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\CartPriceModificator\ShippingInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\PricingManager\ActionInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\PricingManager\EnvironmentInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\Type\Decimal;

class FreeShipping implements ActionInterface, CartActionInterface
{
    /**
     * @param EnvironmentInterface $environment
     *
     * @return ActionInterface
     */
    public function executeOnCart(EnvironmentInterface $environment)
    {
        $priceCalculator = $environment->getCart()->getPriceCalculator();

        $list = $priceCalculator->getModificators();
        foreach ($list as &$modificator) {
            // @var CartPriceModificatorInterface $modificator

            // remove shipping charge
            if ($modificator instanceof ShippingInterface) {
                $modificator->setCharge(Decimal::zero());
                $priceCalculator->calculate(true);
            }
        }

        return $this;
    }

    /**
     * @return string
     */
    public function toJSON()
    {
        return json_encode([
            'type' => 'FreeShipping',
        ]);
    }

    /**
     * @param string $string
     *
     * @return ActionInterface
     */
    public function fromJSON($string)
    {
        return $this;
    }
}
