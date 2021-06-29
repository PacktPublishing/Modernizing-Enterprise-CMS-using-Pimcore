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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\FilterService\FilterType\Findologic;

use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\ProductList\ProductListInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\AbstractFilterDefinitionType;
use Pimcore\Model\DataObject\Fieldcollection\Data\FilterNumberRange;

class NumberRange extends \Pimcore\Bundle\EcommerceFrameworkBundle\FilterService\FilterType\NumberRange
{
    public function prepareGroupByValues(AbstractFilterDefinitionType $filterDefinition, ProductListInterface $productList)
    {
        //$productList->prepareGroupByValues($this->getField($filterDefinition), true);
    }

    /**
     * @param FilterNumberRange $filterDefinition
     * @param ProductListInterface $productList
     * @param array $currentFilter
     *
     * @return array
     *
     * @throws \Exception
     */
    public function getFilterValues(AbstractFilterDefinitionType $filterDefinition, ProductListInterface $productList, array $currentFilter): array
    {
        $currentField = $this->getField($filterDefinition);
        $values = [];
        foreach ($productList->getGroupByValues($currentField, true) as $value) {
            if ($currentField == 'price') {
                // add min
                $values[] = [
                    'from' => $value['parameter']->min,
                    'to' => $value['parameter']->max,
                    'value' => $value['parameter']->min,
                    'count' => 1,
                ];
                // add max
                $values[] = [
                    'from' => $value['parameter']->min,
                    'to' => $value['parameter']->max,
                    'value' => $value['parameter']->max,
                    'count' => 1,
                ];
            } else {
                $values[] = [
                    'value' => $value['value'],
                    'count' => $value['count'],
                ];
            }
        }

        return [
            'hideFilter' => $filterDefinition->getRequiredFilterField() && empty($currentFilter[$filterDefinition->getRequiredFilterField()]),
            'label' => $filterDefinition->getLabel(),
            'currentValue' => $currentFilter[$this->getField($filterDefinition)],
            'values' => $values,
            'definition' => $filterDefinition,
            'fieldname' => $this->getField($filterDefinition),
            'resultCount' => $productList->count(),
        ];
    }

    /**
     * @param FilterNumberRange $filterDefinition
     * @param ProductListInterface $productList
     * @param array $currentFilter
     * @param array $params
     * @param bool $isPrecondition
     *
     * @return array
     */
    public function addCondition(AbstractFilterDefinitionType $filterDefinition, ProductListInterface $productList, $currentFilter, $params, $isPrecondition = false)
    {
        $field = $this->getField($filterDefinition);
        $value = $params[$field] ?? null;

        if (empty($value)) {
            $value['from'] = $filterDefinition->getPreSelectFrom();
            $value['to'] = $filterDefinition->getPreSelectTo();
        }

        $value['rangeFrom'] = $filterDefinition->getRangeFrom();
        $value['rangeTo'] = $filterDefinition->getRangeTo();

        $currentFilter[$field] = $value;

        if ($value['from'] || $value['to']) {
            $v = [];
            if ($value['from']) {
                $v['min'] = $value['from'];
            } else {
                $v['min'] = 0;
            }

            if ($value['to']) {
                $v['max'] = $value['to'];
            } else {
                $v['max'] = 9999999999999999;       // findologic won't accept only one of max or min, always needs both
            }
            $productList->addCondition($v, $field);
        }

        return $currentFilter;
    }
}
