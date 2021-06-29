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

namespace Pimcore\Model\Tool\CustomReport\Config;

use Pimcore\Model;

/**
 * @internal
 *
 * @method \Pimcore\Model\Tool\CustomReport\Config\Listing\Dao getDao()
 */
class Listing extends Model\Listing\JsonListing
{
    /**
     * @var Model\Tool\CustomReport\Config[]|null
     */
    protected $reports = null;

    /**
     * @return Model\Tool\CustomReport\Config[]
     */
    public function getReports()
    {
        if ($this->reports === null) {
            $this->getDao()->load();
        }

        return $this->reports;
    }

    /**
     * @param Model\Tool\CustomReport\Config[]|null $reports
     *
     * @return $this
     */
    public function setReports($reports)
    {
        $this->reports = $reports;

        return $this;
    }
}
