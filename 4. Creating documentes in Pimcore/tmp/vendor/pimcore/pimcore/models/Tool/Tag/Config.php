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

namespace Pimcore\Model\Tool\Tag;

use Pimcore\Cache;
use Pimcore\Model;

/**
 * @deprecated
 *
 * @method \Pimcore\Model\Tool\Tag\Config\Dao getDao()
 * @method void save()
 */
class Config extends Model\AbstractModel
{
    /**
     * @var array
     */
    public $items = [];

    /**
     * @var string
     */
    public $name = '';

    /**
     * @var string
     */
    public $description = '';

    /**
     * @var int
     */
    public $siteId;

    /**
     * @var string
     */
    public $urlPattern = '';

    /**
     * @var string
     */
    public $textPattern = '';

    /**
     * @var string
     */
    public $httpMethod = '';

    /**
     * @var bool
     */
    public $disabled;

    /**
     * @var array
     */
    public $params = [
        ['name' => '', 'value' => ''],
        ['name' => '', 'value' => ''],
        ['name' => '', 'value' => ''],
        ['name' => '', 'value' => ''],
        ['name' => '', 'value' => ''],
    ];

    /**
     * @var int
     */
    public $modificationDate;

    /**
     * @var int
     */
    public $creationDate;

    /**
     * @param string $name
     *
     * @return self|null
     *
     * @throws \Exception
     */
    public static function getByName($name)
    {
        try {
            $tag = new self();
            $tag->getDao()->getByName($name);

            return $tag;
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Delete from Database
     */
    public function delete()
    {
        $this->getDao()->delete();

        // clear cache tags
        Cache::clearTags(['tagmanagement', 'output']);
    }

    /**
     * @param array $parameters
     *
     * @return bool
     */
    public function addItem($parameters)
    {
        $this->items[] = $parameters;

        return true;
    }

    /**
     * @param int $position
     * @param array $parameters
     *
     * @return bool
     */
    public function addItemAt($position, $parameters)
    {
        array_splice($this->items, $position, 0, [$parameters]);

        return true;
    }

    public function resetItems()
    {
        $this->items = [];
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param array $items
     *
     * @return $this
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param string $name
     *
     * @return $this
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
     * @param string $httpMethod
     *
     * @return $this
     */
    public function setHttpMethod($httpMethod)
    {
        $this->httpMethod = $httpMethod;

        return $this;
    }

    /**
     * @return string
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * @param string $urlPattern
     *
     * @return $this
     */
    public function setUrlPattern($urlPattern)
    {
        $this->urlPattern = $urlPattern;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrlPattern()
    {
        return $this->urlPattern;
    }

    /**
     * @param int $siteId
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * @return int
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param array $params
     *
     * @return $this
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param string $textPattern
     *
     * @return $this
     */
    public function setTextPattern($textPattern)
    {
        $this->textPattern = $textPattern;

        return $this;
    }

    /**
     * @return string
     */
    public function getTextPattern()
    {
        return $this->textPattern;
    }

    /**
     * @return int
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @param int $modificationDate
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;
    }

    /**
     * @return int
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param int $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return bool
     */
    public function isDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param bool $disabled
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
    }
}
