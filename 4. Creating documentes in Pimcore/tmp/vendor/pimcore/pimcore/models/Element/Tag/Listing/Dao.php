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
 * @package    Element
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\Element\Tag\Listing;

use Pimcore\Model;

/**
 * @property \Pimcore\Model\Element\Tag\Listing $model
 */
class Dao extends Model\Listing\Dao\AbstractDao
{
    /**
     * Loads a list of tags for the specified parameters, returns an array of Element\Tag elements
     *
     * @return array
     */
    public function load()
    {
        $tagsData = $this->db->fetchCol('SELECT id FROM tags' . $this->getCondition() . $this->getOrder() . $this->getOffsetLimit(), $this->model->getConditionVariables());

        $tags = [];
        foreach ($tagsData as $tagData) {
            if ($tag = Model\Element\Tag::getById($tagData)) {
                $tags[] = $tag;
            }
        }

        $this->model->setTags($tags);

        return $tags;
    }

    /**
     * @return int[]
     */
    public function loadIdList()
    {
        $tagsIds = $this->db->fetchCol('SELECT id FROM tags' . $this->getCondition() . $this->getGroupBy() . $this->getOrder() . $this->getOffsetLimit(), $this->model->getConditionVariables());

        return array_map('intval', $tagsIds);
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        try {
            return (int) $this->db->fetchOne('SELECT COUNT(*) FROM tags ' . $this->getCondition(), $this->model->getConditionVariables());
        } catch (\Exception $e) {
            return 0;
        }
    }
}
