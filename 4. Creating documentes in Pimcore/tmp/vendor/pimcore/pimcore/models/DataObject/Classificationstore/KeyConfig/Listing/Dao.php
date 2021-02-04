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

namespace Pimcore\Model\DataObject\Classificationstore\KeyConfig\Listing;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @property \Pimcore\Model\DataObject\Classificationstore\KeyConfig\Listing $model
 */
class Dao extends Model\Listing\Dao\AbstractDao
{
    /**
     * Loads a list of Classificationstore key configs for the specified parameters, returns an array of config elements
     *
     * @return array
     */
    public function load()
    {
        $sql = 'SELECT * FROM ' . DataObject\Classificationstore\KeyConfig\Dao::TABLE_NAME_KEYS . $this->getCondition() . $this->getOrder() . $this->getOffsetLimit();
        $configsData = $this->db->fetchAll($sql, $this->model->getConditionVariables());

        $configList = [];
        foreach ($configsData as $keyConfigData) {
            $keyConfig = new DataObject\Classificationstore\KeyConfig();
            $keyConfig->setValues($keyConfigData);
            $configList[] = $keyConfig;
        }

        $this->model->setList($configList);

        return $configList;
    }

    /**
     * @return array
     */
    public function getDataArray()
    {
        $configsData = $this->db->fetchAll('SELECT * FROM ' . DataObject\Classificationstore\KeyConfig\Dao::TABLE_NAME_KEYS . $this->getCondition() . $this->getOrder() . $this->getOffsetLimit(), $this->model->getConditionVariables());

        return $configsData;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        try {
            return (int) $this->db->fetchOne('SELECT COUNT(*) FROM ' . DataObject\Classificationstore\KeyConfig\Dao::TABLE_NAME_KEYS . ' '. $this->getCondition(), $this->model->getConditionVariables());
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * @return string
     */
    protected function getCondition()
    {
        $condition = $this->model->getIncludeDisabled() ? '(enabled is null or enabled = 0)' : 'enabled = 1';

        $cond = $this->model->getCondition();
        if ($cond) {
            $condition = $condition . ' AND (' . $cond . ')';
        }

        if ($condition) {
            return ' WHERE ' . $condition . ' ';
        }

        return '';
    }
}
