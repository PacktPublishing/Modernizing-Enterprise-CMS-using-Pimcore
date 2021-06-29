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

namespace Pimcore\Model\Workflow;

use Pimcore\Model;
use Pimcore\Model\Workflow;

/**
 * @method Workflow\Listing\Dao getDao()
 */
class Listing extends Model\Listing\JsonListing
{
    /**
     * @internal
     *
     * @var array|null
     */
    protected $workflows = null;

    /**
     * @return Workflow[]
     */
    public function getWorkflows()
    {
        if ($this->workflows === null) {
            $this->getDao()->load();
        }

        return $this->workflows;
    }

    /**
     * @param Workflow[] $workflows
     */
    public function setWorkflows($workflows)
    {
        $this->workflows = $workflows;
    }
}
