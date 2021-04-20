<?php

namespace ContainerRWbhxvk;
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Cache/Adapter/AbstractTagAwareAdapter.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Cache/Traits/RedisTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Cache/Adapter/RedisTagAwareAdapter.php';

class RedisTagAwareAdapter_310208a extends \Symfony\Component\Cache\Adapter\RedisTagAwareAdapter implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Symfony\Component\Cache\Adapter\RedisTagAwareAdapter|null wrapped object, if the proxy is initialized
     */
    private $valueHolder13cb8 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer29583 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties1bf39 = [
        
    ];

    public function commit() : bool
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'commit', array(), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->commit();
    }

    public function deleteItems(array $keys) : bool
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'deleteItems', array('keys' => $keys), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->deleteItems($keys);
    }

    public function invalidateTags(array $tags)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'invalidateTags', array('tags' => $tags), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->invalidateTags($tags);
    }

    public function hasItem($key)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'hasItem', array('key' => $key), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->hasItem($key);
    }

    public function clear(string $prefix = '')
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'clear', array('prefix' => $prefix), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->clear($prefix);
    }

    public function deleteItem($key)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'deleteItem', array('key' => $key), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->deleteItem($key);
    }

    public function getItem($key)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'getItem', array('key' => $key), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->getItem($key);
    }

    public function getItems(array $keys = [])
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'getItems', array('keys' => $keys), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->getItems($keys);
    }

    public function save(\Psr\Cache\CacheItemInterface $item)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'save', array('item' => $item), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->save($item);
    }

    public function saveDeferred(\Psr\Cache\CacheItemInterface $item)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'saveDeferred', array('item' => $item), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->saveDeferred($item);
    }

    public function enableVersioning($enable = true)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'enableVersioning', array('enable' => $enable), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->enableVersioning($enable);
    }

    public function reset()
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'reset', array(), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->reset();
    }

    public function setLogger(\Psr\Log\LoggerInterface $logger)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'setLogger', array('logger' => $logger), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->setLogger($logger);
    }

    public function setCallbackWrapper(?callable $callbackWrapper) : callable
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'setCallbackWrapper', array('callbackWrapper' => $callbackWrapper), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->setCallbackWrapper($callbackWrapper);
    }

    public function get(string $key, callable $callback, ?float $beta = null, ?array &$metadata = null)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'get', array('key' => $key, 'callback' => $callback, 'beta' => $beta, 'metadata' => $metadata), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->get($key, $callback, $beta, $metadata);
    }

    public function delete(string $key) : bool
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'delete', array('key' => $key), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->delete($key);
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        unset($instance->maxIdLength, $instance->logger);

        \Closure::bind(function (\Symfony\Component\Cache\Adapter\RedisTagAwareAdapter $instance) {
            unset($instance->redisEvictionPolicy, $instance->redis, $instance->marshaller);
        }, $instance, 'Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter')->__invoke($instance);

        \Closure::bind(function (\Symfony\Component\Cache\Adapter\AbstractTagAwareAdapter $instance) {
            unset($instance->createCacheItem, $instance->mergeByLifetime, $instance->namespace, $instance->namespaceVersion, $instance->versioningIsEnabled, $instance->deferred, $instance->ids, $instance->callbackWrapper, $instance->computing);
        }, $instance, 'Symfony\\Component\\Cache\\Adapter\\AbstractTagAwareAdapter')->__invoke($instance);

        $instance->initializer29583 = $initializer;

        return $instance;
    }

    public function __construct($redisClient, string $namespace = '', int $defaultLifetime = 0, ?\Symfony\Component\Cache\Marshaller\MarshallerInterface $marshaller = null)
    {
        static $reflection;

        if (! $this->valueHolder13cb8) {
            $reflection = $reflection ?? new \ReflectionClass('Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter');
            $this->valueHolder13cb8 = $reflection->newInstanceWithoutConstructor();
        unset($this->maxIdLength, $this->logger);

        \Closure::bind(function (\Symfony\Component\Cache\Adapter\RedisTagAwareAdapter $instance) {
            unset($instance->redisEvictionPolicy, $instance->redis, $instance->marshaller);
        }, $this, 'Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter')->__invoke($this);

        \Closure::bind(function (\Symfony\Component\Cache\Adapter\AbstractTagAwareAdapter $instance) {
            unset($instance->createCacheItem, $instance->mergeByLifetime, $instance->namespace, $instance->namespaceVersion, $instance->versioningIsEnabled, $instance->deferred, $instance->ids, $instance->callbackWrapper, $instance->computing);
        }, $this, 'Symfony\\Component\\Cache\\Adapter\\AbstractTagAwareAdapter')->__invoke($this);

        }

        $this->valueHolder13cb8->__construct($redisClient, $namespace, $defaultLifetime, $marshaller);
    }

    public function & __get($name)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, '__get', ['name' => $name], $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        if (isset(self::$publicProperties1bf39[$name])) {
            return $this->valueHolder13cb8->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder13cb8;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder13cb8;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        $realInstanceReflection = new \ReflectionClass('Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder13cb8;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder13cb8;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, '__isset', array('name' => $name), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        $realInstanceReflection = new \ReflectionClass('Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder13cb8;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder13cb8;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, '__unset', array('name' => $name), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        $realInstanceReflection = new \ReflectionClass('Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder13cb8;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder13cb8;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, '__clone', array(), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        $this->valueHolder13cb8 = clone $this->valueHolder13cb8;
    }

    public function __sleep()
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, '__sleep', array(), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return array('valueHolder13cb8');
    }

    public function __wakeup()
    {
        unset($this->maxIdLength, $this->logger);

        \Closure::bind(function (\Symfony\Component\Cache\Adapter\RedisTagAwareAdapter $instance) {
            unset($instance->redisEvictionPolicy, $instance->redis, $instance->marshaller);
        }, $this, 'Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter')->__invoke($this);

        \Closure::bind(function (\Symfony\Component\Cache\Adapter\AbstractTagAwareAdapter $instance) {
            unset($instance->createCacheItem, $instance->mergeByLifetime, $instance->namespace, $instance->namespaceVersion, $instance->versioningIsEnabled, $instance->deferred, $instance->ids, $instance->callbackWrapper, $instance->computing);
        }, $this, 'Symfony\\Component\\Cache\\Adapter\\AbstractTagAwareAdapter')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer29583 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer29583;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'initializeProxy', array(), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder13cb8;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder13cb8;
    }

    public function __destruct()
    {
        $this->initializer29583 || $this->valueHolder13cb8->__destruct();
    }
}

if (!\class_exists('RedisTagAwareAdapter_310208a', false)) {
    \class_alias(__NAMESPACE__.'\\RedisTagAwareAdapter_310208a', 'RedisTagAwareAdapter_310208a', false);
}
