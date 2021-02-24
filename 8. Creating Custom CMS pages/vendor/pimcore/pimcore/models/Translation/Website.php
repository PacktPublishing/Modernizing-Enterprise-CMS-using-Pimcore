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
 * @package    Translation
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Model\Translation;

/**
 * @method \Pimcore\Model\Translation\Website\Dao getDao()
 */
class Website extends AbstractTranslation
{
    /**
     * @return array
     */
    public static function getLanguages(): array
    {
        return \Pimcore\Tool::getValidLanguages();
    }
}
