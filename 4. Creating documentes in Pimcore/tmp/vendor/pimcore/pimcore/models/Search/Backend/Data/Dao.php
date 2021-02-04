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

namespace Pimcore\Model\Search\Backend\Data;

use Pimcore\Logger;
use Pimcore\Model;

/**
 * @property \Pimcore\Model\Search\Backend\Data $model
 */
class Dao extends \Pimcore\Model\Dao\AbstractDao
{
    /**
     * @param Model\Element\ElementInterface $element
     */
    public function getForElement($element)
    {
        try {
            if ($element instanceof Model\Document) {
                $maintype = 'document';
            } elseif ($element instanceof Model\Asset) {
                $maintype = 'asset';
            } elseif ($element instanceof Model\DataObject\AbstractObject) {
                $maintype = 'object';
            } else {
                throw new \Exception('unknown type of element with id [ '.$element->getId().' ] ');
            }

            $data = $this->db->fetchRow('SELECT * FROM search_backend_data WHERE id= ? AND maintype = ? ', [$element->getId(), $maintype]);
            if (is_array($data)) {
                $this->assignVariablesToModel($data);
                $this->model->setId(new Model\Search\Backend\Data\Id($element));
            }
        } catch (\Exception $e) {
        }
    }

    public function save()
    {
        try {
            $data = [
                'id' => $this->model->getId()->getId(),
                'fullpath' => $this->model->getFullPath(),
                'maintype' => $this->model->getId()->getType(),
                'type' => $this->model->getType(),
                'subtype' => $this->model->getSubtype(),
                'published' => $this->model->isPublished(),
                'creationDate' => $this->model->getCreationDate(),
                'modificationDate' => $this->model->getmodificationDate(),
                'userOwner' => $this->model->getUserOwner(),
                'userModification' => $this->model->getUserModification(),
                'data' => $this->model->getData(),
                'properties' => $this->model->getProperties(),
            ];

            $this->db->insertOrUpdate('search_backend_data', $data);
        } catch (\Exception $e) {
            Logger::error($e);
        }
    }

    /**
     * Deletes from database
     */
    public function delete()
    {
        if ($this->model->getId() instanceof Model\Search\Backend\Data\Id) {
            $this->db->delete('search_backend_data', [
                'id' => $this->model->getId()->getId(),
                'maintype' => $this->model->getId()->getType(),
            ]);
        } else {
            Logger::alert('Cannot delete Search\\Backend\\Data, ID is empty');
        }
    }

    public function getMinWordLengthForFulltextIndex()
    {
        try {
            return $this->db->fetchOne('SELECT @@innodb_ft_min_token_size');
        } catch (\Exception $e) {
            return 3;
        }
    }

    public function getMaxWordLengthForFulltextIndex()
    {
        try {
            return $this->db->fetchOne('SELECT @@innodb_ft_max_token_size');
        } catch (\Exception $e) {
            return 84;
        }
    }
}
