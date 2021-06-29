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

namespace Pimcore\Model\DataObject\ClassDefinition\Helper;

use Pimcore\Model\DataObject\ClassDefinition\PreviewGeneratorInterface;

/**
 * @internal
 */
class PreviewGeneratorResolver extends ClassResolver
{
    /**
     * @param string $generatorClass
     *
     * @return PreviewGeneratorInterface|null
     */
    public static function resolveGenerator($generatorClass)
    {
        return self::resolve($generatorClass, static function ($generator) {
            return $generator instanceof PreviewGeneratorInterface;
        });
    }
}
