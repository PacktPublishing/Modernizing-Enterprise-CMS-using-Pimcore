<?php

namespace Pimcore\Tests\Cache;

use Pimcore\Cache\Pool\Doctrine;
use Pimcore\Cache\Pool\Redis;
use Pimcore\Cache\Pool\SymfonyAdapterProxy;
use Pimcore\Storage\Redis\ConnectionFactory;
use Pimcore\Tests\Util\TestHelper;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;

class Factory
{
    /**
     * @param int $defaultLifetime
     *
     * @return Doctrine
     */
    public function createDoctrineItemPool($defaultLifetime = 0)
    {
        TestHelper::checkDbSupport();

        return new Doctrine(
            \Pimcore::getContainer()->get('doctrine.dbal.default_connection'),
            $defaultLifetime
        );
    }

    /**
     * @param int $defaultLifetime
     * @param array $connectionOptions
     * @param array $options
     *
     * @return Redis
     */
    public function createRedisItemPool($defaultLifetime, array $connectionOptions = [], array $options = [])
    {
        $connectionOptions = array_merge([
            'server' => 'localhost',
        ], $connectionOptions);

        $database = isset($connectionOptions['database']) ? $connectionOptions['database'] : null;
        if (null === $database) {
            throw new \PHPUnit\Framework\SkippedTestError('Test redis DB is not configured (env var PIMCORE_TEST_CACHE_REDIS_DATABASE)');
        }

        $connection = ConnectionFactory::createConnection($connectionOptions);

        return new Redis(
            $connection,
            $options,
            $defaultLifetime
        );
    }

    /**
     * @param int $defaultLifetime
     *
     * @return SymfonyAdapterProxy
     */
    public function createArrayAdapterProxyItemPool($defaultLifetime = 0)
    {
        $arrayAdapter = new ArrayAdapter($defaultLifetime, false);

        return $this->createSymfonyProxyItemPool($arrayAdapter);
    }

    /**
     * @param int $defaultLifetime
     *
     * @return SymfonyAdapterProxy
     */
    public function createFilesystemAdapterProxyItemPool($defaultLifetime = 0)
    {
        $filesystemAdapter = new FilesystemAdapter('', $defaultLifetime, \Pimcore::getKernel()->getCacheDir() . '/pimcore');

        return $this->createSymfonyProxyItemPool($filesystemAdapter);
    }

    /**
     * @param AdapterInterface $adapter
     *
     * @return SymfonyAdapterProxy
     */
    protected function createSymfonyProxyItemPool(AdapterInterface $adapter)
    {
        $tagAdapter = new TagAwareAdapter($adapter);
        $itemPool = new SymfonyAdapterProxy($tagAdapter);

        return $itemPool;
    }
}
