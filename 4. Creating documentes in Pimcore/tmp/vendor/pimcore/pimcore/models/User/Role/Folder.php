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
 * @package    User
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\User\Role;

use Pimcore\Model;

/**
 * @method \Pimcore\Model\User\Role\Folder\Dao getDao()
 */
class Folder extends Model\User\UserRole\Folder
{
    /**
     * @var string
     */
    public $type = 'rolefolder';
}
