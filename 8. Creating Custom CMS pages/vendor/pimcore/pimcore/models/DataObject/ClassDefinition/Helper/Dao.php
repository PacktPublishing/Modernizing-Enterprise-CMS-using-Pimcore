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

namespace Pimcore\Model\DataObject\ClassDefinition\Helper;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Pimcore\Model\DataObject;

trait Dao
{
    /**
     * @param DataObject\ClassDefinition\Data $field
     * @param string $table
     * @param string $columnTypeGetter
     */
    protected function addIndexToField($field, $table, $columnTypeGetter = 'getColumnType', $considerUniqueIndex = false, $isLocalized = false, $isFieldcollection = false)
    {
        $columnType = $field->$columnTypeGetter();

        $prefixes = [
            'p_index_' => ['enabled' => $field->getIndex(), 'unique' => false],
            'u_index_' => ['enabled' => $considerUniqueIndex && $field->getUnique(), 'unique' => true],

        ];

        foreach ($prefixes as $prefix => $config) {
            $enabled = $config['enabled'];
            $unique = $config['unique'];
            $uniqueStr = $unique ? ' UNIQUE ' : '';

            if ($enabled) {
                if (is_array($columnType)) {
                    // multicolumn field
                    foreach ($columnType as $fkey => $fvalue) {
                        $indexName = $field->getName().'__'.$fkey;
                        $columnName = '`' . $indexName . '`';
                        if ($unique) {
                            if ($isLocalized) {
                                $columnName .= ',`language`';
                            } elseif ($isFieldcollection) {
                                $columnName .= ',`fieldname`';
                            }
                        }
                        $this->db->queryIgnoreError(
                            'ALTER TABLE `'.$table.'` ADD ' . $uniqueStr . 'INDEX `' . $prefix . $indexName.'` ('.$columnName.');',
                            [UniqueConstraintViolationException::class]
                        );
                    }
                } else {
                    // single -column field
                    $indexName = $field->getName();
                    $columnName = '`' . $indexName . '`';
                    if ($unique) {
                        if ($isLocalized) {
                            $columnName .= ',`language`';
                        } elseif ($isFieldcollection) {
                            $columnName .= ',`fieldname`';
                        }
                    }
                    $this->db->queryIgnoreError(
                        'ALTER TABLE `'.$table.'` ADD ' . $uniqueStr . 'INDEX `' . $prefix . $indexName.'` ('.$columnName.');',
                        [UniqueConstraintViolationException::class]
                    );
                }
            } else {
                if (is_array($columnType)) {
                    // multicolumn field
                    foreach ($columnType as $fkey => $fvalue) {
                        $columnName = $field->getName().'__'.$fkey;
                        $this->db->queryIgnoreError('ALTER TABLE `'.$table.'` DROP INDEX `'. $prefix . $columnName.'`;');
                    }
                } else {
                    // single -column field
                    $columnName = $field->getName();
                    $this->db->queryIgnoreError('ALTER TABLE `'.$table.'` DROP INDEX `'. $prefix . $columnName.'`;');
                }
            }
        }
    }

    /**
     * @param string $table
     * @param string $colName
     * @param string $type
     * @param string $default
     * @param string $null
     */
    protected function addModifyColumn($table, $colName, $type, $default, $null)
    {
        $existingColumns = $this->getValidTableColumns($table, false);

        $existingColName = null;

        // check for existing column case insensitive eg a rename from myInput to myinput
        $matchingExisting = preg_grep('/^' . preg_quote($colName, '/') . '$/i', $existingColumns);
        if (is_array($matchingExisting) && !empty($matchingExisting)) {
            $existingColName = current($matchingExisting);
        }
        if ($existingColName === null) {
            $this->db->query('ALTER TABLE `' . $table . '` ADD COLUMN `' . $colName . '` ' . $type . $default . ' ' . $null . ';');
            $this->resetValidTableColumnsCache($table);
        } else {
            if (!DataObject\ClassDefinition\Service::skipColumn($this->tableDefinitions, $table, $colName, $type, $default, $null)) {
                $this->db->query('ALTER TABLE `' . $table . '` CHANGE COLUMN `' . $existingColName . '` `' . $colName . '` ' . $type . $default . ' ' . $null . ';');
            }
        }
    }

    /**
     * @param string $table
     * @param array $columnsToRemove
     * @param array $protectedColumns
     */
    protected function removeUnusedColumns($table, $columnsToRemove, $protectedColumns)
    {
        if (is_array($columnsToRemove) && count($columnsToRemove) > 0) {
            foreach ($columnsToRemove as $value) {
                //if (!in_array($value, $protectedColumns)) {
                if (!in_array(strtolower($value), array_map('strtolower', $protectedColumns))) {
                    $this->db->query('ALTER TABLE `' . $table . '` DROP COLUMN `' . $value . '`;');
                }
            }
            $this->resetValidTableColumnsCache($table);
        }
    }

    /**
     * @param DataObject\ClassDefinition $classDefinition
     * @param array $tables
     */
    protected function handleEncryption(DataObject\ClassDefinition $classDefinition, array $tables)
    {
        if ($classDefinition->getEncryption()) {
            $this->encryptTables($tables);
            $classDefinition->addEncryptedTables($tables);
        } elseif ($classDefinition->hasEncryptedTables()) {
            $this->decryptTables($classDefinition, $tables);
            $classDefinition->removeEncryptedTables($tables);
        }
    }

    /**
     * @param array $tables
     */
    protected function encryptTables(array $tables)
    {
        foreach ($tables as $table) {
            $this->db->query('ALTER TABLE ' . $this->db->quoteIdentifier($table) . ' ENCRYPTED=YES;');
        }
    }

    /**
     * @param DataObject\ClassDefinition $classDefinition
     * @param array $tables
     */
    protected function decryptTables(DataObject\ClassDefinition $classDefinition, array $tables)
    {
        foreach ($tables as $table) {
            if ($classDefinition->isEncryptedTable($table)) {
                $this->db->query('ALTER TABLE ' . $this->db->quoteIdentifier($table) . ' ENCRYPTED=NO;');
            }
        }
    }
}
