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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\CheckoutManager;

use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\CartInterface;

/**
 * Interface for checkout step implementations of online shop framework
 */
interface CheckoutStepInterface
{
    public function __construct(CartInterface $cart, array $options = []);

    /**
     * Returns checkout step name
     *
     * @return string
     */
    public function getName();

    /**
     * Returns saved data of step
     *
     * @return mixed
     */
    public function getData();

    /**
     * Sets delivered data and commits step
     *
     * @param mixed $data
     *
     * @return bool
     */
    public function commit($data);
}
