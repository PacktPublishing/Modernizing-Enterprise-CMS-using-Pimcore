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

namespace Pimcore\Event\Model;

use Pimcore\Model\User\AbstractUser;
use Symfony\Contracts\EventDispatcher\Event;

class UserRoleEvent extends Event
{
    /**
     * @var AbstractUser
     */
    protected $userRole;

    /**
     * DocumentEvent constructor.
     *
     * @param AbstractUser $userRole
     */
    public function __construct(AbstractUser $userRole)
    {
        $this->userRole = $userRole;
    }

    /**
     * @return AbstractUser
     */
    public function getUserRole()
    {
        return $this->userRole;
    }

    /**
     * @param AbstractUser $userRole
     */
    public function setUserRole($userRole)
    {
        $this->userRole = $userRole;
    }
}
