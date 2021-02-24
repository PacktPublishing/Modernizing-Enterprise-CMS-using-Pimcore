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
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Bundle\CoreBundle\Command\Definition\Import;

use Pimcore\Model\AbstractModel;
use Pimcore\Model\DataObject\ClassDefinition\Service;
use Pimcore\Model\DataObject\Objectbrick\Definition;

class ObjectBrickCommand extends AbstractStructureImportCommand
{
    /**
     * Get type
     *
     * @return string
     */
    protected function getType()
    {
        return 'ObjectBrick';
    }

    /**
     * Get definition name from filename (e.g. class_Customer_export.json -> Customer)
     *
     * @param string $filename
     *
     * @return string|null
     */
    protected function getDefinitionName($filename)
    {
        $parts = [];
        if (1 === preg_match('/^objectbrick_(.*)_export\.json$/', $filename, $parts)) {
            return $parts[1];
        }

        return null;
    }

    /**
     * Try to load definition by name
     *
     * @param string $name
     *
     * @return AbstractModel|null
     */
    protected function loadDefinition($name)
    {
        return Definition::getByKey($name);
    }

    /**
     * Create a new definition
     *
     * @param string $name
     *
     * @return AbstractModel
     */
    protected function createDefinition($name)
    {
        $definition = new Definition();
        $definition->setKey($name);

        return $definition;
    }

    /**
     * Process import
     *
     * @param AbstractModel $definition
     * @param string $json
     *
     * @return bool
     */
    protected function import(AbstractModel $definition, $json)
    {
        return Service::importObjectBrickFromJson($definition, $json);
    }
}
