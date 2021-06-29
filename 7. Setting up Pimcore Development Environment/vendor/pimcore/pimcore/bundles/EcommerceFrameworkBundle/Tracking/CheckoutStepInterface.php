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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\Tracking;

use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\CartInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\CheckoutManager\CheckoutStepInterface as CheckoutManagerCheckoutStepInterface;

interface CheckoutStepInterface
{
    /**
     * Track checkout step
     *
     * @param CheckoutManagerCheckoutStepInterface $step
     * @param CartInterface $cart
     * @param string|null $stepNumber
     * @param string|null $checkoutOption
     */
    public function trackCheckoutStep(CheckoutManagerCheckoutStepInterface $step, CartInterface $cart, $stepNumber = null, $checkoutOption = null);
}
