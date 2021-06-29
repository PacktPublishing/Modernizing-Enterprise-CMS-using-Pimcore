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

namespace Pimcore\Model\WebsiteSetting;

use Pimcore\Model;

/**
 * @method \Pimcore\Model\WebsiteSetting\Listing\Dao getDao()
 * @method \Pimcore\Model\WebsiteSetting[] load()
 * @method int getTotalCount()
 */
class Listing extends Model\Listing\AbstractListing
{
    /**
     * @internal
     *
     * @var array|null
     */
    protected $settings = null;

    /**
     * @param array $settings
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;
    }

    /**
     * @return \Pimcore\Model\WebsiteSetting[]
     */
    public function getSettings()
    {
        if ($this->settings === null) {
            $this->getDao()->load();
        }

        return $this->settings;
    }
}
