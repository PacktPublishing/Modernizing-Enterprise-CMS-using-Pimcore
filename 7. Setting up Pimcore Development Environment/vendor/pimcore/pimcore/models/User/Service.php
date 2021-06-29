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

namespace Pimcore\Model\User;

/**
 * @internal
 */
class Service
{
    /**
     * Mapping between database types and pimcore class names
     *
     * @static
     *
     * @param string $type
     *
     * @return string|null
     */
    public static function getClassNameForType($type)
    {
        switch ($type) {
            case 'user': return '\\Pimcore\\Model\\User';
            case 'userfolder': return '\\Pimcore\\Model\\User\\Folder';
            case 'role': return '\\Pimcore\\Model\\User\\Role';
            case 'rolefolder': return '\\Pimcore\\Model\\User\\Role\\Folder';
            default:
                return null;
        }
    }
}
