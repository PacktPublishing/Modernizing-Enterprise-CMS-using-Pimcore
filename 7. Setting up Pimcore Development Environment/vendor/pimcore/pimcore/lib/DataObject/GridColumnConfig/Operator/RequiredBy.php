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

namespace Pimcore\DataObject\GridColumnConfig\Operator;

use Pimcore\Db;
use Pimcore\Model\Element\Service;

/**
 * @internal
 */
final class RequiredBy extends AbstractOperator
{
    /**
     * @var string|null
     */
    private $elementType;

    /**
     * @var bool
     */
    private $onlyCount;

    /**
     * {@inheritdoc}
     */
    public function __construct(\stdClass $config, $context = null)
    {
        parent::__construct($config, $context);

        $this->elementType = $config->elementType ?? null;
        $this->onlyCount = $config->onlyCount ?? false;
    }

    /**
     * {@inheritdoc}
     */
    public function getLabeledValue($element)
    {
        $result = new \stdClass();
        $result->label = $this->label;
        $result->isArrayType = true;

        $db = Db::get();
        $typeCondition = '';
        switch ($this->getElementType()) {
            case 'document': $typeCondition = " AND sourcetype = 'document'";

                break;
            case 'asset': $typeCondition = " AND sourcetype = 'asset'";

                break;
            case 'object': $typeCondition = " AND sourcetype = 'object'";

                break;
        }

        if ($this->getOnlyCount()) {
            $query = 'select count(*) from dependencies where targetid = ' . $element->getId() . $typeCondition;
            $count = $db->fetchOne($query);
            $result->value = $count;
        } else {
            $resultList = [];
            $query = 'select * from dependencies where targetid = ' . $element->getId() . $typeCondition;
            $dependencies = $db->fetchAll($query);
            foreach ($dependencies as $dependency) {
                $sourceType = $dependency['sourcetype'];
                $sourceId = $dependency['sourceid'];
                $element = Service::getElementById($sourceType, $sourceId);
                $resultList[] = $element;
            }
            $result->value = $resultList;
        }

        return $result;
    }

    /**
     * @return string|null
     */
    public function getElementType()
    {
        return $this->elementType;
    }

    /**
     * @param string|null $elementType
     */
    public function setElementType($elementType)
    {
        $this->elementType = $elementType;
    }

    /**
     * @return bool
     */
    public function getOnlyCount()
    {
        return $this->onlyCount;
    }

    /**
     * @param bool $onlyCount
     */
    public function setOnlyCount($onlyCount)
    {
        $this->onlyCount = $onlyCount;
    }
}
