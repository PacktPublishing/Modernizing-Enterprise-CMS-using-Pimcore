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
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Cache\Core;

use Pimcore\Cache\Pool\PimcoreCacheItemPoolInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

class WriteLock implements WriteLockInterface, LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @var bool
     */
    protected $enabled = true;

    /**
     * @var PimcoreCacheItemPoolInterface
     */
    protected $itemPool;

    /**
     * @var string
     */
    protected $cacheKey = 'system_cache_write_lock';

    /**
     * @var int
     */
    protected $lifetime = 30;

    /**
     * Contains the timestamp of the write lock time from the current process
     *
     * This is to recheck when removing the write lock (if the value is different -> higher) do not remove the lock
     * because then another process has acquired a lock.
     *
     * @var int|null
     */
    protected $timestamp = 0;

    /**
     * @var bool
     */
    protected $lockInitialized = false;

    /**
     * @param PimcoreCacheItemPoolInterface $itemPool
     */
    public function __construct(PimcoreCacheItemPoolInterface $itemPool)
    {
        $this->itemPool = $itemPool;
    }

    /**
     * @inheritDoc
     */
    public function enable()
    {
        $this->enabled = true;
    }

    /**
     * @inheritDoc
     */
    public function disable()
    {
        $this->enabled = false;
    }

    /**
     * @inheritDoc
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Initialize lock value once from storage
     */
    protected function initializeLock()
    {
        if ($this->lockInitialized) {
            return;
        }

        $item = $this->itemPool->getItem($this->cacheKey);
        if ($item->isHit()) {
            $lock = $item->get();

            if ($this->isLockValid($lock)) {
                $this->timestamp = $lock;
            }
        }

        $this->lockInitialized = true;
    }

    /**
     * Set a write lock (prevents items being written to cache)
     *
     * @param bool $force
     *
     * @return bool
     */
    public function lock($force = false)
    {
        if (!$this->enabled) {
            return true;
        }

        $this->initializeLock();

        if (!$this->timestamp || $force) {
            $this->timestamp = time();

            $this->logger->debug(
                'Setting write lock with timestamp {timestamp}',
                ['timestamp' => $this->timestamp]
            );

            $item = $this->itemPool->getItem($this->cacheKey);
            $item->set($this->timestamp);
            $item->expiresAfter($this->lifetime);

            return $this->itemPool->save($item);
        }

        return false;
    }

    /**
     * Check if a write lock is active
     *
     * @return bool
     */
    public function hasLock()
    {
        if (!$this->enabled) {
            return false;
        }

        $this->initializeLock();

        if ($this->timestamp && $this->timestamp > 0) {
            return true;
        }

        $item = $this->itemPool->getItem($this->cacheKey);
        if ($item->isHit()) {
            $lock = $item->get();

            if ($this->isLockValid($lock)) {
                $this->timestamp = $lock;

                return true;
            }
        }

        // normalize timestamp
        $this->timestamp = 0;

        return false;
    }

    /**
     * @param int $lockTime
     *
     * @return bool
     */
    protected function isLockValid($lockTime)
    {
        return $lockTime > (time() - $this->lifetime);
    }

    /**
     * Remove write lock from instance and from cache
     *
     * @return bool
     */
    public function removeLock()
    {
        if (!$this->enabled) {
            return true;
        }

        $this->initializeLock();

        if ($this->timestamp) {
            $item = $this->itemPool->getItem($this->cacheKey);
            if ($item->isHit()) {
                $lock = $item->get();

                // only remove the lock if it was created by this process
                if ($lock <= $this->timestamp) {
                    $this->logger->debug(
                        'Removing write lock with timestamp {timestamp}',
                        ['timestamp' => $lock]
                    );

                    $this->itemPool->deleteItem($this->cacheKey);

                    $this->timestamp = 0;

                    return true;
                } else {
                    $this->logger->debug(
                        'Not removing write lock as timestamp does not belong to this process (timestamp: {timestamp}, lock: {lock})',
                        ['timestamp' => $this->timestamp, 'lock' => $lock]
                    );

                    return false;
                }
            }
        }

        return false;
    }
}
