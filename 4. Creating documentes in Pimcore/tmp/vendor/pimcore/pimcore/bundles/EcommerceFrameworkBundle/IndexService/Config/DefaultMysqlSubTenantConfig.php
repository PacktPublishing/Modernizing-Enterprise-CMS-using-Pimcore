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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\Config;

use Pimcore\Bundle\EcommerceFrameworkBundle\EnvironmentInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\IndexableInterface;
use Pimcore\Db\ConnectionInterface;

/**
 * Sample implementation for sub-tenants based on mysql.
 *
 * NOTE: this works only with a single-column primary key
 */
class DefaultMysqlSubTenantConfig extends DefaultMysql
{
    /**
     * @var EnvironmentInterface
     */
    protected $environment;

    /**
     * @var ConnectionInterface
     */
    protected $db;

    /**
     * @inheritDoc
     */
    public function __construct(
        string $tenantName,
        array $attributes,
        array $searchAttributes,
        array $filterTypes,
        array $options = [],
        EnvironmentInterface $environment,
        ConnectionInterface $db
    ) {
        $this->environment = $environment;
        $this->db = $db;

        parent::__construct($tenantName, $attributes, $searchAttributes, $filterTypes, $options);
    }

    /**
     * returns table name of product index
     *
     * @return string
     */
    public function getTablename()
    {
        return 'ecommerceframework_productindex_with_subtenants';
    }

    /**
     * returns table name of product index reations
     *
     * @return string
     */
    public function getRelationTablename()
    {
        return 'ecommerceframework_productindex_with_subtenants_relations';
    }

    /**
     * return table name of product index tenant relations for subtenants
     *
     * @return string
     */
    public function getTenantRelationTablename()
    {
        return 'ecommerceframework_productindex_with_subtenants_tenant_relations';
    }

    /**
     * checks, if product should be in index for current tenant (not subtenant)
     *
     * @param IndexableInterface $object
     *
     * @return bool
     */
    public function inIndex(IndexableInterface $object)
    {
        $tenants = $object->getTenants();

        return !empty($tenants);
    }

    /**
     * return join statement in case of subtenants
     *
     * In this case adds join statement to tenant relation table. But in theory any needed join statement can be
     * added here.
     *
     * @return string
     */
    public function getJoins()
    {
        $currentSubTenant = $this->environment->getCurrentAssortmentSubTenant();
        if ($currentSubTenant) {
            return ' INNER JOIN ' . $this->getTenantRelationTablename() . ' b ON a.o_id = b.o_id ';
        } else {
            return '';
        }
    }

    /**
     * returns additional condition in case of subtenants
     *
     * In this case just adds the condition that subtenant_id equals the current subtenant
     *
     * @return string
     */
    public function getCondition()
    {
        $currentSubTenant = $this->environment->getCurrentAssortmentSubTenant();
        if ($currentSubTenant) {
            return 'b.subtenant_id = ' . $currentSubTenant;
        } else {
            return '';
        }
    }

    /**
     * in case of subtenants returns a data structure containing all sub tenants
     *
     * In this case tenants are also Pimcore objects and are assigned to product objects.
     * This method extracts assigned tenants and returns an array of [object-ID, subtenant-ID]
     *
     * @param IndexableInterface $object
     * @param int|null $subObjectId
     *
     * @return mixed $subTenantData
     */
    public function prepareSubTenantEntries(IndexableInterface $object, $subObjectId = null)
    {
        $subTenantData = [];
        if ($this->inIndex($object)) {
            //implementation specific tenant get logic
            foreach ($object->getTenants() as $tenant) {
                $subTenantData[] = ['o_id' => $object->getId(), 'subtenant_id' => $tenant->getId()];
            }
        }

        return $subTenantData;
    }

    /**
     * populates index for tenant relations based on given data
     *
     * In this case deletes all entries of given object from tenant relation table and adds the new ones.
     *
     * @param mixed $objectId
     * @param mixed $subTenantData
     * @param mixed $subObjectId
     *
     * @return void
     */
    public function updateSubTenantEntries($objectId, $subTenantData, $subObjectId = null)
    {
        $this->db->deleteWhere($this->getTenantRelationTablename(), 'o_id = ' . $this->db->quote($subObjectId ? $subObjectId : $objectId));

        if ($subTenantData) {
            //implementation specific tenant get logic
            foreach ($subTenantData as $data) {
                $this->db->insert($this->getTenantRelationTablename(), $data);
            }
        }
    }
}
