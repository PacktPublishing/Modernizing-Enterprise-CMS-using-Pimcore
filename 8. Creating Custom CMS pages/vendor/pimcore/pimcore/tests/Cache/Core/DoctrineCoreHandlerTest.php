<?php

namespace Pimcore\Tests\Cache\Core;

use Pimcore\Cache\Pool\Doctrine;
use Pimcore\Tests\Cache\Factory;

/**
 * @group cache.core.db
 */
class DoctrineCoreHandlerTest extends AbstractCoreHandlerTest
{
    /**
     * Initializes item pool
     *
     * @return Doctrine
     */
    protected function createCachePool()
    {
        return (new Factory())->createDoctrineItemPool($this->defaultLifetime);
    }
}
