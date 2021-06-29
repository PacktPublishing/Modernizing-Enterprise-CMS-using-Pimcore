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

namespace Pimcore\Model\User;

use Pimcore\Model\User\Workspace\Asset;
use Pimcore\Model\User\Workspace\DataObject;
use Pimcore\Model\User\Workspace\Document;

/**
 * @method \Pimcore\Model\User\UserRole\Dao getDao()
 */
class UserRole extends AbstractUser
{
    /**
     * @internal
     *
     * @var array
     */
    protected $permissions = [];

    /**
     * @internal
     *
     * @var Asset[]
     */
    protected $workspacesAsset = [];

    /**
     * @internal
     *
     * @var DataObject[]
     */
    protected $workspacesObject = [];

    /**
     * @internal
     *
     * @var Document[]
     */
    protected $workspacesDocument = [];

    /**
     * @internal
     *
     * @var array
     */
    protected $classes = [];

    /**
     * @internal
     *
     * @var array
     */
    protected $docTypes = [];

    /**
     * @internal
     *
     * @var array
     */
    protected $perspectives = [];

    /**
     * @internal
     *
     * @var array
     */
    protected $websiteTranslationLanguagesView = [];

    /**
     * @internal
     *
     * @var array
     */
    protected $websiteTranslationLanguagesEdit = [];

    /**
     * {@inheritdoc}
     */
    protected function update()
    {
        $this->getDao()->update();

        // save all workspaces
        $this->getDao()->emptyWorkspaces();

        foreach ($this->getWorkspacesAsset() as $workspace) {
            $workspace->setUserId($this->getId());
            $workspace->save();
        }
        foreach ($this->getWorkspacesDocument() as $workspace) {
            $workspace->setUserId($this->getId());
            $workspace->save();
        }
        foreach ($this->getWorkspacesObject() as $workspace) {
            $workspace->setUserId($this->getId());
            $workspace->save();
        }
    }

    /**
     * @internal
     *
     * @return $this
     */
    public function setAllAclToFalse()
    {
        $this->permissions = [];

        return $this;
    }

    /**
     * @param string $permissionName
     * @param bool|null $value
     *
     * @return $this
     */
    public function setPermission($permissionName, $value = null)
    {
        if (!in_array($permissionName, $this->permissions) && $value) {
            $this->permissions[] = $permissionName;
        } elseif (in_array($permissionName, $this->permissions) && !$value) {
            $position = array_search($permissionName, $this->permissions);
            array_splice($this->permissions, $position, 1);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param string $permissionName
     *
     * @return bool
     */
    public function getPermission($permissionName)
    {
        if (in_array($permissionName, $this->permissions)) {
            return true;
        }

        return false;
    }

    /**
     * Generates the permission list required for frontend display
     *
     * @internal
     *
     * @return array
     *
     * @todo: $permissionInfo should be array, but is declared as null
     */
    public function generatePermissionList()
    {
        $permissionInfo = null;

        $list = new Permission\Definition\Listing();
        $definitions = $list->load();

        foreach ($definitions as $definition) {
            $permissionInfo[$definition->getKey()] = $this->getPermission($definition->getKey());
        }

        return $permissionInfo;
    }

    /**
     * @param string|array $permissions
     *
     * @return $this
     */
    public function setPermissions($permissions)
    {
        if (is_string($permissions)) {
            $this->permissions = explode(',', $permissions);
        } elseif (is_array($permissions)) {
            $this->permissions = $permissions;
        }

        return $this;
    }

    /**
     * @param Asset[] $workspacesAsset
     *
     * @return $this
     */
    public function setWorkspacesAsset($workspacesAsset)
    {
        $this->workspacesAsset = $workspacesAsset;

        return $this;
    }

    /**
     * @return Asset[]
     */
    public function getWorkspacesAsset()
    {
        return $this->workspacesAsset;
    }

    /**
     * @param Document[] $workspacesDocument
     *
     * @return $this
     */
    public function setWorkspacesDocument($workspacesDocument)
    {
        $this->workspacesDocument = $workspacesDocument;

        return $this;
    }

    /**
     * @return Document[]
     */
    public function getWorkspacesDocument()
    {
        return $this->workspacesDocument;
    }

    /**
     * @param DataObject[] $workspacesObject
     *
     * @return $this
     */
    public function setWorkspacesObject($workspacesObject)
    {
        $this->workspacesObject = $workspacesObject;

        return $this;
    }

    /**
     * @return DataObject[]
     */
    public function getWorkspacesObject()
    {
        return $this->workspacesObject;
    }

    /**
     * @param array $classes
     *
     * @return $this
     */
    public function setClasses($classes)
    {
        $classes = $this->prepareArray($classes);

        $this->classes = $classes;

        return $this;
    }

    /**
     * @return array
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * @param array $docTypes
     *
     * @return $this
     */
    public function setDocTypes($docTypes)
    {
        $docTypes = $this->prepareArray($docTypes);

        $this->docTypes = $docTypes;

        return $this;
    }

    /**
     * @return array
     */
    public function getDocTypes()
    {
        return $this->docTypes;
    }

    /**
     * @return mixed
     */
    public function getPerspectives()
    {
        return $this->perspectives;
    }

    /**
     * @param array|string $perspectives
     *
     * @return $this
     */
    public function setPerspectives($perspectives)
    {
        $perspectives = $this->prepareArray($perspectives);

        $this->perspectives = $perspectives;

        return $this;
    }

    /**
     * @return array
     */
    public function getWebsiteTranslationLanguagesView()
    {
        return $this->websiteTranslationLanguagesView;
    }

    /**
     * @param array $websiteTranslationLanguagesView
     *
     * @return $this
     */
    public function setWebsiteTranslationLanguagesView($websiteTranslationLanguagesView)
    {
        $websiteTranslationLanguagesView = $this->prepareArray($websiteTranslationLanguagesView);

        $this->websiteTranslationLanguagesView = $websiteTranslationLanguagesView;

        return $this;
    }

    /**
     * @return array
     */
    public function getWebsiteTranslationLanguagesEdit()
    {
        return $this->websiteTranslationLanguagesEdit;
    }

    /**
     * @param array $websiteTranslationLanguagesEdit
     *
     * @return $this
     */
    public function setWebsiteTranslationLanguagesEdit($websiteTranslationLanguagesEdit)
    {
        $websiteTranslationLanguagesEdit = $this->prepareArray($websiteTranslationLanguagesEdit);

        $this->websiteTranslationLanguagesEdit = $websiteTranslationLanguagesEdit;

        return $this;
    }

    /**
     * checks if given parameter is string and if so splits it creates array
     * returns empty array if empty parameter is given
     *
     * @internal
     *
     * @param array|string $array
     *
     * @return array
     */
    protected function prepareArray($array)
    {
        if (is_string($array)) {
            if (strlen($array)) {
                $array = explode(',', $array);
            }
        }

        if (empty($array) || !is_array($array)) {
            $array = [];
        }

        return $array;
    }
}
