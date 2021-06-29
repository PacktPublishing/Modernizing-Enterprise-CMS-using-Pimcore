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

namespace Pimcore\Model\Document;

use Pimcore\Model\Document;

/**
 * @method \Pimcore\Model\Document\Printcontainer\Dao getDao()
 */
class Printcontainer extends Document\PrintAbstract
{
    /**
     * {@inheritdoc}
     */
    protected string $type = 'printcontainer';

    /**
     * @internal
     *
     * @var string
     */
    protected $action = 'container';

    /**
     * @internal
     *
     * @var array
     */
    private $allChildren = [];

    /**
     * @return array
     *
     * @internal
     */
    public function getTreeNodeConfig()
    {
        $tmpDocument = [];
        $tmpDocument['leaf'] = false;
        $tmpDocument['expanded'] = !$this->hasChildren();
        $tmpDocument['iconCls'] = 'pimcore_icon_printcontainer';
        $tmpDocument['permissions'] = [
            'view' => $this->isAllowed('view'),
            'remove' => $this->isAllowed('delete'),
            'settings' => $this->isAllowed('settings'),
            'rename' => $this->isAllowed('rename'),
            'publish' => $this->isAllowed('publish'),
            'create' => $this->isAllowed('create'),
        ];

        return $tmpDocument;
    }

    /**
     * @return array
     */
    public function getAllChildren()
    {
        $this->allChildren = [];
        $this->doGetChildren($this);

        return $this->allChildren;
    }

    /**
     * @param Document $document
     */
    private function doGetChildren(Document $document)
    {
        $children = $document->getChildren();
        foreach ($children as $child) {
            if ($child instanceof Document\Printpage) {
                $this->allChildren[] = $child;
            }

            if ($child instanceof Document\Folder || $child instanceof Document\Printcontainer) {
                $this->doGetChildren($child);
            }

            if ($child instanceof Document\Hardlink) {
                if ($child->getSourceDocument() instanceof Document\Printpage) {
                    $this->allChildren[] = $child;
                }

                $this->doGetChildren($child);
            }
        }
    }

    /**
     * @return bool
     */
    public function pdfIsDirty()
    {
        $dirty = parent::pdfIsDirty();
        if (!$dirty) {
            $dirty = ($this->getLastGenerated() < $this->getDao()->getLastedChildModificationDate());
        }

        return $dirty;
    }
}
