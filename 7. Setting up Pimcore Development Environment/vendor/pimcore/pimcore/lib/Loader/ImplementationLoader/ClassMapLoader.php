<?php

declare(strict_types = 1);

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

namespace Pimcore\Loader\ImplementationLoader;

/**
 * Loads implementations from a fixed name => className map
 *
 * @internal
 */
class ClassMapLoader extends AbstractClassNameLoader
{
    /**
     * @var array
     */
    protected $classMap = [];

    /**
     * @param array $classMap
     */
    public function __construct(array $classMap = [])
    {
        foreach ($classMap as $source => $target) {
            $this->classMap[$this->normalizeName($source)] = $this->normalizeName($target);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function supports(string $name): bool
    {
        return isset($this->classMap[$this->normalizeName($name)]);
    }

    public function getClassMap(): array
    {
        return $this->classMap;
    }

    /**
     * {@inheritdoc}
     */
    protected function getClassName(string $name)
    {
        return $this->classMap[$this->normalizeName($name)];
    }

    /**
     * Strip leading slashes from class names
     *
     * @param string $name
     *
     * @return string
     */
    private function normalizeName(string $name): string
    {
        return ltrim($name, '\\');
    }
}
