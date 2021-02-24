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
 * @package    Schedule
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\Schedule\Task;

use Pimcore\Model;

/**
 * @property \Pimcore\Model\Schedule\Task $model
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
        $data = $this->db->fetchRow('SELECT * FROM schedule_tasks WHERE id = ?', $id);
        if (!$data['id']) {
            throw new \Exception('there is no task for the requested id');
        }
        $this->assignVariablesToModel($data);
    }

    public function save()
    {
        if (!$this->model->getId()) {
            $this->create();
        }

        $this->update();
    }

    /**
     * Create a new record for the object in database
     */
    public function create()
    {
        $this->db->insert('schedule_tasks', []);
        $this->model->setId($this->db->lastInsertId());
    }

    /**
     * Save changes to database, it's an good idea to use save() instead
     */
    public function update()
    {
        $site = $this->model->getObjectVars();
        $data = [];

        foreach ($site as $key => $value) {
            if (in_array($key, $this->getValidTableColumns('schedule_tasks'))) {
                if (is_array($value) || is_object($value)) {
                    $value = \Pimcore\Tool\Serialize::serialize($value);
                } elseif (is_bool($value)) {
                    $value = (int)$value;
                }
                $data[$key] = $value;
            }
        }

        $this->db->update('schedule_tasks', $data, ['id' => $this->model->getId()]);
    }

    /**
     * Deletes object from database
     */
    public function delete()
    {
        $this->db->delete('schedule_tasks', ['id' => $this->model->getId()]);
    }
}
