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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config;

use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\SynonymProvider\SynonymProviderInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Worker\ElasticSearch\AbstractElasticSearch;

/**
 * Interface for IndexService Tenant Configurations using elastic search as index
 */
interface ElasticSearchConfigInterface extends ConfigInterface
{
    /**
     * returns elastic search client parameters defined in the tenant config
     *
     * @return array
     */
    public function getElasticSearchClientParams();

    /**
     * returns condition for current subtenant
     *
     * @return array
     */
    public function getSubTenantCondition();

    /**
     * creates and returns tenant worker suitable for this tenant configuration
     *
     * @return AbstractElasticSearch
     */
    public function getTenantWorker();

    /**
     * Get an associative array of configured synonym providers.
     *  - key: the name of the synonym provider configuration, which is equivalent to the name of the configured filter
     *  - value: the synonym provider
     *
     * @return SynonymProviderInterface[]
     */
    public function getSynonymProviders(): array;

    /**
     * @param string $property
     *
     * @return array|string
     */
    public function getClientConfig($property = null);

    /**
     * returns the full field name
     *
     * @param string $fieldName
     * @param bool $considerSubFieldNames - activate to consider subfield names like name.analyzed or score definitions like name^3
     *
     * @return string
     */
    public function getFieldNameMapped($fieldName, $considerSubFieldNames = false);

    /**
     * returns short field name based on full field name
     * also considers subfield names like name.analyzed etc.
     *
     * @param string $fullFieldName
     *
     * @return false|int|string
     */
    public function getReverseMappedFieldName($fullFieldName);
}
