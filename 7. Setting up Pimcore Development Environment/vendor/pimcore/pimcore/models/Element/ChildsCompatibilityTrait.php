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

namespace Pimcore\Model\Element;

/**
 * @internal
 */
trait ChildsCompatibilityTrait
{
    /**
     * @deprecated
     *
     * @return mixed
     */
    public function getChilds()
    {
        $return = call_user_func_array([$this, 'getChildren'], func_get_args());

        return $return;
    }

    /**
     * @deprecated
     *
     * @return mixed
     */
    public function setChilds()
    {
        $return = call_user_func_array([$this, 'setChildren'], func_get_args());

        return $return;
    }

    /**
     * @deprecated
     *
     * @return mixed
     */
    public function hasChilds()
    {
        $return = call_user_func_array([$this, 'hasChildren'], func_get_args());

        return $return;
    }
}
