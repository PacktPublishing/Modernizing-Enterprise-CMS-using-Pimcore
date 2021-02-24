<?php

declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Document\Tag\NamingStrategy;

use Pimcore\Document\Tag\Block\BlockName;
use Pimcore\Document\Tag\NamingStrategy\Exception\TagNameException;

/**
 * @deprecated
 */
final class NestedNamingStrategy extends AbstractNamingStrategy
{
    const STRATEGY_NAME = 'nested';

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return self::STRATEGY_NAME;
    }

    /**
     * @param string $name
     * @param BlockName[] $blocks
     * @param int[] $indexes
     *
     * @return string
     */
    protected function buildHierarchicalName(string $name, array $blocks, array $indexes): string
    {
        if (count($indexes) > count($blocks)) {
            throw new \RuntimeException(sprintf('Index count %d is greater than blocks count %d', count($indexes), count($blocks)));
        }

        $parts = [];
        for ($i = 0; $i < count($blocks); $i++) {
            $part = $blocks[$i]->getRealName();

            if (isset($indexes[$i])) {
                $part = sprintf('%s:%d', $part, $indexes[$i]);
            }

            $parts[] = $part;
        }

        $parts[] = $name;

        return implode('.', $parts);
    }

    /**
     * @inheritDoc
     */
    public function buildChildElementTagName(string $name, string $type, array $parentBlockNames, int $index): string
    {
        if (count($parentBlockNames) === 0) {
            throw new TagNameException(sprintf(
                'Failed to build child tag name for %s %s at index %d as no parent name was passed',
                $type,
                $name,
                $index
            ));
        }

        $parentName = array_pop($parentBlockNames);

        return sprintf('%s:%d.%s', $parentName, $index, $name);
    }
}
