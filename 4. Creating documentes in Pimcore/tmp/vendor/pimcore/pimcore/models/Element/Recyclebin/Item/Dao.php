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
 * @package    Element
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\Element\Recyclebin\Item;

use Pimcore\Logger;
use Pimcore\Model;

/**
 * @property \Pimcore\Model\Element\Recyclebin\Item $model
 */
class Dao extends Model\Dao\AbstractDao
{
    /**
     * @param int $id
     *
     * @throws \Exception
     */
    public function getById($id)
    {
        $data = $this->db->fetchRow('SELECT * FROM recyclebin WHERE id = ?', $id);

        if (!$data['id']) {
            throw new \Exception('Recyclebin item with id ' . $id . ' not found');
        }

        $this->assignVariablesToModel($data);
    }

    /**
     * Save object to database
     *
     * @return bool
     *
     * @todo: not all save methods return a boolean, why this one?
     */
    public function save()
    {
        $version = $this->model->getObjectVars();
        $data = [];

        foreach ($version as $key => $value) {
            if (in_array($key, $this->getValidTableColumns('recyclebin'))) {
                $data[$key] = $value;
            }
        }

        try {
            $this->db->insert('recyclebin', $data);
            $this->model->setId($this->db->lastInsertId());
        } catch (\Exception $e) {
            Logger::error($e);
        }

        return true;
    }

    /**
     * Deletes object from database
     */
    public function delete()
    {
        $this->db->delete('recyclebin', ['id' => $this->model->getId()]);
    }
}
