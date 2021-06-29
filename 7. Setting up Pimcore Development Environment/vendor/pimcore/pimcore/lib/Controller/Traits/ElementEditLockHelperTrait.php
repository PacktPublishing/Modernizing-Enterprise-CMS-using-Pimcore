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

namespace Pimcore\Controller\Traits;

use Pimcore\Model\Element\Editlock;
use Pimcore\Model\User;

/**
 * @internal
 */
trait ElementEditLockHelperTrait
{
    protected function getEditLockResponse(string $id, string $type)
    {
        $editLock = Editlock::getByElement($id, $type);
        $user = User::getById($editLock->getUserId());

        $editLock = $editLock->getObjectVars();
        unset($editLock['sessionId']);

        if ($user) {
            $editLock['user'] = [
                'name' => $user->getName(),
            ];
        }

        return $this->adminJson([
            'editlock' => $editLock,
        ]);
    }
}
