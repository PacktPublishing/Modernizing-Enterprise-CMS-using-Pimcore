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

namespace Pimcore\Model\DataObject\Listing\Concrete;

use Pimcore\Db\ZendCompatibility\Expression;
use Pimcore\Db\ZendCompatibility\QueryBuilder;
use Pimcore\Model;
use Pimcore\Model\DataObject;
use Pimcore\Tool;

/**
 * @property \Pimcore\Model\DataObject\Listing\Concrete $model
 */
class Dao extends Model\DataObject\Listing\Dao
{
    /**
     * @var bool
     */
    protected $firstException = true;

    /**
     * @var string
     */
    private $tableName = null;

    /**
     * @var int
     */
    protected $totalCount = 0;

    /**
     * @var \Closure
     */
    protected $onCreateQueryCallback;

    /**
     * get select query
     *
     * @param array|string|Expression|bool $columns
     *
     * @return QueryBuilder
     *
     * @throws \Exception
     */
    public function getQuery($columns = '*')
    {
        // init
        $select = $this->db->select();

        $select->from([$this->getTableName()], $columns);

        // add joins
        $this->addJoins($select);

        // add condition
        $this->addConditions($select);

        // group by
        $this->addGroupBy($select);

        // order
        $this->addOrder($select);

        // limit
        $this->addLimit($select);

        if ($this->onCreateQueryCallback) {
            $closure = $this->onCreateQueryCallback;
            $closure($select);
        }

        return $select;
    }

    /**
     * @return int[]
     *
     * @throws \Exception
     */
    public function loadIdList()
    {
        try {
            return parent::loadIdList();
        } catch (\Exception $e) {
            return $this->exceptionHandler($e);
        }
    }

    /**
     * @param \Exception $e
     *
     * @return int[]
     *
     * @throws \Exception
     */
    protected function exceptionHandler($e)
    {
        // create view if it doesn't exist already // HACK
        $pdoMySQL = preg_match('/Base table or view not found/', $e->getMessage());
        $Mysqli = preg_match("/Table (.*) doesn't exist/", $e->getMessage());

        if (($Mysqli || $pdoMySQL) && $this->firstException) {
            $this->firstException = false;

            $localizedFields = new DataObject\Localizedfield();
            $localizedFields->setClass(DataObject\ClassDefinition::getById($this->model->getClassId()));
            $localizedFields->createUpdateTable();

            return $this->loadIdList();
        }

        throw $e;
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    public function getLocalizedBrickLanguage()
    {
        $language = null;

        // check for a localized field and if they should be used for this list

        if ($this->model->getLocale()) {
            if (Tool::isValidLanguage((string)$this->model->getLocale())) {
                $language = (string)$this->model->getLocale();
            }
        }

        if (!$language) {
            $locale = \Pimcore::getContainer()->get('pimcore.locale')->findLocale();
            if (Tool::isValidLanguage((string)$locale)) {
                $language = (string)$locale;
            }
        }

        if (!$language) {
            $language = Tool::getDefaultLanguage();
        }

        return $language;
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    public function getTableName()
    {
        if (empty($this->tableName)) {

            // default
            $this->tableName = 'object_' . $this->model->getClassId();

            if (!$this->model->getIgnoreLocalizedFields()) {
                $language = null;
                // check for a localized field and if they should be used for this list
                if (property_exists('\\Pimcore\\Model\\DataObject\\' . ucfirst($this->model->getClassName()), 'localizedfields')) {
                    if ($this->model->getLocale()) {
                        if (Tool::isValidLanguage((string)$this->model->getLocale())) {
                            $language = (string)$this->model->getLocale();
                        }
                        if (!$language && DataObject\Localizedfield::isStrictMode()) {
                            throw new \Exception('could not resolve locale: ' . $this->model->getLocale());
                        }
                    }

                    if (!$language) {
                        $locale = \Pimcore::getContainer()->get('pimcore.locale')->findLocale();
                        if (Tool::isValidLanguage((string)$locale)) {
                            $language = (string)$locale;
                        }
                    }

                    if (!$language) {
                        $language = Tool::getDefaultLanguage();
                    }

                    if (!$language) {
                        throw new \Exception('No valid language/locale set. Use $list->setLocale() to add a language to the listing, or register a global locale');
                    }
                    $this->tableName = 'object_localized_' . $this->model->getClassId() . '_' . $language;
                }
            }
        }

        return $this->tableName;
    }

    /**
     * @param QueryBuilder $select
     *
     * @return $this
     */
    protected function addJoins(QueryBuilder $select)
    {
        // add fielcollection's
        $fieldCollections = $this->model->getFieldCollections();
        if (!empty($fieldCollections)) {
            foreach ($fieldCollections as $fc) {

                // join info
                $table = 'object_collection_' . $fc['type'] . '_' . $this->model->getClassId();
                $name = $fc['type'];
                if (!empty($fc['fieldname'])) {
                    $name .= '~' . $fc['fieldname'];
                }

                // set join condition
                $condition = <<<CONDITION
1
 AND {$this->db->quoteIdentifier($name)}.o_id = {$this->db->quoteIdentifier($this->getTableName())}.o_id
CONDITION;

                if (!empty($fc['fieldname'])) {
                    $condition .= <<<CONDITION
 AND {$this->db->quoteIdentifier($name)}.fieldname = "{$fc['fieldname']}"
CONDITION;
                }

                // add join
                $select->joinLeft(
                    [$name => $table],
                    $condition,
                    ''
                );
            }
        }

        // add brick's
        $objectbricks = $this->model->getObjectbricks();
        if (!empty($objectbricks)) {
            foreach ($objectbricks as $ob) {
                $brickDefinition = DataObject\Objectbrick\Definition::getByKey($ob);
                if (!$brickDefinition instanceof DataObject\Objectbrick\Definition) {
                    continue;
                }

                // join info
                $table = 'object_brick_query_' . $ob . '_' . $this->model->getClassId();
                $name = $ob;

                // add join
                $select->joinLeft(
                    [$name => $table],
                    <<<CONDITION
1
AND {$this->db->quoteIdentifier($name)}.o_id = {$this->db->quoteIdentifier($this->getTableName())}.o_id
CONDITION
                    ,
                    ''
                );

                if ($brickDefinition->getFieldDefinition('localizedfields')) {
                    $langugage = $this->getLocalizedBrickLanguage();
                    //TODO wrong pattern
                    $localizedTable = 'object_brick_localized_query_' . $ob . '_' . $this->model->getClassId() . '_' . $langugage;
                    $name = $ob . '_localized';

                    // add join
                    $select->joinLeft(
                        [$name => $localizedTable],
                        <<<CONDITION
1
AND {$this->db->quoteIdentifier($name)}.ooo_id = {$this->db->quoteIdentifier($this->getTableName())}.o_id
CONDITION
                        ,
                        ''
                    );
                }
            }
        }

        return $this;
    }

    /**
     * @param callable $callback
     */
    public function onCreateQuery(callable $callback)
    {
        $this->onCreateQueryCallback = $callback;
    }
}
