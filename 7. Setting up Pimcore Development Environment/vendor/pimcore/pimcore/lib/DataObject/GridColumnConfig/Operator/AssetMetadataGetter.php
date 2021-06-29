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

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\Data\Hotspotimage;

/**
 * @internal
 */
final class AssetMetadataGetter extends AbstractOperator
{
    /**
     * @var string
     */
    private $metaField;

    /**
     * @var string|null
     */
    private $locale;

    /**
     * {@inheritdoc}
     */
    public function __construct(\stdClass $config, $context = null)
    {
        parent::__construct($config, $context);

        $this->metaField = $config->metaField ?? '';
        $this->locale = $config->locale ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getLabeledValue($element)
    {
        $result = new \stdClass();
        $result->label = $this->label;
        $result->value = null;

        $childs = $this->getChilds();

        if ($childs) {
            $newChildsResult = [];

            foreach ($childs as $c) {
                $childResult = $c->getLabeledValue($element);
                $childValues = $childResult->value ?? null;
                if ($childValues && !is_array($childValues)) {
                    $childValues = [$childValues];
                }

                $newValue = null;

                if (is_array($childValues)) {
                    foreach ($childValues as $value) {
                        if (is_array($value)) {
                            $newSubValues = [];
                            foreach ($value as $subValue) {
                                $subValue = $this->getMetadata($subValue);
                                $newSubValues[] = $subValue;
                            }
                            $newValue = $newSubValues;
                        } else {
                            $newValue = $this->getMetadata($value);
                        }
                    }
                }

                $newChildsResult[] = $newValue;
            }

            if (count($childs) > 1) {
                $result->value = $newChildsResult;
            } else {
                $result->value = $newChildsResult[0];
            }
        }

        return $result;
    }

    /**
     * @param Hotspotimage|Asset $value
     *
     * @return mixed
     */
    public function getMetadata($value)
    {
        $asset = $value;
        if ($value instanceof Hotspotimage) {
            $asset = $value->getImage();
        }

        if ($asset instanceof Asset) {
            $metaValue = $asset->getMetadata($this->getMetaField(), $this->getLocale());

            return $metaValue;
        }
    }

    /**
     * @return mixed
     */
    public function getMetaField()
    {
        return $this->metaField;
    }

    /**
     * @param mixed $metaField
     */
    public function setMetaField($metaField)
    {
        $this->metaField = $metaField;
    }

    /**
     * @param mixed $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }
}
