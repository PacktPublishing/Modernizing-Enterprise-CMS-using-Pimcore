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

use Pimcore\Model\DataObject\Classificationstore\KeyConfig;
use Symfony\Contracts\EventDispatcher\Event;

class KeyConfigEvent extends Event
{
    /**
     * @var KeyConfig
     */
    protected $keyConfig;

    /**
     * DocumentEvent constructor.
     *
     * @param KeyConfig $keyConfig
     */
    public function __construct(KeyConfig $keyConfig)
    {
        $this->keyConfig = $keyConfig;
    }

    /**
     * @return KeyConfig
     */
    public function getKeyConfig()
    {
        return $this->keyConfig;
    }

    /**
     * @param KeyConfig $keyConfig
     */
    public function setKeyConfig($keyConfig)
    {
        $this->keyConfig = $keyConfig;
    }
}
