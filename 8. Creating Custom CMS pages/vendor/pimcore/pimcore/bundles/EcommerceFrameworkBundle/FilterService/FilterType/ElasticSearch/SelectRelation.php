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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\FilterService\FilterType\ElasticSearch;

use Pimcore\Bundle\EcommerceFrameworkBundle\FilterService\FilterType\AbstractFilterType;
use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\ProductList\ProductListInterface;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\AbstractFilterDefinitionType;
use Pimcore\Model\DataObject\Folder;

class SelectRelation extends \Pimcore\Bundle\EcommerceFrameworkBundle\FilterService\FilterType\SelectRelation
{
    public function prepareGroupByValues(AbstractFilterDefinitionType $filterDefinition, ProductListInterface $productList)
    {
        $productList->prepareGroupByValues($this->getField($filterDefinition), true);
    }

    protected function loadAllAvailableRelations($availableRelations, $availableRelationsArray = [])
    {
        foreach ($availableRelations as $rel) {
            if ($rel instanceof Folder) {
                $availableRelationsArray = $this->loadAllAvailableRelations($rel->getChildren(), $availableRelationsArray);
            } else {
                $availableRelationsArray[$rel->getId()] = true;
            }
        }

        return $availableRelationsArray;
    }

    public function addCondition(AbstractFilterDefinitionType $filterDefinition, ProductListInterface $productList, $currentFilter, $params, $isPrecondition = false)
    {
        $field = $this->getField($filterDefinition);
        $preSelect = $this->getPreSelect($filterDefinition);

        $value = $params[$field] ?? null;
        $isReload = $params['is_reload'] ?? null;

        if (empty($value) && !$isReload) {
            $o = $preSelect;
            if (!empty($o)) {
                if (is_object($o)) {
                    $value = $o->getId();
                } else {
                    $value = $o;
                }
            }
        } elseif ($value == AbstractFilterType::EMPTY_STRING) {
            $value = null;
        }

        $currentFilter[$field] = $value;

        if (!empty($value)) {
            $productList->addRelationCondition($field, $value);
        }

        return $currentFilter;
    }
}
