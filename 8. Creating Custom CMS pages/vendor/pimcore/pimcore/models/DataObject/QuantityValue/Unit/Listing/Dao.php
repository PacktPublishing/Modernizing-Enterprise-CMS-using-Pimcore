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

namespace Pimcore\Model\DataObject\QuantityValue\Unit\Listing;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @property \Pimcore\Model\DataObject\QuantityValue\Unit\Listing $model
 */
class Dao extends Model\Listing\Dao\AbstractDao
{
    /**
     * @return array
     */
    public function load()
    {
        $units = [];

        $unitConfigs = $this->db->fetchAll('SELECT * FROM ' . DataObject\QuantityValue\Unit\Dao::TABLE_NAME .
            $this->getCondition() . $this->getOrder() . $this->getOffsetLimit(), $this->model->getConditionVariables());

        foreach ($unitConfigs as $unitConfig) {
            $unit = new DataObject\QuantityValue\Unit();
            $unit->setValues($unitConfig);
            $units[] = $unit;
        }

        $this->model->setUnits($units);

        return $units;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        try {
            return (int) $this->db->fetchOne('SELECT COUNT(*) FROM '.DataObject\QuantityValue\Unit\Dao::TABLE_NAME.' ' . $this->getCondition(), $this->model->getConditionVariables());
        } catch (\Exception $e) {
            return 0;
        }
    }
}
