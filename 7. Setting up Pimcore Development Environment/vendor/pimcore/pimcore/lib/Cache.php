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

namespace Pimcore;

use Pimcore\Cache\Core\CoreCacheHandler;
use Pimcore\Event\CoreCacheEvents;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * This acts as facade for the actual cache implementation and exists primarily for BC reasons.
 */
class Cache
{
    /**
     * @var CoreCacheHandler
     */
    protected static $handler;

    /**
     * Get the cache handler implementation
     *
     * @internal
     *
     * @return CoreCacheHandler
     */
    public static function getHandler()
    {
        if (null === static::$handler) {
            static::$handler = \Pimcore::getContainer()->get(CoreCacheHandler::class);
        }

        return static::$handler;
    }

    /**
     * Initialize the cache. This acts mainly as integration point with legacy caches.
     *
     * @internal
     */
    public static function init()
    {
        if (\Pimcore::hasKernel()) {
            \Pimcore::getContainer()
                ->get('event_dispatcher')
                ->dispatch(new GenericEvent(), CoreCacheEvents::INIT);

            if (isset($_REQUEST['pimcore_nocache']) && \Pimcore::inDebugMode()) {
                self::getHandler()->setPool(\Pimcore::getContainer()->get('pimcore.cache.adapter.null_tag_aware'));
            }
        }
    }

    /**
     * Returns the content of the requested cache entry
     *
     * @param string $key
     *
     * @return mixed
     */
    public static function load($key)
    {
        return static::getHandler()->load($key);
    }

    /**
     * Save an item to the cache (deferred to shutdown if force is false and forceImmediateWrite is not set)
     *
     * @param mixed $data
     * @param string $key
     * @param array $tags
     * @param int|\DateInterval|null $lifetime
     * @param int $priority
     * @param bool $force
     *
     * @return bool
     */
    public static function save($data, $key, $tags = [], $lifetime = null, $priority = 0, $force = false)
    {
        return static::getHandler()->save($key, $data, $tags, $lifetime, $priority, $force);
    }

    /**
     * Remove an item from the cache
     *
     * @param string $key
     *
     * @return bool
     */
    public static function remove($key)
    {
        return static::getHandler()->remove($key);
    }

    /**
     * Empty the cache
     *
     * @return bool
     */
    public static function clearAll()
    {
        return static::getHandler()->clearAll();
    }

    /**
     * Removes entries from the cache matching the given tag
     *
     * @param string $tag
     *
     * @return bool
     */
    public static function clearTag($tag)
    {
        return static::getHandler()->clearTag($tag);
    }

    /**
     * Removes entries from the cache matching the given tags
     *
     * @param array $tags
     *
     * @return bool
     */
    public static function clearTags(array $tags = []): bool
    {
        return static::getHandler()->clearTags($tags);
    }

    /**
     * Adds a tag to the shutdown queue
     *
     * @param string $tag
     */
    public static function addClearTagOnShutdown($tag)
    {
        static::getHandler()->addTagClearedOnShutdown($tag);
    }

    /**
     * Add tag to the list ignored on save. Items with this tag won't be saved to cache.
     *
     * @param string $tag
     */
    public static function addIgnoredTagOnSave($tag)
    {
        static::getHandler()->addTagIgnoredOnSave($tag);
    }

    /**
     * Remove tag from the list ignored on save
     *
     * @param string $tag
     */
    public static function removeIgnoredTagOnSave($tag)
    {
        static::getHandler()->removeTagIgnoredOnSave($tag);
    }

    /**
     * Add tag to the list ignored on clear. Tags in this list won't be cleared via clearTags()
     *
     * @param string $tag
     */
    public static function addIgnoredTagOnClear($tag)
    {
        static::getHandler()->addTagIgnoredOnClear($tag);
    }

    /**
     * Remove tag from the list ignored on clear
     *
     * @param string $tag
     */
    public static function removeIgnoredTagOnClear($tag)
    {
        static::getHandler()->removeTagIgnoredOnClear($tag);
    }

    /**
     * Write and clean up cache
     *
     * @internal
     *
     * @param bool $forceWrite
     */
    public static function shutdown($forceWrite = false)
    {
        static::getHandler()->shutdown($forceWrite);
    }

    /**
     * Disables the complete pimcore cache
     */
    public static function disable()
    {
        static::getHandler()->disable();
    }

    /**
     * Enables the pimcore cache
     */
    public static function enable()
    {
        static::getHandler()->enable();
    }

    /**
     * @return bool
     */
    public static function isEnabled()
    {
        return static::getHandler()->isEnabled();
    }

    /**
     * @param bool $forceImmediateWrite
     */
    public static function setForceImmediateWrite($forceImmediateWrite)
    {
        static::getHandler()->setForceImmediateWrite($forceImmediateWrite);
    }

    /**
     * @return bool
     */
    public static function getForceImmediateWrite()
    {
        return static::getHandler()->getForceImmediateWrite();
    }
}
