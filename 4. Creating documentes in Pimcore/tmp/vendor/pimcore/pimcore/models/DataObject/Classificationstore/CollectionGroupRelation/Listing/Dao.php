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
 * @category   Pimcore
 * @package    Object
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\DataObject\Classificationstore\CollectionGroupRelation\Listing;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @property \Pimcore\Model\DataObject\Classificationstore\CollectionGroupRelation\Listing $model
 */
class Dao extends Model\Listing\Dao\AbstractDao
{
    /**
     * Loads a list of Classificationstore group configs for the specified parameters, returns an array of config elements
     *
     * @return array
     */
    public function load()
    {
        $condition = $this->getCondition();
        if ($condition) {
            $condition = $condition . ' AND ';
        } else {
            $condition = ' where ';
        }
        $condition .= DataObject\Classificationstore\CollectionGroupRelation\Dao::TABLE_NAME_RELATIONS
            . '.groupId = ' . DataObject\Classificationstore\GroupConfig\Dao::TABLE_NAME_GROUPS . '.id';

        $sql = 'SELECT * FROM ' . DataObject\Classificationstore\CollectionGroupRelation\Dao::TABLE_NAME_RELATIONS
            . ',' . DataObject\Classificationstore\GroupConfig\Dao::TABLE_NAME_GROUPS
            . $condition . $this->getOrder() . $this->getOffsetLimit();

        $data = $this->db->fetchAll($sql, $this->model->getConditionVariables());

        $configData = [];
        foreach ($data as $dataItem) {
            $entry = new DataObject\Classificationstore\CollectionGroupRelation();
            $resource = $entry->getDao();
            $resource->assignVariablesToModel($dataItem);

            $configData[] = $entry;
        }

        $this->model->setList($configData);

        return $configData;
    }

    /**
     * @return array
     */
    public function getDataArray()
    {
        $configsData = $this->db->fetchAll('SELECT * FROM ' . DataObject\Classificationstore\CollectionGroupRelation\Dao::TABLE_NAME_RELATIONS . $this->getCondition() . $this->getOrder() . $this->getOffsetLimit(), $this->model->getConditionVariables());

        return $configsData;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        try {
            return (int) $this->db->fetchOne('SELECT COUNT(*) FROM ' . DataObject\Classificationstore\CollectionGroupRelation\Dao::TABLE_NAME_RELATIONS . ' '. $this->getCondition(), $this->model->getConditionVariables());
        } catch (\Exception $e) {
            return 0;
        }
    }
}
