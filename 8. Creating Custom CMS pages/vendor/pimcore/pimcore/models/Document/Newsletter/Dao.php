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
 * @package    Document
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\Document\Newsletter;

use Pimcore\Model;

/**
 * @internal
 *
 * @property \Pimcore\Model\Document\Newsletter $model
 */
class Dao extends Model\Document\PageSnippet\Dao
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
        if ($id != null) {
            $this->model->setId($id);
        }

        $data = $this->db->fetchRow("SELECT documents.*, documents_newsletter.*, tree_locks.locked FROM documents
            LEFT JOIN documents_newsletter ON documents.id = documents_newsletter.id
            LEFT JOIN tree_locks ON documents.id = tree_locks.id AND tree_locks.type = 'document'
                WHERE documents.id = ?", $this->model->getId());

        if (!empty($data['id'])) {
            $this->assignVariablesToModel($data);
        } else {
            throw new \Exception('Newsletter Document with the ID ' . $this->model->getId() . " doesn't exists");
        }
    }

    public function create()
    {
        parent::create();

        $this->db->insert('documents_newsletter', [
            'id' => $this->model->getId(),
        ]);
    }

    /**
     * Deletes the object (and data) from database
     *
     * @throws \Exception
     */
    public function delete()
    {
        $this->deleteAllProperties();

        $this->db->delete('documents_newsletter', ['id' => $this->model->getId()]);
        $this->db->delete('email_log', ['documentId' => $this->model->getId()]);

        parent::delete();
    }
}
