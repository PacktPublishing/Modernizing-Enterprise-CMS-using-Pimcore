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

namespace Pimcore\Bundle\EcommerceFrameworkBundle\CoreExtensions\ClassDefinition;

use Pimcore\Model\DataObject\ClassDefinition\Data\Textarea;

class IndexFieldSelectionField extends Textarea
{
    /**
     * Static type of this element
     *
     * @var string
     */
    public $fieldtype = 'indexFieldSelectionField';

    public $specificPriceField = false;

    public $showAllFields = false;

    public $considerTenants = false;

    public function setSpecificPriceField($specificPriceField)
    {
        $this->specificPriceField = $specificPriceField;
    }

    public function getSpecificPriceField()
    {
        return $this->specificPriceField;
    }

    public function setShowAllFields($showAllFields)
    {
        $this->showAllFields = $showAllFields;
    }

    public function getShowAllFields()
    {
        return $this->showAllFields;
    }

    public function setConsiderTenants($considerTenants)
    {
        $this->considerTenants = $considerTenants;
    }

    public function getConsiderTenants()
    {
        return $this->considerTenants;
    }

    /**
     * @param array|string|null $data
     *
     * @return bool
     */
    public function isEmpty($data)
    {
        if (is_string($data)) {
            return strlen($data) < 1;
        }
        if (is_array($data)) {
            return empty($data);
        }

        return true;
    }

    /**
     * @param array|string $data
     * @param null|\Pimcore\Model\DataObject\AbstractObject $object
     * @param mixed $params
     *
     * @return string
     */
    public function getDataFromEditmode($data, $object = null, $params = [])
    {
        if (is_array($data)) {
            $data = implode(',', $data);
        }

        return $data;
    }
}
