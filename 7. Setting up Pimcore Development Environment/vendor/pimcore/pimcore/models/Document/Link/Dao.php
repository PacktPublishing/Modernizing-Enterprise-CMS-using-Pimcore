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

namespace Pimcore\Model\Document\Link;

use Pimcore\Model;

/**
 * @internal
 *
 * @property \Pimcore\Model\Document\Link $model
 */
class Dao extends Model\Document\Dao
{
    /**
     * Get the data for the object by the given id, or by the id which is set in the object
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function getById($id = null)
    {
        try {
            if ($id != null) {
                $this->model->setId($id);
            }

            $data = $this->db->fetchRow("SELECT documents.*, documents_link.*, tree_locks.locked FROM documents
                LEFT JOIN documents_link ON documents.id = documents_link.id
                    LEFT JOIN tree_locks ON documents.id = tree_locks.id AND tree_locks.type = 'document'
                    WHERE documents.id = ?", $this->model->getId());

            if (!empty($data['id'])) {
                $this->assignVariablesToModel($data);
                $this->model->getHref();
            } else {
                throw new \Exception('Link with the ID ' . $this->model->getId() . " doesn't exists");
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function create()
    {
        parent::create();

        $this->db->insert('documents_link', [
            'id' => $this->model->getId(),
        ]);
    }

    /**
     * @throws \Exception
     */
    public function delete()
    {
        $this->db->delete('documents_link', ['id' => $this->model->getId()]);
        parent::delete();
    }
}
