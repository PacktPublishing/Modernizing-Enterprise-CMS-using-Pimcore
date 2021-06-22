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

namespace Pimcore\Model\Tool\Email\Blacklist;

use Pimcore\Model;

/**
 * @internal
 *
 * @property \Pimcore\Model\Tool\Email\Blacklist $model
 */
class Dao extends Model\Dao\AbstractDao
{
    /**
     * @param string $address
     *
     * @throws \Exception
     */
    public function getByAddress($address)
    {
        $data = $this->db->fetchRow('SELECT * FROM email_blacklist WHERE address = ?', $address);

        if (empty($data['address'])) {
            throw new \Exception('blacklist item with address ' . $address . ' not found');
        }
        $this->assignVariablesToModel($data);
    }

    /**
     * Save object to database
     *
     * @todo: $data could be undefined
     */
    public function save()
    {
        $this->model->setModificationDate(time());
        if (!$this->model->getCreationDate()) {
            $this->model->setCreationDate(time());
        }

        $version = $this->model->getObjectVars();

        // save main table
        $data = [];
        foreach ($version as $key => $value) {
            if (in_array($key, $this->getValidTableColumns('email_blacklist'))) {
                if (is_bool($value)) {
                    $value = (int) $value;
                }

                $data[$key] = $value;
            }
        }

        $this->db->insertOrUpdate('email_blacklist', $data);
    }

    /**
     * Deletes object from database
     */
    public function delete()
    {
        $this->db->delete('email_blacklist', ['address' => $this->model->getAddress()]);
    }
}
