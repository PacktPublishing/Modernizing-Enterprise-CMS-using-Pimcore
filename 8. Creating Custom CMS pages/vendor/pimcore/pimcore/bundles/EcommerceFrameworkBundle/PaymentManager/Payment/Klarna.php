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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\Payment;

use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\CartInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\OrderAgentInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\Status;
use Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\StatusInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\V7\Payment\StartPaymentRequest\AbstractRequest;
use Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\V7\Payment\StartPaymentResponse\SnippetResponse;
use Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\V7\Payment\StartPaymentResponse\StartPaymentResponseInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\PriceSystem\PriceInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @deprecated since v6.8.0 and will be moved to package "payment-provider-klarna" in Pimcore 10.
 */
class Klarna extends AbstractPayment implements \Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\V7\Payment\PaymentInterface
{
    /**
     * @var string
     */
    protected $eid;

    /**
     * @var string
     */
    protected $sharedSecretKey;

    /**
     * @var string[]
     */
    protected $authorizedData = [];

    /**
     * @var string
     */
    protected $endpoint;

    public function __construct(array $options)
    {
        $this->processOptions(
            $this->configureOptions(new OptionsResolver())->resolve($options)
        );
    }

    protected function processOptions(array $options)
    {
        parent::processOptions($options);

        $this->eid = $options['eid'];
        $this->sharedSecretKey = $options['shared_secret_key'];

        // set endpoint depending on mode
        if ('live' === $options['mode']) {
            $this->endpoint = \Klarna_Checkout_Connector::BASE_URL;
        } else {
            $this->endpoint = \Klarna_Checkout_Connector::BASE_TEST_URL;
        }
    }

    protected function configureOptions(OptionsResolver $resolver): OptionsResolver
    {
        parent::configureOptions($resolver);

        $resolver->setRequired([
            'mode',
            'eid',
            'shared_secret_key',
        ]);

        $resolver
            ->setDefault('mode', 'sandbox')
            ->setAllowedValues('mode', ['sandbox', 'live']);

        $notEmptyValidator = function ($value) {
            return !empty($value);
        };

        foreach ($resolver->getRequiredOptions() as $requiredProperty) {
            $resolver->setAllowedValues($requiredProperty, $notEmptyValidator);
        }

        return $resolver;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Klarna';
    }

    /**
     * Start payment
     *
     * @param PriceInterface $price
     * @param array $config
     * @param CartInterface  $cart
     *
     * @return string
     *
     * @throws \Exception
     */
    public function initPayment(PriceInterface $price, array $config, CartInterface $cart = null)
    {
        // check params
        $required = [
            'purchase_country' => null,
            'locale' => null,
            'merchant_reference' => null,
        ];

        $check = array_intersect_key($config, $required);

        if (count($required) != count($check)) {
            throw new \Exception(sprintf('required fields are missing! required: %s', implode(', ', array_keys(array_diff_key($required, $check)))));
        }

        // 2. Configure the checkout order
        $config['purchase_currency'] = $price->getCurrency()->getShortName();
        $config['merchant']['id'] = $this->eid;

        // 3. Create a checkout order
        $order = $this->createOrder();
        $order->create($config);

        // 4. Render the checkout snippet
        $order->fetch();

        // Display checkout
        $snippet = $order['gui']['snippet'];

        return $snippet;
    }

    /**
     * @inheritDoc
     */
    public function startPayment(OrderAgentInterface $orderAgent, PriceInterface $price, AbstractRequest $config): StartPaymentResponseInterface
    {
        $snippet = $this->initPayment($price, $config->asArray());

        return new SnippetResponse($orderAgent->getOrder(), $snippet);
    }

    /**
     * @inheritdoc
     */
    public function handleResponse($response)
    {
        // check required fields
        $required = [
            'klarna_order' => null,
        ];

        $authorizedData = [
            'klarna_order' => null,
        ];

        // check fields
        $check = array_intersect_key($response, $required);
        if (count($required) != count($check)) {
            throw new \Exception(sprintf('required fields are missing! required: %s', implode(', ', array_keys(array_diff_key($required, $check)))));
        }

        // handle
        $authorizedData = array_intersect_key($response, $authorizedData);
        $this->setAuthorizedData($authorizedData);

        $order = $this->createOrder($authorizedData['klarna_order']);
        $order->fetch();

        $statMap = [
            'checkout_complete' => StatusInterface::STATUS_AUTHORIZED, 'created' => StatusInterface::STATUS_CLEARED,
        ];

        return new Status(
            $order['merchant_reference']['orderid2'],
            $order['id'],
            $order['status'],
            array_key_exists($order['status'], $statMap)
                ? $statMap[$order['status']]
                : StatusInterface::STATUS_CANCELLED,
            [
                'klarna_amount' => $order['cart']['total_price_including_tax'],
                'klarna_marshal' => json_encode($order->marshal()),
                'klarna_reservation' => $order['reservation'],
                'klarna_reference' => $order['reference'],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function getAuthorizedData()
    {
        return $this->authorizedData;
    }

    /**
     * @inheritdoc
     */
    public function setAuthorizedData(array $authorizedData)
    {
        $this->authorizedData = $authorizedData;
    }

    /**
     * @inheritdoc
     */
    public function executeDebit(PriceInterface $price = null, $reference = null)
    {
        if ($price) {
            // TODO or not ?
            throw new \Exception('not allowed');
        } else {
            $authorizedData = $this->getAuthorizedData();

            $order = $this->createOrder($authorizedData['klarna_order']);
            $order->fetch();

            if ($order['status'] == 'checkout_complete') {
                $order->update([
                    'status' => 'created',
                ]);
            }

            return new Status(
                $reference,
                $order['id'],
                $order['status'],
                $order['status'] == 'created'
                    ? StatusInterface::STATUS_CLEARED
                    : StatusInterface::STATUS_CANCELLED,
                [
                    'klarna_amount' => $order['cart']['total_price_including_tax'],
                    'klarna_marshal' => json_encode($order->marshal()),
                ]
            );
        }
    }

    /**
     * Executes credit
     *
     * @param PriceInterface $price
     * @param string $reference
     * @param string $transactionId
     *
     * @return StatusInterface
     *
     * @throws \Exception
     *
     * @see http://developers.klarna.com/en/at+php/kco-v2/order-management-api#introduction
     */
    public function executeCredit(PriceInterface $price, $reference, $transactionId)
    {
        // TODO: Implement executeCredit() method.
        throw new \Exception('not implemented');
    }

    /**
     * @param string $uri
     *
     * @return \Klarna_Checkout_Order
     */
    public function createOrder($uri = null)
    {
        // init
        $connector = \Klarna_Checkout_Connector::create(
            $this->sharedSecretKey,
            $this->endpoint);

        return new \Klarna_Checkout_Order($connector, $uri);
    }
}
