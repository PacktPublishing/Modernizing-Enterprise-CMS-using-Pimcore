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

namespace Pimcore\Model\DataObject\Classificationstore;

use Pimcore\Cache;
use Pimcore\Event\DataObjectClassificationStoreEvents;
use Pimcore\Event\Model\DataObject\ClassificationStore\GroupConfigEvent;
use Pimcore\Model;

/**
 * @method \Pimcore\Model\DataObject\Classificationstore\GroupConfig\Dao getDao()
 */
final class GroupConfig extends Model\AbstractModel
{
    use Model\Element\ChildsCompatibilityTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * Store ID
     *
     * @var int
     */
    protected $storeId = 1;

    /**
     * Parent id
     *
     * @var int
     */
    protected $parentId;

    /**
     * The group name.
     *
     * @var string
     */
    protected $name;

    /**
     * The group description.
     *
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $creationDate;

    /**
     * @var int
     */
    protected $modificationDate;

    /**
     * @param int $id
     *
     * @return self|null
     */
    public static function getById($id)
    {
        try {
            $cacheKey = 'cs_groupconfig_' . $id;
            if (Cache\Runtime::isRegistered($cacheKey)) {
                $config = Cache\Runtime::get($cacheKey);
                if ($config) {
                    return $config;
                }
            }

            if (!$config = Cache::load($cacheKey)) {
                $config = new self();
                $config->getDao()->getById((int)$id);
                Cache::save($config, $cacheKey, [], null, 0, true);
            }

            Cache\Runtime::set($cacheKey, $config);

            return $config;
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * @param string $name
     * @param int $storeId
     *
     * @return self|null
     *
     * @throws \Exception
     */
    public static function getByName($name, $storeId = 1)
    {
        try {
            $config = new self();
            $config->setName($name);
            $config->setStoreId($storeId ? $storeId : 1);
            $config->getDao()->getByName();

            return $config;
        } catch (Model\Exception\NotFoundException $e) {
            return null;
        }
    }

    /**
     * @return int
     */
    public function hasChildren()
    {
        return $this->getDao()->hasChildren();
    }

    /**
     * @return Model\DataObject\Classificationstore\GroupConfig
     */
    public static function create()
    {
        $config = new self();
        $config->save();

        return $config;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = (int) $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description.
     *
     * @param string $description
     *
     * @return Model\DataObject\Classificationstore\GroupConfig
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Deletes the key value group configuration
     */
    public function delete()
    {
        \Pimcore::getEventDispatcher()->dispatch(new GroupConfigEvent($this), DataObjectClassificationStoreEvents::GROUP_CONFIG_PRE_DELETE);
        $cacheKey = 'cs_groupconfig_' . $this->getId();
        Cache\Runtime::set($cacheKey, null);
        Cache::remove($cacheKey);

        $this->getDao()->delete();
        \Pimcore::getEventDispatcher()->dispatch(new GroupConfigEvent($this), DataObjectClassificationStoreEvents::GROUP_CONFIG_POST_DELETE);
    }

    /**
     * Saves the group config
     */
    public function save()
    {
        $isUpdate = false;

        if ($this->getId()) {
            $cacheKey = 'cs_groupconfig_' . $this->getId();
            Cache\Runtime::set($cacheKey, null);
            Cache::remove($cacheKey);

            $isUpdate = true;
            \Pimcore::getEventDispatcher()->dispatch(new GroupConfigEvent($this), DataObjectClassificationStoreEvents::GROUP_CONFIG_PRE_UPDATE);
        } else {
            \Pimcore::getEventDispatcher()->dispatch(new GroupConfigEvent($this), DataObjectClassificationStoreEvents::GROUP_CONFIG_PRE_ADD);
        }

        $model = $this->getDao()->save();

        if ($isUpdate) {
            \Pimcore::getEventDispatcher()->dispatch(new GroupConfigEvent($this), DataObjectClassificationStoreEvents::GROUP_CONFIG_POST_UPDATE);
        } else {
            \Pimcore::getEventDispatcher()->dispatch(new GroupConfigEvent($this), DataObjectClassificationStoreEvents::GROUP_CONFIG_POST_ADD);
        }

        return $model;
    }

    /**
     * @param int $modificationDate
     *
     * @return $this
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = (int) $modificationDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @param int $creationDate
     *
     * @return $this
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = (int) $creationDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Returns all keys belonging to this group
     *
     * @return KeyGroupRelation[]
     */
    public function getRelations()
    {
        $list = new KeyGroupRelation\Listing();
        $list->setCondition('groupId = ' . $this->id);
        $list = $list->load();

        return $list;
    }

    /**
     * @return int
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * @param int $storeId
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;
    }
}
