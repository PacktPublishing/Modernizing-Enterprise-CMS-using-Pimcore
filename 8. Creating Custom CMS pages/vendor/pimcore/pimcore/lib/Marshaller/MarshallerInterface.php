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
 * @package    Object
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Marshaller;

interface MarshallerInterface
{
    /**
     * @param mixed $value
     * @param array $params
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function marshal($value, $params = []);

    /**
     * @param mixed $value
     * @param array $params
     *
     * @return mixed
     *
     * @throws  \Exception
     */
    public function unmarshal($value, $params = []);
}
