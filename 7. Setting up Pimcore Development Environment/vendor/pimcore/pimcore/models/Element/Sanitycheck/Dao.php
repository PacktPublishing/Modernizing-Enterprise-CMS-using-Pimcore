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

namespace Pimcore\Model\Element\Sanitycheck;

use Pimcore\Model;

/**
 * @internal
 *
 * @property \Pimcore\Model\Element\Sanitycheck $model
 */
class Dao extends Model\Dao\AbstractDao
{
    /**
     * Save to database
     *
     * @return bool
     *
     * @todo: not all save methods return a boolean, why this one?
     */
    public function save()
    {
        $sanityCheck = $this->model->getObjectVars();
        $data = [];

        foreach ($sanityCheck as $key => $value) {
            if (in_array($key, $this->getValidTableColumns('sanitycheck'))) {
                $data[$key] = $value;
            }
        }

        try {
            $this->db->insertOrUpdate('sanitycheck', $data);
        } catch (\Exception $e) {
            //probably duplicate
        }

        return true;
    }

    /**
     * Deletes object from database
     */
    public function delete()
    {
        $this->db->delete('sanitycheck', ['id' => $this->model->getId(), 'type' => $this->model->getType()]);
    }

    public function getNext()
    {
        $data = $this->db->fetchRow('SELECT * FROM sanitycheck LIMIT 1');
        if (is_array($data)) {
            $this->assignVariablesToModel($data);
        }
    }
}
