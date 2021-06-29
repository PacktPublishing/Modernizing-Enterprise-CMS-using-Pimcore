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

namespace Pimcore\Model\Asset\MetaData\ClassDefinition\Data;

use Pimcore\Model\Element\ElementInterface;
use Pimcore\Model\Element\Service;

class Asset extends Data
{
    /**
     * @param mixed $value
     * @param array $params
     *
     * @return null|int
     */
    public function marshal($value, $params = [])
    {
        $element = Service::getElementByPath('asset', $value);
        if ($element) {
            return $element->getId();
        } else {
            return null;
        }
    }

    /**
     * @param mixed $value
     * @param array $params
     *
     * @return string
     */
    public function unmarshal($value, $params = [])
    {
        $element = null;
        if (is_numeric($value)) {
            $element = Service::getElementById('asset', $value);
        }
        if ($element) {
            $value = $element->getRealFullPath();
        } else {
            $value = '';
        }

        return $value;
    }

    /**
     * @param mixed $data
     * @param array $params
     *
     * @return mixed
     */
    public function transformGetterData($data, $params = [])
    {
        if (is_numeric($data)) {
            return \Pimcore\Model\Asset\Service::getElementById('asset', $data);
        }

        return $data;
    }

    /**
     * @param mixed $data
     * @param array $params
     *
     * @return mixed
     */
    public function transformSetterData($data, $params = [])
    {
        if ($data instanceof \Pimcore\Model\Asset) {
            return $data->getId();
        }

        return $data;
    }

    /**
     * @param mixed $data
     * @param array $params
     *
     * @return mixed
     */
    public function getDataFromEditMode($data, $params = [])
    {
        $element = Service::getElementByPath('asset', $data);
        if ($element) {
            return $element->getId();
        }

        return '';
    }

    /**
     * @param mixed $data
     * @param array $params
     *
     * @return mixed
     */
    public function getDataForResource($data, $params = [])
    {
        if ($data instanceof ElementInterface) {
            return $data->getId();
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getDataForEditMode($data, $params = [])
    {
        if (is_numeric($data)) {
            $data = Service::getElementById('asset', $data);
        }
        if ($data instanceof ElementInterface) {
            return $data->getRealFullPath();
        } else {
            return '';
        }
    }

    /**
     * @param mixed $data
     * @param array $params
     *
     * @return mixed
     */
    public function getDataForListfolderGrid($data, $params = [])
    {
        if (is_numeric($data)) {
            $data = \Pimcore\Model\Asset::getById($data);
        }

        if ($data instanceof \Pimcore\Model\Asset) {
            return $data->getRealFullPath();
        }

        return $data;
    }

    /**
     * @param mixed $data
     * @param array $params
     *
     * @return array
     */
    public function resolveDependencies($data, $params = [])
    {
        if ($data instanceof \Pimcore\Model\Asset && isset($params['type'])) {
            $elementId = $data->getId();
            $elementType = $params['type'];

            $key = $elementType . '_' . $elementId;

            return [
                $key => [
                    'id' => $elementId,
                    'type' => $elementType,
                ], ];
        }

        return [];
    }

    /**
     * @param mixed $data
     * @param array $params
     *
     * @return mixed
     */
    public function getDataFromListfolderGrid($data, $params = [])
    {
        $data = \Pimcore\Model\Asset::getByPath($data);
        if ($data instanceof ElementInterface) {
            return $data->getId();
        }

        return null;
    }
}
