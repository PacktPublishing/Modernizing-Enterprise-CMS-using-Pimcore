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

use Pimcore\Cache\Pool\PimcoreCacheItemInterface;
use Psr\Log\LoggerInterface;

interface CoreHandlerInterface
{
    /**
     * @return WriteLockInterface
     */
    public function getWriteLock();

    /**
     * @return LoggerInterface
     */
    public function getLogger();

    /**
     * @return $this
     */
    public function enable();

    /**
     * @return $this
     */
    public function disable();

    /**
     * @return bool
     */
    public function isEnabled();

    /**
     * @return bool
     */
    public function getHandleCli();

    /**
     * @param bool $handleCli
     *
     * @return $this
     */
    public function setHandleCli($handleCli);

    /**
     * @return bool
     */
    public function getForceImmediateWrite();

    /**
     * @param bool $forceImmediateWrite
     *
     * @return $this
     */
    public function setForceImmediateWrite($forceImmediateWrite);

    /**
     * Load data from cache (retrieves data from cache item)
     *
     * @param string $key
     *
     * @return bool|mixed
     */
    public function load($key);

    /**
     * Get PSR-6 cache item
     *
     * @param string $key
     *
     * @return PimcoreCacheItemInterface
     */
    public function getItem($key);

    /**
     * Save data to cache
     *
     * @param string $key
     * @param mixed $data
     * @param array $tags
     * @param int|\DateInterval|null $lifetime
     * @param int|null $priority
     * @param bool $force
     *
     * @return bool
     */
    public function save($key, $data, array $tags = [], $lifetime = null, $priority = 0, $force = false);

    /**
     * Remove a cache item
     *
     * @param string $key
     *
     * @return bool
     */
    public function remove($key);

    /**
     * Empty the cache
     *
     * @return bool
     */
    public function clearAll();

    /**
     * @param string $tag
     *
     * @return bool
     */
    public function clearTag($tag);

    /**
     * @param string[] $tags
     *
     * @return bool
     */
    public function clearTags(array $tags);

    /**
     * Clears all tags stored in tagsClearedOnShutdown, this function is executed during Pimcore shutdown
     *
     * @return bool
     */
    public function clearTagsOnShutdown();

    /**
     * Adds a tag to the shutdown queue, see clearTagsOnShutdown
     *
     * @param string $tag
     *
     * @return $this
     */
    public function addTagClearedOnShutdown($tag);

    /**
     * @param string $tag
     *
     * @return $this
     */
    public function addTagIgnoredOnSave($tag);

    /**
     * @param string $tag
     *
     * @return $this
     */
    public function removeTagIgnoredOnSave($tag);

    /**
     * @param string $tag
     *
     * @return $this
     */
    public function addTagIgnoredOnClear($tag);

    /**
     * @param string $tag
     *
     * @return $this
     */
    public function removeTagIgnoredOnClear($tag);

    /**
     * Writes save queue to the cache
     *
     * @return bool
     */
    public function writeSaveQueue();

    /**
     * Shut down pimcore - write cache entries and clean up
     *
     * @param bool $forceWrite
     *
     * @return $this
     */
    public function shutdown($forceWrite = false);

    /**
     * Purge orphaned/invalid data
     *
     * @return bool
     */
    public function purge();
}
