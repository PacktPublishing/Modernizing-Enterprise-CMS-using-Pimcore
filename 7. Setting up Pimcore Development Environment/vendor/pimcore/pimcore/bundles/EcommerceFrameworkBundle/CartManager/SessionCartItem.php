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

class SessionCartItem extends AbstractCartItem implements CartItemInterface
{
    public function getCart()
    {
        if (empty($this->cart)) {
            $this->cart = SessionCart::getById($this->cartId);
        }

        return $this->cart;
    }

    public function save()
    {
        throw new \Exception('Not implemented, should not be needed for this cart type.');
    }

    public static function getByCartIdItemKey($cartId, $itemKey, $parentKey = '')
    {
        throw new \Exception('Not implemented, should not be needed for this cart type.');
    }

    public static function removeAllFromCart($cartId)
    {
        $cartItem = new self();
        $cart = $cartItem->getCart();
        $cart->setItems(null);
        $cart->save();
    }

    /**
     * @return CartItemInterface[]
     */
    public function getSubItems()
    {
        return (array)$this->subItems;
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
