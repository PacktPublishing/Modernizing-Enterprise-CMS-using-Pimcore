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

namespace Pimcore\Model\Staticroute;

use Pimcore\Model;

/**
 * @method \Pimcore\Model\Staticroute\Listing\Dao getDao()
 * @method \Pimcore\Model\Staticroute[] load()
 * @method int getTotalCount()
 */
class Listing extends Model\Listing\JsonListing
{
    /**
     * @var \Pimcore\Model\Staticroute[]|null
     */
    protected $routes = null;

    /**
     * @return \Pimcore\Model\Staticroute[]
     */
    public function getRoutes()
    {
        if ($this->routes === null) {
            $this->getDao()->load();
        }

        return $this->routes;
    }

    /**
     * @param \Pimcore\Model\Staticroute[]|null $routes
     *
     * @return $this
     */
    public function setRoutes($routes)
    {
        $this->routes = $routes;

        return $this;
    }
}
