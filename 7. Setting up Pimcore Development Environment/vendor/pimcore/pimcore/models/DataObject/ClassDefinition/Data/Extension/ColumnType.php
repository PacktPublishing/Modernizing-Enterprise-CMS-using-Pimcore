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

namespace Pimcore\Model\DataObject\ClassDefinition\Data\Extension;

trait ColumnType
{
    /**
     * {@inheritdoc}
     */
    public function getColumnType()
    {
        if (property_exists($this, 'columnType')) {
            return $this->columnType;
        }

        return null;
    }

    /**
     * @param string | array $columnType
     *
     * @return $this
     */
    public function setColumnType($columnType)
    {
        if (property_exists($this, 'columnType')) {
            $this->columnType = $columnType;
        }

        return $this;
    }
}
