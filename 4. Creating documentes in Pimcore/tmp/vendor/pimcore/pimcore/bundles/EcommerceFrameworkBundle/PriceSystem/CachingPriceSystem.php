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
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Bundle\EcommerceFrameworkBundle\PriceSystem;

use Pimcore\Bundle\EcommerceFrameworkBundle\Exception\UnsupportedException;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\CheckoutableInterface;

/**
 * Price system which caches created price info objects per product and request
 */
abstract class CachingPriceSystem extends AbstractPriceSystem implements CachingPriceSystemInterface
{
    /**
     * @var PriceInfoInterface[] $priceInfos
     */
    protected $priceInfos = [];

    /**
     * @inheritdoc
     */
    public function getPriceInfo(CheckoutableInterface $product, $quantityScale = 1, $products = null): PriceInfoInterface
    {
        $pId = $product->getId();
        if (!array_key_exists($pId, $this->priceInfos) || !is_array($this->priceInfos[$pId])) {
            $this->priceInfos[$pId] = [];
        }

        $quantityScaleKey = (string) $quantityScale;

        if (!array_key_exists($quantityScaleKey, $this->priceInfos[$pId]) || !$this->priceInfos[$pId][$quantityScaleKey]) {
            $priceInfo = $this->initPriceInfoInstance($quantityScale, $product, $products);
            $this->priceInfos[$pId][$quantityScaleKey] = $priceInfo;
        }

        return $this->priceInfos[$pId][$quantityScaleKey];
    }

    /**
     * @inheritdoc
     */
    public function loadPriceInfos($productEntries, $options)
    {
        throw new UnsupportedException(__METHOD__  . ' is not supported for ' . get_class($this));
    }

    /**
     * @inheritdoc
     */
    public function clearPriceInfos($productEntries, $options)
    {
        throw new UnsupportedException(__METHOD__  . ' is not supported for ' . get_class($this));
    }

    /**
     * @inheritdoc
     */
    public function filterProductIds($productIds, $fromPrice, $toPrice, $order, $offset, $limit)
    {
        throw new UnsupportedException(__METHOD__  . ' is not supported for ' . get_class($this));
    }
}
