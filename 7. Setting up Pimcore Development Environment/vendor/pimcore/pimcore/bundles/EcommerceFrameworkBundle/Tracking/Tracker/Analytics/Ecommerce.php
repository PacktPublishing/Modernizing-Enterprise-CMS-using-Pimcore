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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\Tracking\Tracker\Analytics;

use Pimcore\Analytics\Google\Tracker as GoogleTracker;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\AbstractOrder;
use Pimcore\Bundle\EcommerceFrameworkBundle\Tracking\CheckoutCompleteInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\Tracking\ProductAction;
use Pimcore\Bundle\EcommerceFrameworkBundle\Tracking\Transaction;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Ecommerce extends AbstractAnalyticsTracker implements CheckoutCompleteInterface
{
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'template_prefix' => '@PimcoreEcommerceFramework/Tracking/analytics/classic',
        ]);
    }

    /**
     * Track checkout complete
     *
     * @param AbstractOrder $order
     */
    public function trackCheckoutComplete(AbstractOrder $order)
    {
        $transaction = $this->trackingItemBuilder->buildCheckoutTransaction($order);
        $items = $this->trackingItemBuilder->buildCheckoutItems($order);

        $parameters = [];
        $parameters['transaction'] = $transaction;
        $parameters['items'] = $items;
        $parameters['calls'] = $this->buildCheckoutCompleteCalls($transaction, $items);

        $result = $this->renderTemplate('checkout_complete', $parameters);

        $this->tracker->addCodePart($result, GoogleTracker::BLOCK_AFTER_TRACK);
    }

    /**
     * @param Transaction $transaction
     * @param ProductAction[] $items
     *
     * @return array
     */
    protected function buildCheckoutCompleteCalls(Transaction $transaction, array $items)
    {
        $calls = [
            $this->transformTransaction($transaction),
        ];

        foreach ($items as $item) {
            $calls[] = $this->transformProductAction($item);
        }

        return $calls;
    }

    /**
     * Transform transaction into classic analytics data array
     *
     * @note city, state, country were dropped as they were optional and never used
     *
     * @param Transaction $transaction
     *
     * @return array
     */
    protected function transformTransaction(Transaction $transaction)
    {
        return [
            '_addTrans',
            $transaction->getId(),                  // order ID - required
            $transaction->getAffiliation() ?: '',   // affiliation or store name
            round($transaction->getTotal(), 2),               // total - required
            round($transaction->getTax(), 2),                 // tax
            $transaction->getShipping(),            // shipping
        ];
    }

    /**
     * Transform product action into classic analytics data array
     *
     * @param ProductAction $item
     *
     * @return array
     */
    protected function transformProductAction(ProductAction $item)
    {
        return [
            '_addItem',
            $item->getTransactionId(),              // transaction ID - necessary to associate item with transaction
            $item->getId(),                         // SKU/code - required
            $item->getName(),                       // product name
            $item->getCategory(),                   // category or variation
            round($item->getPrice(), 2),                      // unit price - required
            $item->getQuantity() ?: 1,              // quantity - required
        ];
    }
}
