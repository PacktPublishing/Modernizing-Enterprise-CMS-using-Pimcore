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
use Pimcore\Bundle\EcommerceFrameworkBundle\CheckoutManager\CheckoutManager;
use Pimcore\Bundle\EcommerceFrameworkBundle\EnvironmentInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\Factory;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\AbstractPaymentInformation;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\Currency;
use Pimcore\Bundle\EcommerceFrameworkBundle\OrderManager\OrderAgentInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\Status;
use Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\StatusInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\V7\Payment\StartPaymentRequest\AbstractRequest;
use Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\V7\Payment\StartPaymentResponse\SnippetResponse;
use Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\V7\Payment\StartPaymentResponse\StartPaymentResponseInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\PriceSystem\Price;
use Pimcore\Bundle\EcommerceFrameworkBundle\PriceSystem\PriceInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\Tools\SessionConfigurator;
use Pimcore\Bundle\EcommerceFrameworkBundle\Type\Decimal;
use Pimcore\Logger;
use Pimcore\Model\DataObject\Fieldcollection\Data\OrderPriceModifications;
use Pimcore\Model\DataObject\OnlineShopOrder;
use Pimcore\Tool;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Templating\EngineInterface;

/**
 * @deprecated since Pimcore 6.8.0 and will be removed in Pimcore 10.
 */
class WirecardSeamless extends AbstractPayment implements \Pimcore\Bundle\EcommerceFrameworkBundle\PaymentManager\V7\Payment\PaymentInterface
{
    const HASH_ALGO_HMAC_SHA512 = 'hmac_sha512';

    const PAYMENT_RETURN_STATE_SUCCESS = 'success';
    const PAYMENT_RETURN_STATE_FAILURE = 'failure';
    const PAYMENT_RETURN_STATE_CANCEL = 'cancel';
    const PAYMENT_RETURN_STATE_PENDING = 'pending';

    const ENCODED_ORDERIDENT_DELIMITER = '---';

    const SESSION_KEY_STORAGE_ID = 'Wirecard_dataStorageId';

    /**
     * @var EngineInterface
     */
    protected $templatingEngine;

    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * @var array
     */
    protected $authorizedData;

    /**
     * @var string
     */
    protected $customerId;

    /**
     * @var string
     */
    protected $shopId;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $secret;

    /**
     * @var string
     */
    protected $hashAlgorithm;

    /**
     * @var array
     */
    protected $paymentMethods = [];

    /**
     * @var string
     */
    protected $customerStatement;

    /**
     * @var bool
     */
    protected $paypalActivateItemLevel = false;

    /**
     * @var string
     */
    protected $iframeCssUrl;

    /**
     * @var string
     */
    protected $partial;

    /**
     * @var string
     */
    protected $js;

    private $URL_WIRECARD_CHECKOUT = 'https://checkout.wirecard.com';
    private $URL_DATASTORAGE_INIT;
    private $URL_DATASTORAGE_READ;
    private $URL_FRONTEND_INIT;
    private $URL_APPROVE_REVERSAL = 'https://checkout.wirecard.com/seamless/backend/approveReversal';
    private $URL_DEPOSIT = 'https://checkout.wirecard.com/seamless/backend/deposit';
    private $WEBSITE_URL;
    private $CHECKOUT_WINDOW_NAME = 'wirecard_checkout';

    public function __construct(array $options, EngineInterface $templatingEngine, SessionInterface $session)
    {
        $this->templatingEngine = $templatingEngine;
        $this->session = $session;

        $this->processOptions(
            $this->configureOptions(new OptionsResolver())->resolve($options)
        );

        // TODO refactor properties to proper naming and to use request to fetch env data
        $this->URL_DATASTORAGE_INIT = $this->URL_WIRECARD_CHECKOUT . '/seamless/dataStorage/init';
        $this->URL_DATASTORAGE_READ = $this->URL_WIRECARD_CHECKOUT . '/seamless/dataStorage/read';
        $this->URL_FRONTEND_INIT = $this->URL_WIRECARD_CHECKOUT . '/seamless/frontend/init';

        $WEBSITE_URL = rtrim($_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'], '/') . '/';
        $this->WEBSITE_URL = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https://$WEBSITE_URL" : "http://$WEBSITE_URL";
    }

    protected function processOptions(array $options)
    {
        parent::processOptions($options);

        $this->customerId = $options['customer_id'];
        $this->shopId = $options['shop_id'];
        $this->password = $options['password'];
        $this->secret = $options['secret'];

        $paymentMethods = $options['payment_methods'];
        foreach ($paymentMethods as $paymentMethod => $paymentMethodOptions) {
            if (!is_array($paymentMethodOptions)) {
                throw new \InvalidArgumentException(sprintf(
                    'Payment method options for method "%s" must be an array, %s given',
                    $paymentMethod,
                    is_object($paymentMethodOptions) ? get_class($paymentMethodOptions) : gettype($paymentMethodOptions)
                ));
            }

            $this->paymentMethods[$paymentMethod] = $paymentMethodOptions;
        }

        $this->partial = $options['partial'];

        if (isset($options['js'])) {
            $this->js = $options['js'];
        }

        if (isset($options['hash_algorithm'])) {
            $this->hashAlgorithm = $options['hash_algorithm'];
        }

        if (isset($options['customer_statement'])) {
            $this->customerStatement = $options['customer_statement'];
        }

        if (isset($options['paypal_activate_item_level'])) {
            $this->paypalActivateItemLevel = $options['paypal_activate_item_level'];
        }
    }

    protected function configureOptions(OptionsResolver $resolver): OptionsResolver
    {
        parent::configureOptions($resolver);

        $resolver->setRequired([
            'customer_id',
            'shop_id',
            'secret',
            'password',
            'payment_methods',
            'partial',
        ]);

        $resolver->setAllowedTypes('payment_methods', 'array');
        $resolver->setAllowedTypes('partial', 'string');

        $resolver->setDefined('js');

        $resolver
            ->setDefined('hash_algorithm')
            ->setAllowedValues('hash_algorithm', [self::HASH_ALGO_HMAC_SHA512]);

        $resolver->setDefined('customer_statement');

        $resolver
            ->setDefined('paypal_activate_item_level')
            ->setAllowedTypes('paypal_activate_item_level', 'bool');

        $resolver
            ->setDefined('iframe_css_url')
            ->setAllowedTypes('iframe_css_url', 'string');

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
        return 'WirecardSeamless';
    }

    protected function getSessionBag(): AttributeBagInterface
    {
        /** @var AttributeBagInterface $bag */
        $bag = $this->session->getBag(SessionConfigurator::ATTRIBUTE_BAG_PAYMENT_ENVIRONMENT);

        return $bag;
    }

    /**
     * Start payment
     *
     * @param PriceInterface $price
     * @param array $config
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function initPayment(PriceInterface $price, array $config)
    {
        $orderIdent = $config['orderIdent'];

        if (!$orderIdent) {
            throw new \Exception('pass orderIdent to initPayment method of WirecardSeampless payment provider');
        }

        $fields = [
            'customerId' => $this->customerId,
            'shopId' => $this->shopId,
            'orderIdent' => $this->encodeOrderIdent($orderIdent),
            'returnUrl' => $this->WEBSITE_URL . 'frontend/fallback_return.php',
            'language' => $config['language'] ?: 'de',
            'javascriptScriptVersion' => 'pci3',
        ];

        $requestFingerprint = $this->generateFingerPrint($fields);

        if (null !== $this->iframeCssUrl) {
            $fields['iframeCssUrl'] = Tool::getHostUrl() . $this->iframeCssUrl;
        }

        $postFields = array_merge($fields, [
            'requestFingerprint' => $requestFingerprint,
        ]);

        $result = $this->serverToServerRequest($this->URL_DATASTORAGE_INIT, $postFields);

        $this->getSessionBag()->set(self::SESSION_KEY_STORAGE_ID, $result['storageId']);

        $javascriptURL = $result['javascriptUrl'];

        $params = [];
        $params['javascriptUrl'] = $javascriptURL;
        $params['orderIdent'] = $orderIdent;
        $params['paymentMethods'] = $this->paymentMethods;
        $params['config'] = $config;

        $params['wirecardFrontendScript'] = $this->js;

        return $this->templatingEngine->render($this->partial, $params);
    }

    /**
     * @inheritDoc
     */
    public function startPayment(OrderAgentInterface $orderAgent, PriceInterface $price, AbstractRequest $config): StartPaymentResponseInterface
    {
        $snippet = $this->initPayment($price, $config->asArray());

        return new SnippetResponse($orderAgent->getOrder(), $snippet);
    }

    public function getInitPaymentRedirectUrl($config)
    {
        if (!$cart = $config['cart']) {
            /** @var CartInterface $cart */
            throw new \Exception('no cart sent');
        }

        /** @var PriceInterface $price */
        $price = $config['price'] ?: $cart->getPriceCalculator()->getGrandTotal();

        $orderIdent = $this->encodeOrderIdent($config['paymentInfo']->getInternalPaymentId());
        $confirmURL = $config['confirmURL'];

        if (strpos($confirmURL, '?') === false) {
            $confirmURL .= '?orderIdent=';
        } else {
            $confirmURL .= '&orderIdent=';
        }

        $confirmURL .= urlencode($orderIdent);

        $paymentType = $config['paymentType'] ? $config['paymentType'] : $_REQUEST['paymentType'];

        $fields = [
            'customerId' => $this->customerId,
            'shopId' => $this->shopId,
            'amount' => round($price->getAmount()->asNumeric(), 2),
            'currency' => $price->getCurrency()->getShortName(),
            'paymentType' => $paymentType,
            'language' => $config['language'] ?: 'de',
            'orderDescription' => $config['orderDescription'] ?: $config['paymentInfo']->getInternalPaymentId(),
            'successUrl' => $config['successURL'],
            'cancelUrl' => $config['cancelURL'],
            'failureUrl' => $config['failureURL'],
            'serviceUrl' => $config['serviceURL'],
            'pendingUrl' => $config['pendingURL'],
            'confirmUrl' => $confirmURL,
            'consumerUserAgent' => $_SERVER['HTTP_USER_AGENT'],
            'consumerIpAddress' => $_SERVER['REMOTE_ADDR'],
            'storageId' => $this->getSessionBag()->get(self::SESSION_KEY_STORAGE_ID),
            'orderIdent' => $orderIdent,
            'windowName' => $this->CHECKOUT_WINDOW_NAME,
            // 'duplicateRequestCheck' => 'yes'
        ];

        if (null !== $this->customerStatement) {
            $fields['customerStatement'] = $this->customerStatement;
        }

        if ($config['orderReference']) {
            $fields['orderReference'] = $config['orderReference'];
        }

        if ($paymentType == 'INVOICE') {
            $fields = $this->addPayolutionRequestFields($fields, $config['paymentInfo']->getObject(), $config);
        }

        if ($paymentType == 'PAYPAL' && $this->paypalActivateItemLevel) {
            $fields = $this->addPaypalFields($fields, $config['paymentInfo']->getObject(), $config);
        }

        list($requestFingerprint, $requestFingerprintOrder) = $this->generateFingerprint($fields, true);

        $postFields = array_merge($fields, [
            'requestFingerprint' => $requestFingerprint,
            'requestFingerprintOrder' => $requestFingerprintOrder,
        ]);

        $result = $this->serverToServerRequest($this->URL_FRONTEND_INIT, $postFields);

        $redirectURL = $result['redirectUrl'];

        if (!$redirectURL) {
            if (\Pimcore::inDebugMode()) {
                Logger::error('seamless result: ' . var_export($result, true));
            }
            throw new \Exception('redirect url could not be evalutated');
        }

        return $redirectURL;
    }

    protected function addPayolutionRequestFields($fields, \Pimcore\Model\DataObject\OnlineShopOrder $order, $config)
    {
        if (!is_array($config['birthday']) || !$config['birthday']['year'] || !$config['birthday']['month'] || !$config['birthday']['day']) {
            throw new \Exception('no birthday passed');
        }

        $fields = array_merge($fields, [
            'consumerBillingFirstname' => $order->getCustomerFirstname(),
            'consumerBillingLastname' => $order->getCustomerLastname(),
            'consumerBillingAddress1' => $order->getCustomerStreet(),
            'consumerBillingCity' => $order->getCustomerCity(),
            'consumerBillingCountry' => trim($order->getCustomerCountry()),
            'consumerBillingZipCode' => $order->getCustomerZip(),
            'consumerEmail' => $order->getCustomerEmail(),

            'consumerShippingFirstname' => $order->getDeliveryFirstname(),
            'consumerShippingLastname' => $order->getDeliveryLastname(),
            'consumerShippingAddress1' => $order->getDeliveryStreet(),
            'consumerShippingCity' => $order->getDeliveryCity(),
            'consumerShippingCountry' => trim($order->getDeliveryCountry()),
            'consumerShippingZipCode' => $order->getDeliveryZip(),
        ]);

        return $fields;
    }

    /**
     * This method adds additional fields to Wirecard Seamless, so that order items
     * can be transmitted and visualized in Paypal (during the payment process and in the Paypal invoice email).
     *
     * @param array $fields
     * @param \Pimcore\Model\DataObject\OnlineShopOrder $order
     * @param array $config
     *
     * @return array
     */
    protected function addPaypalFields($fields, \Pimcore\Model\DataObject\OnlineShopOrder $order, $config)
    {
        $priceCheckSum = 0.0;
        $priceCheckSumNet = 0.0;
        $iCounter = 1;

        foreach ($order->getItems() as $i => $item) {
            $grossPrice = round($item->getTotalPrice() / $item->getAmount(), 2) ;
            $netPrice = round($item->getTotalNetPrice() / $item->getAmount(), 2);
            $taxRate = round((($grossPrice / $netPrice) - 1) * 100, 2);

            $fields = array_merge($fields, [
                sprintf('basketItem%dArticleNumber', $iCounter) => $item->getProductNumber(),
                sprintf('basketItem%dName', $iCounter) => $item->getProductName(),
                sprintf('basketItem%dDescription', $iCounter) => $item->getProductName(),
                sprintf('basketItem%dQuantity', $iCounter) => $item->getAmount(),
                sprintf('basketItem%dUnitNetAmount', $iCounter) => $netPrice,
                sprintf('basketItem%dUnitTaxRate', $iCounter) => $taxRate,
                sprintf('basketItem%dUnitGrossAmount', $iCounter) => $grossPrice,
                //not supported, must be implemented project-specifically.
                //sprintf("basketItem%dImageUrl",$iCounter)      => $mainDomain.$product->getMainImageUrlForExportWithoutHost(),
            ]);

            $iCounter++;
            $priceCheckSum += $grossPrice * $item->getAmount();
            $priceCheckSumNet += $netPrice * $item->getAmount();
        }

        $priceModifications = $order->getPriceModifications();
        foreach ($priceModifications as $modification) {
            /** @var OrderPriceModifications $modification */
            $net = $modification->getNetAmount();
            $amount = $modification->getAmount();
            $taxRate = round((($amount / $net) - 1) * 100, 2);
            $name = $modification->getName(); //TODO translation?

            $fields = array_merge($fields, [
                sprintf('basketItem%dArticleNumber', $iCounter) => $name,
                sprintf('basketItem%dName', $iCounter) => $name,
                sprintf('basketItem%dDescription', $iCounter) => $name,
                sprintf('basketItem%dQuantity', $iCounter) => 1,
                sprintf('basketItem%dUnitNetAmount', $iCounter) => $net,
                sprintf('basketItem%dUnitTaxRate', $iCounter) => $taxRate,
                sprintf('basketItem%dUnitGrossAmount', $iCounter) => $amount,
            ]);
            $priceCheckSum += $amount;
            $priceCheckSumNet += $net;
            $iCounter++;
        }
        $fields['basketItems'] = $iCounter - 1;

        return $fields;
    }

    /**
     * @param mixed $response
     *
     * @return StatusInterface
     *
     * @throws \Exception
     */
    public function handleResponse($response)
    {
        $orderIdent = $response['orderIdent'];
        $orderIdent = $this->decodeOrderIdent($orderIdent);

        $authorizedData = [
            'orderNumber' => null,
            'paymentType' => null,
            'paymentState' => null,
            'amount' => null,
            'currency' => null,
            'gatewayReferenceNumber' => null,
        ];

        $authorizedData = array_intersect_key($response, $authorizedData);

        if ($response['paymentType'] == 'PREPAYMENT') {

            // handle

            $authorizedData['paymentState'] = 'SUCCESS';
            $this->setAuthorizedData($authorizedData);

            return new Status(
                $orderIdent,
                '',
                '',
                StatusInterface::STATUS_AUTHORIZED,
                [
                    'seamless_amount' => '',
                    'seamless_paymentType' => 'PREPAYMENT',
                    'seamless_paymentState' => 'SUCCESS',
                    'seamless_response' => '',
                ]
            );
        }

        // handle
        $this->setAuthorizedData($authorizedData);

        foreach (['controller', 'action', 'document', 'docPath', 'pimcore_request_source'] as $unset) {
            unset($response[$unset]);
        }

        Logger::debug('wirecard seamless response' . var_export($response, true));

        // check required fields
        $required = [
            'responseFingerprintOrder' => null,
            'responseFingerprint' => null,
        ];

        if ($response['errors'] || in_array($response['paymentState'], ['PENDING', 'CANCEL'])) {
            $status = new Status(
                $orderIdent,
                $response['orderNumber'],
                $response['avsResponseMessage'],
                $response['orderNumber'] !== null && $response['paymentState'] == 'PENDING'
                    ? StatusInterface::STATUS_PENDING
                    : StatusInterface::STATUS_CANCELLED,
                [
                    'seamless_amount' => '',
                    'seamless_paymentType' => '',
                    'seamless_paymentState' => '',
                    'seamless_response' => json_encode($response),
                ]
            );

            Logger::debug('#wirecard response status: ' . var_export($status, true));

            return $status;
        }

        // check fields
        $check = array_intersect_key($response, $required);

        if (count($required) != count($check)) {
            throw new \Exception(sprintf('required fields are missing! required: %s', implode(', ', array_keys(array_diff_key($required, $check)))));
        }

        $fingerprintString = ''; // contains the values for computing the fingerprint
        $mandatoryFingerPrintFields = 0; // contains the number of received mandatory fields for the fingerprint
        $secretUsed = 0; // flag which contains 0 if secret has not been used or 1 if secret has been used
        $order = explode(',', $response['responseFingerprintOrder']);

        $secret = $this->secret;
        for ($i = 0; $i < count($order); $i++) {
            $key = $order[$i];
            $value = isset($response[$order[$i]]) ? $response[$order[$i]] : '';
            // checks if there are enough fields in the responsefingerprint
            if ((strcmp($key, 'paymentState')) == 0 && (strlen($value) > 0)) {
                $mandatoryFingerPrintFields++;
            }
            if ((strcmp($key, 'orderNumber')) == 0 && (strlen($value) > 0)) {
                $mandatoryFingerPrintFields++;
            }
            if ((strcmp($key, 'paymentType')) == 0 && (strlen($value) > 0)) {
                $mandatoryFingerPrintFields++;
            }
            // adds secret to fingerprint string
            if (strcmp($key, 'secret') == 0) {
                $fingerprintString .= $secret;
                $secretUsed = 1;
            } else {
                // adds parameter value to fingerprint string
                $fingerprintString .= $value;
            }
        }

        // computes the fingerprint from the fingerprint string
        $fingerprint = $this->calculateFingerprint($fingerprintString);

        if (!((strcmp($fingerprint, $response['responseFingerprint']) == 0)
            && ($mandatoryFingerPrintFields == 3)
            && ($secretUsed == 1))
        ) {
            throw new \Exception('The verification of the response data was not successful.');
        }

        // restore price object for payment status
        $price = new Price(Decimal::create($authorizedData['amount']), new Currency($authorizedData['currency']));

        $status = new Status(
            $orderIdent,
            $response['orderNumber'],
            $response['avsResponseMessage'],
            $response['orderNumber'] !== null && $response['paymentState'] == 'SUCCESS'
                ? StatusInterface::STATUS_AUTHORIZED
                : StatusInterface::STATUS_CANCELLED,
            [
                'seamless_amount' => (string)$price,
                'seamless_paymentType' => $response['paymentType'],
                'seamless_paymentState' => $response['paymentState'],
                'seamless_response' => print_r($response, true),
            ]
        );

        Logger::debug('#wirecard response status: ' . var_export($status, true));

        return $status;
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
     * execute payment
     *
     * @param PriceInterface|null $price
     * @param string|null $reference
     *
     * @throws \Exception
     *
     * @return StatusInterface
     */
    public function executeDebit(PriceInterface $price = null, $reference = null)
    {
        throw new \Exception('not implemented yet');
    }

    /**
     * Executes payment
     *
     * @param PriceInterface $price
     * @param string $reference
     *
     * @return StatusInterface
     *
     * @throws \Exception
     */
    public function deposit(PriceInterface $price = null, $reference = null, $transactionId = null)
    {
        $fields = [
            'customerId' => $this->customerId,
            'shopId' => $this->shopId,
            'password' => $this->password,
            'secret' => $this->secret,
            'language' => 'de',
            'orderNumber' => $reference,
            'amount' => round($price->getAmount()->asNumeric(), 2),
            'currency' => $price->getCurrency()->getShortName(),
        ];

        $requestFingerprint = $this->generateFingerprint($fields, false, true);

        unset($fields['secret']);

        $postFields = array_merge($fields, [
            'requestFingerprint' => $requestFingerprint,
        ]);

        $result = $this->serverToServerRequest($this->URL_DEPOSIT, $postFields);

        if ($result['errors']) {
            return new Status(
                $transactionId,
                $reference,
                'executeDepit: deposit canceled',
                StatusInterface::STATUS_CANCELLED,
                $result
            );
        } else {
            return new Status(
                $transactionId,
                $reference,
                'deposit executed: ' . round($price->getAmount()->asNumeric(), 2) . ' ' . $price->getCurrency()->getShortName(),
                StatusInterface::STATUS_CLEARED,
                []
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
     * @throws \Exception
     *
     * @return StatusInterface
     */
    public function executeCredit(PriceInterface $price, $reference, $transactionId)
    {
        throw new \Exception('not implemented yet');
    }

    /**
     * @param string $reference
     * @param string $transactionId
     * @param string $paymentType
     *
     * @return bool|Status
     */
    public function approveReversal($reference, $transactionId, $paymentType)
    {
        if ($paymentType == 'PREPAYMENT') {
            return new Status(
                $reference,
                $transactionId,
                'approveReversal: payment approval canceled',
                StatusInterface::STATUS_CANCELLED,
                []
            );
        }

        $fields = [
            'customerId' => $this->customerId,
            'shopId' => $this->shopId,
            'password' => $this->password,
            'secret' => $this->secret,
            'language' => 'de',
            'orderNumber' => $transactionId,
        ];

        $requestFingerprint = $this->generateFingerprint($fields, false, true);

        unset($fields['secret']);

        $postFields = array_merge($fields, [
            'requestFingerprint' => $requestFingerprint,
        ]);

        $result = $this->serverToServerRequest($this->URL_APPROVE_REVERSAL, $postFields);

        if (!$result['errors']) {
            return new Status(
                $reference,
                $transactionId,
                'approveReversal: payment approval canceled',
                StatusInterface::STATUS_CANCELLED,
                []
            );
        } else {
            return false;
        }
    }

    /**
     * @return string
     */
    protected function computeFingerprint()
    {
        $seed = '';
        for ($i = 0; $i < func_num_args(); $i++) {
            $seed .= func_get_arg($i);
        }

        return $this->calculateFingerprint($seed);
    }

    /**
     * @param string $url
     * @param array $params
     *
     * @return string[]
     */
    protected function serverToServerRequest($url, $params)
    {
        $postFields = http_build_query($params);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_PORT, 443);
        curl_setopt($curl, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        $response = curl_exec($curl);
        curl_close($curl);

        $r = [];
        parse_str($response, $r);

        return $r;
    }

    /**
     * Environment was kept optional for backwards compatibility, but should be passed if possible
     *
     * @param array $response
     * @param EnvironmentInterface|null $environment
     *
     * @return CartInterface|null
     */
    public static function createCartByOrderIdent($response, EnvironmentInterface $environment = null)
    {
        $orderIdent = $response['orderIdent'];
        $orderIdent = explode(self::ENCODED_ORDERIDENT_DELIMITER, $orderIdent);

        if ($order = OnlineShopOrder::getById($orderIdent[1])) {
            $cartId = $order->getCartId();

            $cartId = explode('_', $cartId, 2);
            if (class_exists($cartId[0])) {
                /** @var CartInterface $cart */
                $cart = new $cartId[0];
                $cart->setId($cartId[1]);

                $environment = $environment ?? Factory::getInstance()->getEnvironment();
                $environment->setCustomItem(CheckoutManager::FINISHED . '_' . $cart->getId(), true);

                return $cart;
            }
        }

        return null;
    }

    protected function encodeOrderIdent($orderIdent)
    {
        return str_replace('~', self::ENCODED_ORDERIDENT_DELIMITER, $orderIdent);
    }

    protected function decodeOrderIdent($orderIdent)
    {
        return str_replace(self::ENCODED_ORDERIDENT_DELIMITER, '~', $orderIdent);
    }

    /**
     * Calculate fingerprint based on algorithm
     */
    protected function calculateFingerprint($requestFingerprintSeed)
    {
        if ($this->hashAlgorithm === self::HASH_ALGO_HMAC_SHA512) {
            $requestFingerprint = hash_hmac('sha512', $requestFingerprintSeed, $this->secret);
            Logger::debug('#wirecard generateFingerprint (hmac): ' . $requestFingerprintSeed);
        } else {
            $requestFingerprint = hash('sha512', $requestFingerprintSeed);
            Logger::debug('#wirecard generateFingerprint: ' . $requestFingerprintSeed);
        }

        return $requestFingerprint;
    }

    protected function generateFingerprint($fields, $withOrder = false, $ignoreSecret = false)
    {
        $requestFingerprintSeed = '';
        $requestFingerprintOrder = '';

        foreach ($fields as $key => $value) {
            $requestFingerprintSeed .= $value;
            $requestFingerprintOrder .= $key . ',';
        }

        if (!$ignoreSecret) {
            $requestFingerprintSeed .= $this->secret;
            $requestFingerprintOrder .= 'secret,';
        }

        if ($withOrder) {
            $requestFingerprintOrder .= 'requestFingerprintOrder';
            $requestFingerprintSeed .= $requestFingerprintOrder;
        }

        $requestFingerprint = $this->calculateFingerprint($requestFingerprintSeed);
        if ($withOrder) {
            return [$requestFingerprint, $requestFingerprintOrder];
        }

        return $requestFingerprint;
    }

    /**
     * extracts seamless response of provider data from given payment information
     *
     * @param AbstractPaymentInformation $paymentInfo
     *
     * @return null | array
     */
    public static function extractSeamlessResponse(AbstractPaymentInformation $paymentInfo)
    {
        if ($providerData = $paymentInfo->getProviderData()) {
            $providerData = json_decode($providerData);
            if ($providerData['seamless_response']) {
                return json_decode($providerData['seamless_response']);
            }
        }

        return null;
    }
}
