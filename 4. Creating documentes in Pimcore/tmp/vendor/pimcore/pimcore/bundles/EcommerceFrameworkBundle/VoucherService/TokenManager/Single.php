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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\VoucherService\TokenManager;

use Pimcore\Bundle\EcommerceFrameworkBundle\CartManager\CartInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\Exception\InvalidConfigException;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\AbstractOrder;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\AbstractVoucherTokenType;
use Pimcore\Bundle\EcommerceFrameworkBundle\VoucherService\Reservation;
use Pimcore\Bundle\EcommerceFrameworkBundle\VoucherService\Statistic;
use Pimcore\Bundle\EcommerceFrameworkBundle\VoucherService\Token;
use Pimcore\Model\DataObject\Fieldcollection\Data\VoucherTokenTypeSingle;
use Pimcore\Model\DataObject\OnlineShopVoucherToken;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Paginator;

class Single extends AbstractTokenManager implements ExportableTokenManagerInterface
{
    protected $template;

    public function __construct(AbstractVoucherTokenType $configuration)
    {
        parent::__construct($configuration);
        if ($configuration instanceof VoucherTokenTypeSingle) {
            $this->template = 'PimcoreEcommerceFrameworkBundle:voucher:voucher_code_tab_single.html.twig';
        } else {
            throw new InvalidConfigException('Invalid Configuration Class for type VoucherTokenTypeSingle.');
        }
    }

    /**
     * @return bool
     */
    public function isValidSetting()
    {
        // TODO do some character matching etc
        return true;
    }

    /**
     * @return bool
     */
    public function cleanUpCodes($filter = [])
    {
        return true;
    }

    public function cleanupReservations($duration = 0, $seriesId = null)
    {
        return Reservation::cleanUpReservations($duration, $seriesId);
    }

    /**
     * @param array $viewParamsBag
     * @param array $params
     *
     * @return string
     */
    public function prepareConfigurationView(&$viewParamsBag, $params)
    {
        if ($this->getConfiguration()->getToken() != $this->getCodes()[0]['token']) {
            $viewParamsBag['generateWarning'] = 'bundle_ecommerce_voucherservice_msg-error-overwrite-single';
            $viewParamsBag['settings']['Original Token'] = $this->getCodes()[0];
        }

        if ($codes = $this->getCodes()) {
            $viewParamsBag['paginator'] = new Paginator(new ArrayAdapter($codes));
            $viewParamsBag['count'] = count($codes);
        }

        $viewParamsBag['msg']['error'] = $params['error'] ?? '';
        $viewParamsBag['msg']['success'] = $params['success'] ?? '';

        $viewParamsBag['settings'] = [
            'bundle_ecommerce_voucherservice_settings-token' => $this->getConfiguration()->getToken(),
            'bundle_ecommerce_voucherservice_settings-max-usages' => $this->getConfiguration()->getUsages(),
        ];

        $statisticUsagePeriod = 30;
        if (isset($params['statisticUsagePeriod'])) {
            $statisticUsagePeriod = $params['statisticUsagePeriod'];
        }
        $viewParamsBag['statistics'] = $this->getStatistics($statisticUsagePeriod);

        return $this->template;
    }

    /**
     * Get data for export
     *
     * @param array $params
     *
     * @return array
     *
     * @throws \Exception
     */
    protected function getExportData(array $params)
    {
        $data = [];
        if ($codes = $this->getCodes()) {
            foreach ($codes as $code) {
                $data[] = $code;
            }
        }

        return $data;
    }

    /**
     * @return int
     */
    public function getFinalTokenLength()
    {
        return strlen($this->configuration->getToken());
    }

    /**
     * @return bool | string - bool if failed - string if successfully created
     */
    public function insertOrUpdateVoucherSeries()
    {
        $db = \Pimcore\Db::get();
        try {
            $query =
                'INSERT INTO ' . Token\Dao::TABLE_NAME . '(token,length,voucherSeriesId) VALUES (?,?,?)
                    ON DUPLICATE KEY UPDATE token = ?, length = ?';

            $db->query($query, [trim($this->configuration->getToken()), $this->getFinalTokenLength(), $this->getSeriesId(), trim($this->configuration->getToken()), $this->getFinalTokenLength()]);

            return trim($this->configuration->getToken());
        } catch (\Exception $e) {
            return false;
        }

        return false;
    }

    /**
     * @param null|array $params
     *
     * @return array|bool
     */
    public function getCodes($params = null)
    {
        return Token\Listing::getCodes($this->seriesId, $params);
    }

    protected function prepareUsageStatisticData(&$data, $usagePeriod)
    {
        $now = new \DateTime();
        $periodData = [];
        for ($i = $usagePeriod; $i > 0; $i--) {
            $index = $now->format('Y-m-d');
            $periodData[$index] = isset($data[$index]) ? $data[$index] : 0;
            $now->modify('-1 day');
        }
        $data = $periodData;
    }

    /**
     * @return array
     */
    public function getStatistics($usagePeriod = null)
    {
        $overallCount = $this->configuration->getUsages();
        $usageCount = Token::getByCode($this->configuration->getToken())->getUsages();
        $reservedTokenCount = Token\Listing::getCountByReservation($this->seriesId);

        $usage = Statistic::getBySeriesId($this->seriesId, $usagePeriod);
        $this->prepareUsageStatisticData($usage, $usagePeriod);

        return [
            'overallCount' => $overallCount,
            'usageCount' => $usageCount,
            'freeCount' => $overallCount - $usageCount - $reservedTokenCount,
            'reservedCount' => $reservedTokenCount,
            'usage' => $usage,
        ];
    }

    /**
     * @param string $code
     * @param CartInterface $cart
     *
     * @return bool
     */
    public function reserveToken($code, CartInterface $cart)
    {
        if ($token = Token::getByCode($code)) {
            if (Reservation::create($code, $cart)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $code
     * @param CartInterface $cart
     * @param AbstractOrder $order
     *
     * @return bool|\Pimcore\Model\DataObject\OnlineShopVoucherToken
     */
    public function applyToken($code, CartInterface $cart, AbstractOrder $order)
    {
        if ($token = Token::getByCode($code)) {
            if ($token->check($this->configuration->getUsages(), true)) {
                if ($token->apply()) {
                    $orderToken = \Pimcore\Model\DataObject\OnlineShopVoucherToken::getByToken($code, 1);
                    if (!$orderToken instanceof \Pimcore\Model\DataObject\OnlineShopVoucherToken) {
                        $orderToken = new \Pimcore\Model\DataObject\OnlineShopVoucherToken();
                        $orderToken->setTokenId($token->getId());
                        $orderToken->setToken($token->getToken());
                        $series = \Pimcore\Model\DataObject\OnlineShopVoucherSeries::getById($token->getVoucherSeriesId());
                        $orderToken->setVoucherSeries($series);
                        $orderToken->setParent($series);        // TODO set correct parent for applied tokens
                        $orderToken->setKey(\Pimcore\File::getValidFilename($token->getToken()));
                        $orderToken->setPublished(1);
                        $orderToken->save();
                    }

                    return $orderToken;
                }
            }
        }

        return false;
    }

    /**
     * cleans up the token usage and the ordered token object if necessary
     *
     * @param OnlineShopVoucherToken $tokenObject
     * @param AbstractOrder $order
     *
     * @return bool
     */
    public function removeAppliedTokenFromOrder(OnlineShopVoucherToken $tokenObject, AbstractOrder $order)
    {
        if ($token = Token::getByCode($tokenObject->getToken())) {
            return $token->unuse();
        }

        return false;
    }

    /**
     * @param string $code
     * @param CartInterface $cart
     *
     * @return bool
     */
    public function releaseToken($code, CartInterface $cart)
    {
        return Reservation::releaseToken($code, $cart);
    }

    /**
     * @param string $code
     * @param CartInterface $cart
     *
     * @return bool
     */
    public function checkToken($code, CartInterface $cart)
    {
        parent::checkToken($code, $cart);
        if ($token = Token::getByCode($code)) {
            if ($token->check($this->configuration->getUsages())) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return \Pimcore\Model\DataObject\Fieldcollection\Data\VoucherTokenTypeSingle
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @param \Pimcore\Model\DataObject\Fieldcollection\Data\VoucherTokenTypeSingle $configuration
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return mixed
     */
    public function getSeriesId()
    {
        return $this->seriesId;
    }

    /**
     * @param mixed $seriesId
     */
    public function setSeriesId($seriesId)
    {
        $this->seriesId = $seriesId;
    }

    /**
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }
}
