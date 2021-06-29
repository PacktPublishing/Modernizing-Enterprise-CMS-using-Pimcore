<?php

/*
 * This file is part of the flysystem-bundle project.
 *
 * (c) Titouan Galopin <galopintitouan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\FlysystemBundle\Lazy;

use Psr\Container\ContainerInterface;

/**
 * @author Titouan Galopin <galopintitouan@gmail.com>
 *
 * @internal
 */
class LazyFactory
{
    private $storages;

    public function __construct(ContainerInterface $storages)
    {
        $this->storages = $storages;
    }

    public function createStorage(string $source, string $storageName)
    {
        if (!$this->storages->has($source)) {
            throw new \InvalidArgumentException('You have requested a non-existent source storage "'.$source.'" in lazy storage "'.$storageName.'".');
        }

        return $this->storages->get($source);
    }
}
