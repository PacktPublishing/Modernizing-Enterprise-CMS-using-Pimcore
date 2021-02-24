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

namespace Pimcore\Cache;

final class Runtime extends \ArrayObject
{
    const SERVICE_ID = __CLASS__;

    protected static $tempInstance;
    protected static $instance;

    /**
     * Array of indexes which are blocked from cache. If a given
     * index is queried or set, an exception with the given message
     * is thrown.
     *
     * @var array
     */
    private static $blockedIndexes = [
        'pimcore_tag_block_current' => 'Index "%s" is now handled via "pimcore.document.tag.block_state_stack" service',
        'pimcore_tag_block_numeration' => 'Index "%s" is now handled via "pimcore.document.tag.block_state_stack" service',
    ];

    /**
     * Retrieves the default registry instance.
     *
     * @return self
     */
    public static function getInstance()
    {
        if (self::$instance) {
            return self::$instance;
        } elseif (\Pimcore::hasContainer()) {
            $container = \Pimcore::getContainer();

            /** @var self $instance */
            $instance = null;
            if ($container->initialized(self::SERVICE_ID)) {
                $instance = $container->get(self::SERVICE_ID);
            } else {
                $instance = new self;
                $container->set(self::SERVICE_ID, $instance);
            }

            self::$instance = $instance;

            if (self::$tempInstance) {
                // copy values from static temp. instance to the service instance
                foreach (self::$tempInstance as $key => $value) {
                    $instance->offsetSet($key, $value);
                }

                self::$tempInstance = null;
            }

            return $instance;
        } else {
            // create a temp. instance
            // this is necessary because the runtime cache is sometimes in use before the actual service container
            // is initialized
            if (!self::$tempInstance) {
                self::$tempInstance = new self;
            }

            return self::$tempInstance;
        }
    }

    /**
     * getter method, basically same as offsetGet().
     *
     * This method can be called from an object of type \Pimcore\Cache\Runtime, or it
     * can be called statically.  In the latter case, it uses the default
     * static instance stored in the class.
     *
     * @param string $index - get the value associated with $index
     *
     * @return mixed
     *
     * @throws \Exception if no entry is registered for $index.
     */
    public static function get($index)
    {
        $instance = self::getInstance();

        if (!$instance->offsetExists($index)) {
            throw new \Exception("No entry is registered for key '$index'");
        }

        return $instance->offsetGet($index);
    }

    /**
     * setter method, basically same as offsetSet().
     *
     * This method can be called from an object of type \Pimcore\Cache\Runtime, or it
     * can be called statically.  In the latter case, it uses the default
     * static instance stored in the class.
     *
     * @param string $index The location in the ArrayObject in which to store
     *   the value.
     * @param mixed $value The object to store in the ArrayObject.
     *
     * @return void
     */
    public static function set($index, $value)
    {
        self::checkIndexes($index);

        $instance = self::getInstance();
        $instance->offsetSet($index, $value);
    }

    /**
     * Returns TRUE if the $index is a named value in the registry,
     * or FALSE if $index was not found in the registry.
     *
     * @param  string $index
     *
     * @return bool
     */
    public static function isRegistered($index)
    {
        $instance = self::getInstance();

        return $instance->offsetExists($index);
    }

    /**
     * Constructs a parent ArrayObject with default
     * ARRAY_AS_PROPS to allow access as an object
     *
     * @param array $array data array
     * @param int $flags ArrayObject flags
     */
    public function __construct($array = [], $flags = parent::ARRAY_AS_PROPS)
    {
        self::checkIndexes(array_keys($array));

        parent::__construct($array, $flags);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($index, $value)
    {
        self::checkIndexes($index);

        parent::offsetSet($index, $value);
    }

    /**
     * Alias of self::set() to be compatible with Pimcore\Cache
     *
     * @param mixed $data
     * @param string $id
     *
     * @return mixed
     */
    public static function save($data, $id)
    {
        self::set($id, $data);
    }

    /**
     * Alias of self::get() to be compatible with Pimcore\Cache
     *
     * @param string $id
     *
     * @return mixed
     */
    public static function load($id)
    {
        return self::get($id);
    }

    /**
     * @param array $keepItems
     */
    public static function clear($keepItems = [])
    {
        self::$instance = null;
        $newInstance = new self();
        $oldInstance = self::getInstance();

        foreach ($keepItems as $key) {
            if ($oldInstance->offsetExists($key)) {
                $newInstance->offsetSet($key, $oldInstance->offsetGet($key));
            }
        }

        \Pimcore::getContainer()->set(self::SERVICE_ID, $newInstance);
        self::$instance = $newInstance;
    }

    /**
     * Check if index is in list of blocked indexes
     *
     * @param string|array $indexes
     */
    private static function checkIndexes($indexes)
    {
        if (!is_array($indexes)) {
            $indexes = [$indexes];
        }

        foreach ($indexes as $index) {
            if (isset(self::$blockedIndexes[$index])) {
                $message = self::$blockedIndexes[$index];
                if (!$message) {
                    $message = 'Index "%s" is blocked by configuration';
                }

                if (false !== strpos($message, '%s')) {
                    $message = sprintf($message, $index);
                }

                throw new \InvalidArgumentException($message);
            }
        }
    }
}
