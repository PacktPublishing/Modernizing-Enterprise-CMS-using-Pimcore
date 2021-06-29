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

namespace Pimcore\Model\Document\Printcontainer;

use Pimcore\Model\Document;

/**
 * @internal
 *
 * @property \Pimcore\Model\Document\Printcontainer $model
 */
class Dao extends Document\PrintAbstract\Dao
{
    /**
     * @return string
     */
    public function getLastedChildModificationDate()
    {
        $path = $this->model->getFullPath();

        return $this->db->fetchOne('SELECT modificationDate FROM documents WHERE path LIKE ? ORDER BY modificationDate DESC LIMIT 0,1', [$this->db->escapeLike($path) . '%']);
    }
}
