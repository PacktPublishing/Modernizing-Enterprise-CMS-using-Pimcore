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

namespace Pimcore\Model\Asset\Video\Thumbnail\Config;

use Pimcore\Model;

/**
 * @method \Pimcore\Model\Asset\Video\Thumbnail\Config load()
 * @method \Pimcore\Model\Asset\Video\Thumbnail\Config\Listing\Dao getDao()
 */
class Listing extends Model\Listing\JsonListing
{
    /**
     * @internal
     *
     * @var \Pimcore\Model\Asset\Video\Thumbnail\Config[]|null
     */
    protected $thumbnails = null;

    /**
     * @return \Pimcore\Model\Asset\Video\Thumbnail\Config[]
     */
    public function getThumbnails()
    {
        if ($this->thumbnails === null) {
            $this->getDao()->load();
        }

        return $this->thumbnails;
    }

    /**
     * @param \Pimcore\Model\Asset\Video\Thumbnail\Config[]|null $thumbnails
     *
     * @return $this
     */
    public function setThumbnails($thumbnails)
    {
        $this->thumbnails = $thumbnails;

        return $this;
    }
}
