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

namespace Pimcore\Model\Element\Note;

use Pimcore\Model;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Model\Document;

/**
 * @property \Pimcore\Model\Element\Note $model
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
        $data = $this->db->fetchRow('SELECT * FROM notes WHERE id = ?', $id);

        if (!$data['id']) {
            throw new \Exception('Note item with id ' . $id . ' not found');
        }
        $this->assignVariablesToModel($data);

        // get key-value data
        $keyValues = $this->db->fetchAll('SELECT * FROM notes_data WHERE id = ?', [$id]);
        $preparedData = [];

        foreach ($keyValues as $keyValue) {
            $data = $keyValue['data'];
            $type = $keyValue['type'];
            $name = $keyValue['name'];

            if ($type == 'document') {
                if ($data) {
                    $data = Document::getById($data);
                }
            } elseif ($type == 'asset') {
                if ($data) {
                    $data = Asset::getById($data);
                }
            } elseif ($type == 'object') {
                if ($data) {
                    $data = DataObject\AbstractObject::getById($data);
                }
            } elseif ($type == 'date') {
                if ($data > 0) {
                    $date = new \DateTime();
                    $date->setTimestamp($data);
                    $data = $date;
                }
            } elseif ($type == 'bool') {
                $data = (bool) $data;
            }

            $preparedData[$name] = [
                'data' => $data,
                'type' => $type,
            ];
        }

        $this->model->setData($preparedData);
    }

    /** Saves note to database.
     * @return bool
     *
     * @throws \Exception
     */
    public function save()
    {
        $version = $this->model->getObjectVars();

        $data = [];

        // save main table
        foreach ($version as $key => $value) {
            if (in_array($key, $this->getValidTableColumns('notes'))) {
                $data[$key] = $value;
            }
        }

        $this->db->insertOrUpdate('notes', $data);

        $lastInsertId = $this->db->lastInsertId();
        if (!$this->model->getId() && $lastInsertId) {
            $this->model->setId($lastInsertId);
        }

        // save data table
        $this->deleteData();
        foreach ($this->model->getData() as $name => $meta) {
            $data = $meta['data'];
            $type = $meta['type'];

            if ($type == 'document') {
                if ($data instanceof Document) {
                    $data = $data->getId();
                }
            } elseif ($type == 'asset') {
                if ($data instanceof Asset) {
                    $data = $data->getId();
                }
            } elseif ($type == 'object') {
                if ($data instanceof DataObject\AbstractObject) {
                    $data = $data->getId();
                }
            } elseif ($type == 'date') {
                if ($data instanceof \DateTimeInterface) {
                    $data = $data->getTimestamp();
                }
            } elseif ($type == 'bool') {
                $data = (bool) $data;
            }

            $this->db->insert('notes_data', [
                'id' => $this->model->getId(),
                'name' => $name,
                'type' => $type,
                'data' => $data,
            ]);
        }

        return true;
    }

    /** Deletes note from database.
     * @throws \Exception
     */
    public function delete()
    {
        $this->db->delete('notes', ['id' => $this->model->getId()]);
        $this->deleteData();
    }

    /** Deletes note data from database.
     * @throws \Exception
     */
    protected function deleteData()
    {
        $this->db->delete('notes_data', ['id' => $this->model->getId()]);
    }
}
