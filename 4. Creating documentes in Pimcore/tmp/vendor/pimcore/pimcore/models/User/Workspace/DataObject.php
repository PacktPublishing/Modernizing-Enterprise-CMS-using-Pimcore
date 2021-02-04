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
 * @package    User
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\User\Workspace;

class DataObject extends AbstractWorkspace
{
    /**
     * @var bool
     */
    public $save = false;

    /**
     * @var bool
     */
    public $unpublish = false;

    /**
     * @var string
     */
    public $lEdit = null;

    /**
     * @var string
     */
    public $lView = null;

    /**
     * @var string
     */
    public $layouts = null;

    /**
     * @param bool $save
     *
     * @return $this
     */
    public function setSave($save)
    {
        $this->save = $save;

        return $this;
    }

    /**
     * @return bool
     */
    public function getSave()
    {
        return $this->save;
    }

    /**
     * @param bool $unpublish
     *
     * @return $this
     */
    public function setUnpublish($unpublish)
    {
        $this->unpublish = $unpublish;

        return $this;
    }

    /**
     * @return bool
     */
    public function getUnpublish()
    {
        return $this->unpublish;
    }

    /**
     * @param string $lEdit
     */
    public function setLEdit($lEdit)
    {
        //@TODO - at the moment disallowing all languages is not possible - the empty lEdit value means that every language is allowed to edit...
        $this->lEdit = $lEdit;
    }

    /**
     * @return string
     */
    public function getLEdit()
    {
        return $this->lEdit;
    }

    /**
     * @param string $lView
     */
    public function setLView($lView)
    {
        $this->lView = $lView;
    }

    /**
     * @return string
     */
    public function getLView()
    {
        return $this->lView;
    }

    /**
     * @param string $layouts
     */
    public function setLayouts($layouts)
    {
        $this->layouts = $layouts;
    }

    /**
     * @return string
     */
    public function getLayouts()
    {
        return $this->layouts;
    }
}
