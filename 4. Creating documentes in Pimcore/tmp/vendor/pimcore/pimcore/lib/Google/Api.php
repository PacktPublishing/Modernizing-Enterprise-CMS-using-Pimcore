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

namespace Pimcore\Google;

use Pimcore\Config;
use Pimcore\Model\Tool\TmpStore;

class Api
{
    const ANALYTICS_API_URL = 'https://www.googleapis.com/analytics/v3/';

    /**
     * @return string
     */
    public static function getPrivateKeyPath()
    {
        $path = \Pimcore\Config::locateConfigFile('google-api-private-key.json');

        return $path;
    }

    /**
     * @return mixed
     */
    public static function getConfig()
    {
        return Config::getSystemConfiguration('services')['google'] ?? [];
    }

    /**
     * @param string $type
     *
     * @return bool
     */
    public static function isConfigured($type = 'service')
    {
        if ($type == 'simple') {
            return self::isSimpleConfigured();
        }

        return self::isServiceConfigured();
    }

    /**
     * @return bool
     */
    public static function isServiceConfigured()
    {
        $config = self::getConfig();

        if (!empty($config['client_id']) && !empty($config['email']) && file_exists(self::getPrivateKeyPath())) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public static function isSimpleConfigured()
    {
        $config = self::getConfig();

        if (!empty($config['simple_api_key'])) {
            return true;
        }

        return false;
    }

    /**
     * @param string $type
     *
     * @return \Google_Client
     */
    public static function getClient($type = 'service')
    {
        if ($type == 'simple') {
            return self::getSimpleClient();
        }

        return self::getServiceClient();
    }

    /**
     * @param array|null $scope
     *
     * @return bool|\Google_Client
     */
    public static function getServiceClient($scope = null)
    {
        if (!self::isServiceConfigured()) {
            return false;
        }

        $config = self::getConfig();

        if (!$scope) {
            // default scope
            $scope = ['https://www.googleapis.com/auth/analytics.readonly'];
        }

        $client = new \Google_Client();

        $cache = \Pimcore::getContainer()->get('pimcore.cache.core.pool');
        $client->setCache($cache);

        $client->setApplicationName('pimcore CMF');
        $json = self::getPrivateKeyPath();
        $client->setAuthConfig($json);

        $client->setScopes($scope);

        $client->setClientId($config['client_id'] ?? '');

        // token cache
        $hash = crc32(serialize([$scope]));
        $tokenId = 'google-api.token.' . $hash;
        $token = null;
        if ($tokenData = TmpStore::get($tokenId)) {
            $tokenInfo = json_decode($tokenData->getData(), true);
            if (($tokenInfo['created'] + $tokenInfo['expires_in']) > (time() - 900)) {
                $token = $tokenData->getData();
            }
        }

        if (!$token) {
            $client->fetchAccessTokenWithAssertion();
            $token = json_encode($client->getAccessToken());

            // 1 hour (3600s) is the default expiry time
            TmpStore::add($tokenId, $token, null, 3600);
        }

        $client->setAccessToken($token);

        return $client;
    }

    /**
     * @return \Google_Client|false
     */
    public static function getSimpleClient()
    {
        if (!self::isSimpleConfigured()) {
            return false;
        }

        $client = new \Google_Client();

        $cache = \Pimcore::getContainer()->get('pimcore.cache.core.pool');
        $client->setCache($cache);

        $client->setApplicationName('pimcore CMF');
        $client->setDeveloperKey(Config::getSystemConfiguration('services')['google']['simple_api_key']);

        return $client;
    }

    /**
     * @return array
     */
    public static function getAnalyticsDimensions()
    {
        return self::getAnalyticsMetadataByType('DIMENSION');
    }

    /**
     * @return array
     */
    public static function getAnalyticsMetrics()
    {
        return self::getAnalyticsMetadataByType('METRIC');
    }

    /**
     * @return mixed
     *
     * @throws \Exception
     * @throws \Exception
     */
    public static function getAnalyticsMetadata()
    {
        $client = \Pimcore::getContainer()->get('pimcore.http_client');
        $result = $client->get(self::ANALYTICS_API_URL.'metadata/ga/columns');

        return json_decode($result->getBody(), true);
    }

    /**
     * @param string $type
     *
     * @return array
     *
     * @throws \Exception
     */
    protected static function getAnalyticsMetadataByType($type)
    {
        $data = self::getAnalyticsMetadata();
        $translator = \Pimcore::getContainer()->get('translator');

        $result = [];
        foreach ($data['items'] as $item) {
            if ($item['attributes']['type'] == $type) {
                if (strpos($item['id'], 'XX') !== false) {
                    for ($i = 1; $i <= 5; $i++) {
                        $name = str_replace('1', $i, str_replace('01', $i, $translator->trans($item['attributes']['uiName'], [], 'admin')));

                        if (in_array($item['id'], ['ga:dimensionXX', 'ga:metricXX'])) {
                            $name .= ' '.$i;
                        }
                        $result[] = [
                            'id' => str_replace('XX', $i, $item['id']),
                            'name' => $name,
                        ];
                    }
                } else {
                    $result[] = [
                        'id' => $item['id'],
                        'name' => $translator->trans($item['attributes']['uiName'], [], 'admin'),
                    ];
                }
            }
        }

        return $result;
    }
}
