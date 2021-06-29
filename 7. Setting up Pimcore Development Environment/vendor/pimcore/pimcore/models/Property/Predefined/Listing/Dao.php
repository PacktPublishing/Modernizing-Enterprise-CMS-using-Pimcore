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

namespace Pimcore\Model\Property\Predefined\Listing;

use Pimcore\Model;
use Pimcore\Model\Property;

/**
 * @internal
 *
 * @property \Pimcore\Model\Property\Predefined\Listing $model
 */
class Dao extends Model\Dao\PhpArrayTable
{
    public function configure()
    {
        parent::configure();
        $this->setFile('predefined-properties');
    }

    /**
     * Loads a list of predefined properties for the specicifies parameters, returns an array of Property\Predefined elements
     *
     * @return array
     */
    public function load()
    {
        $properties = [];
        $propertiesData = $this->db->fetchAll($this->model->getFilter(), $this->model->getOrder());

        foreach ($propertiesData as $propertyData) {
            $properties[] = Property\Predefined::getById($propertyData['id']);
        }

        $this->model->setProperties($properties);

        return $properties;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        $data = $this->db->fetchAll($this->model->getFilter(), $this->model->getOrder());
        $amount = count($data);

        return $amount;
    }
}
