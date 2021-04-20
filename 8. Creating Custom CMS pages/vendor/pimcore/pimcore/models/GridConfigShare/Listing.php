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
 * @package    Schedule
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\GridConfigShare;

use Pimcore\Model;

/**
 * @method \Pimcore\Model\GridConfigShare\Listing\Dao getDao()
 * @method Model\GridConfigShare[] load()
 * @method Model\GridConfigShare current()
 *
 * @internal
 */
class Listing extends Model\Listing\AbstractListing
{
    /**
     * @return Model\GridConfigShare[]
     */
    public function getGridconfigShares()
    {
        return $this->getData();
    }

    /**
     * @param array $gridconfigShares
     *
     * @return static
     */
    public function setGridconfigShares($gridconfigShares)
    {
        return $this->setData($gridconfigShares);
    }
}
