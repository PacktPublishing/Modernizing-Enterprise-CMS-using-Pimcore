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
 * @package    Tool
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\Tool;

use Pimcore\Model;

/**
 * @method \Pimcore\Model\Tool\UUID\Dao getDao()
 * @method void delete()
 * @method void save()
 */
class UUID extends Model\AbstractModel
{
    /**
     * @var int
     */
    public $itemId;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $uuid;

    /**
     * @var string
     */
    public $instanceIdentifier;

    /**
     * @var mixed
     */
    protected $item;

    /**
     * @param string $instanceIdentifier
     *
     * @return $this
     */
    public function setInstanceIdentifier($instanceIdentifier)
    {
        $this->instanceIdentifier = $instanceIdentifier;

        return $this;
    }

    /**
     * @return string
     */
    public function getInstanceIdentifier()
    {
        return $this->instanceIdentifier;
    }

    /**
     * @return $this
     *
     * @throws \Exception
     */
    public function setSystemInstanceIdentifier()
    {
        $instanceIdentifier = \Pimcore\Config::getSystemConfiguration('general')['instance_identifier'] ?? null;
        if (empty($instanceIdentifier)) {
            throw new \Exception('No instance identifier set in system config!');
        }
        $this->setInstanceIdentifier($instanceIdentifier);

        return $this;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setItemId($id)
    {
        $this->itemId = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     *
     * @throws \Exception
     */
    public function createUuid()
    {
        if (!$this->getInstanceIdentifier()) {
            throw new \Exception('No instance identifier specified.');
        }

        $this->uuid = \Ramsey\Uuid\Uuid::uuid5(\Ramsey\Uuid\Uuid::NAMESPACE_DNS, $this->getInstanceIdentifier() . '~' . $this->getType() . '~' . $this->getItemId())->toString();
        $this->getDao()->save();

        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @param mixed $item
     *
     * @return $this
     */
    public function setItem($item)
    {
        $this->setItemId($item->getId());

        if ($item instanceof Model\Element\ElementInterface) {
            $this->setType(Model\Element\Service::getElementType($item));
        } elseif ($item instanceof Model\DataObject\ClassDefinition) {
            $this->setType('class');
        }

        $this->item = $item;

        return $this;
    }

    /**
     * @param int $item
     *
     * @return UUID
     *
     * @throws \Exception
     */
    public static function getByItem($item)
    {
        $self = new self;
        $self->setSystemInstanceIdentifier();
        $self->setUuid($self->setItem($item)->createUuid());

        return $self;
    }

    /**
     * @param string $uuid
     *
     * @return mixed
     */
    public static function getByUuid($uuid)
    {
        $self = new self;

        return $self->getDao()->getByUuid($uuid);
    }

    /**
     * @param mixed $item
     *
     * @return static
     *
     * @throws \Exception
     */
    public static function create($item)
    {
        $uuid = new static;
        $uuid->setSystemInstanceIdentifier()->setItem($item);
        $uuid->setUuid($uuid->createUuid());

        return $uuid;
    }
}
