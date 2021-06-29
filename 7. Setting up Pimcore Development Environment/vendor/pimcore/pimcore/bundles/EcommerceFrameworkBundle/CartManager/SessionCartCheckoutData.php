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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\CartManager;

class SessionCartCheckoutData extends AbstractCartCheckoutData
{
    protected $cartId;

    public function save()
    {
        throw new \Exception('Not implemented, should not be needed for this cart type.');
    }

    public static function getByKeyCartId($key, $cartId)
    {
        throw new \Exception('Not implemented, should not be needed for this cart type.');
    }

    public static function removeAllFromCart($cartId)
    {
        $checkoutDataItem = new self();
        $checkoutDataItem->getCart()->checkoutData = [];
    }

    public function setCart(CartInterface $cart)
    {
        $this->cart = $cart;
        $this->cartId = $cart->getId();
    }

    public function getCart()
    {
        if (empty($this->cart)) {
            $this->cart = SessionCart::getById($this->cartId);
        }

        return $this->cart;
    }

    public function getCartId()
    {
        return $this->cartId;
    }

    public function setCartId($cartId)
    {
        $this->cartId = $cartId;
    }

    /**
     * @return array
     *
     * @internal
     */
    public function __sleep()
    {
        $vars = parent::__sleep();

        $blockedVars = ['cart', 'product'];

        $finalVars = [];
        foreach ($vars as $key) {
            if (!in_array($key, $blockedVars)) {
                $finalVars[] = $key;
            }
        }

        return $finalVars;
    }
}
