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
 * @package    Webservice
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\Webservice\Data;

use Pimcore\Model;

/**
 * @deprecated
 */
class DataObject extends Model\Webservice\Data
{
    /**
     * If set to true then null values will not be exported.
     *
     * @var bool
     */
    protected static $dropNullValues;

    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $parentId;

    /**
     * @var string
     */
    public $key;

    /**
     * @var bool
     */
    public $published;

    /**
     * @var string
     */
    public $type;

    /**
     * @var int
     */
    public $userOwner;

    /**
     * @var Property[]
     */
    public $properties;

    /**
     * @var Model\Element\Note[]
     */
    public $notes;

    /**
     * @var int
     */
    public $index;

    /**
     * @var array
     */
    public $childs;

    /**
     * @param Model\DataObject\AbstractObject $object
     * @param array|null $options
     */
    public function map($object, $options = null)
    {
        parent::map($object);

        $keys = get_object_vars($this);
        if (array_key_exists('childs', $keys)) {
            if ($object->hasChildren()) {
                $this->childs = [];
                foreach ($object->getChildren() as $child) {
                    $item = new Model\Webservice\Data\DataObject\Listing\Item();
                    $item->id = $child->getId();
                    $item->type = $child->getType();
                    $this->childs[] = $item;
                }
            }
        }
    }

    /**
     * @param bool $dropNullValues
     */
    public static function setDropNullValues($dropNullValues)
    {
        self::$dropNullValues = $dropNullValues;
    }

    /**
     * @return bool
     */
    public static function getDropNullValues()
    {
        return self::$dropNullValues;
    }
}
