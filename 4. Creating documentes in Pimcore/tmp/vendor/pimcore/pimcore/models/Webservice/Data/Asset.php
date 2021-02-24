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
use Pimcore\Model\Webservice;

/**
 * @deprecated
 */
class Asset extends Model\Webservice\Data
{
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
    public $type;

    /**
     * @var string
     */
    public $filename;

    /**
     * @var string
     */
    public $path;

    /**
     * @var string
     */
    public $mimetype;

    /**
     * @var int
     */
    public $creationDate;

    /**
     * @var int
     */
    public $modificationDate;

    /**
     * @var int
     */
    public $userOwner;

    /**
     * @var int
     */
    public $userModification;

    /**
     * @var Webservice\Data\Property[]
     */
    public $properties;

    /**
     * @var object[]
     */
    public $customSettings;

    /**
     * @var array
     */
    public $metadata;

    /**
     * @var Model\Element\Note[]
     */
    public $notes;

    /**
     * @var array
     */
    public $childs;

    /**
     * @param Model\Asset $object
     * @param array|null $options
     */
    public function map($object, $options = null)
    {
        parent::map($object, $options);

        $settings = $object->getCustomSettings();
        if (!empty($settings)) {
            $this->customSettings = $settings;
        }

        $keys = get_object_vars($this);
        if (array_key_exists('childs', $keys)) {
            if ($object->hasChildren()) {
                $this->childs = [];
                foreach ($object->getChildren() as $child) {
                    $item = new Webservice\Data\Asset\Listing\Item();
                    $item->id = $child->getId();
                    $item->type = $child->getType();

                    $this->childs[] = $item;
                }
            }
        }

        $this->metadata = $object->getMetadata();
    }

    /**
     * @param Model\Asset $object
     * @param bool $disableMappingExceptions
     * @param Webservice\IdMapperInterface|null $idMapper
     *
     * @throws \Exception
     */
    public function reverseMap($object, $disableMappingExceptions = false, $idMapper = null)
    {
        parent::reverseMap($object, $disableMappingExceptions, $idMapper);

        $metadata = $this->metadata;
        if (is_array($metadata)) {
            $metadata = json_decode(json_encode($metadata), true);

            $object->setMetadata($metadata);
        }
    }
}
