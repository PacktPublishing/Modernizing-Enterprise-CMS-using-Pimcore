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
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\DataObject\ClassDefinition\Data\Extension;

/**
 * @internal
 */
trait PositionSortTrait
{
    /**
     * @param array|null $a
     * @param array|null $b
     *
     * @return int
     */
    protected function sort($a, $b): int
    {
        if (is_array($a) && is_array($b)) {
            return $a['position'] - $b['position'];
        } elseif (is_string($a) && is_string($b)) {
            return strcmp($a, $b);
        }

        return 0;
    }
}
