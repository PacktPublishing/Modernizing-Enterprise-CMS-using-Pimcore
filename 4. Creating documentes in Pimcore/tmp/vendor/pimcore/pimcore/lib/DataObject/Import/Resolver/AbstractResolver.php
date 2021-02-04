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
 * @package    Object
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\DataObject\Import\Resolver;

abstract class AbstractResolver implements ResolverInterface
{
    protected function getIdColumn(\stdClass $config)
    {
        return $config->resolverSettings->column;
    }

    protected function setObjectType($config, $object, $rowData)
    {
        $objectType = $config->resolverSettings->objectType;

        if ($objectType == 'dynamic') {
            $typeColumn = $config->resolverSettings->columnObjectType;
            $objectType = $rowData[$typeColumn];
            $object->setType($objectType);
        } elseif ($objectType != 'keep') {
            $object->setType($objectType);
        }

        return $object;
    }
}
