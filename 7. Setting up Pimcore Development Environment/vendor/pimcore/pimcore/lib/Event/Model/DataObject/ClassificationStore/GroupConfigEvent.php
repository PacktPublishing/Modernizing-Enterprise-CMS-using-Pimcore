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

namespace Pimcore\Event\Model\DataObject\ClassificationStore;

use Pimcore\Model\DataObject\Classificationstore\GroupConfig;
use Symfony\Contracts\EventDispatcher\Event;

class GroupConfigEvent extends Event
{
    /**
     * @var GroupConfig
     */
    protected $groupConfig;

    /**
     * DocumentEvent constructor.
     *
     * @param GroupConfig $groupConfig
     */
    public function __construct(GroupConfig $groupConfig)
    {
        $this->groupConfig = $groupConfig;
    }

    /**
     * @return GroupConfig
     */
    public function getGroupConfig()
    {
        return $this->groupConfig;
    }

    /**
     * @param GroupConfig $groupConfig
     */
    public function setGroupConfig($groupConfig)
    {
        $this->groupConfig = $groupConfig;
    }
}
