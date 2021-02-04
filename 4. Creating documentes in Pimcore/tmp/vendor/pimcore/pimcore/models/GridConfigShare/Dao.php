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
 * @package    Version
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\GridConfigShare;

use Pimcore\Model;

/**
 * @property \Pimcore\Model\GridConfigShare $model
 */
class Dao extends Model\Dao\AbstractDao
{
    /**
     * @param int $gridConfigId
     * @param int $sharedWithUserId
     *
     * @throws \Exception
     */
    public function getByGridConfigAndSharedWithId($gridConfigId, $sharedWithUserId)
    {
        $data = $this->db->fetchRow('SELECT * FROM gridconfig_shares WHERE gridConfigId = ? AND sharedWithUserId = ?', [$gridConfigId, $sharedWithUserId]);

        if (!$data) {
            throw new \Exception('gridconfig share with gridConfigId ' . $gridConfigId . ' and shared with ' . $sharedWithUserId . ' not found');
        }

        $this->assignVariablesToModel($data);
    }

    public function save()
    {
        $gridConfigFavourite = $this->model->getObjectVars();
        $data = [];

        foreach ($gridConfigFavourite as $key => $value) {
            if (in_array($key, $this->getValidTableColumns('gridconfig_shares'))) {
                if (is_bool($value)) {
                    $value = (int) $value;
                }

                $data[$key] = $value;
            }
        }

        $this->db->insertOrUpdate('gridconfig_shares', $data);
    }

    /**
     * Deletes object from database
     */
    public function delete()
    {
        $this->db->delete('gridconfig_shares', ['gridConfigId' => $this->model->getGridConfigId(), 'sharedWithUserId' => $this->model->getSharedWithUserId()]);
    }
}
