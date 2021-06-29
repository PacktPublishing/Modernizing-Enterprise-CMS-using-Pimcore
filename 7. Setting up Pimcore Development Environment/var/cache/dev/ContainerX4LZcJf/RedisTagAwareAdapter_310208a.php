<?php

namespace ContainerX4LZcJf;
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Cache/Adapter/AbstractTagAwareAdapter.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Cache/Traits/RedisTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Cache/Adapter/RedisTagAwareAdapter.php';

class RedisTagAwareAdapter_310208a extends \Symfony\Component\Cache\Adapter\RedisTagAwareAdapter implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Symfony\Component\Cache\Adapter\RedisTagAwareAdapter|null wrapped object, if the proxy is initialized
     */
    private $valueHolder6074b = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer2e3ea = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesec5c2 = [
        
    ];

    public function commit() : bool
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'commit', array(), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->commit();
    }

    public function deleteItems(array $keys) : bool
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'deleteItems', array('keys' => $keys), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->deleteItems($keys);
    }

    public function invalidateTags(array $tags)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'invalidateTags', array('tags' => $tags), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->invalidateTags($tags);
    }

    public function hasItem($key)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'hasItem', array('key' => $key), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->hasItem($key);
    }

    public function clear(string $prefix = '')
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'clear', array('prefix' => $prefix), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->clear($prefix);
    }

    public function deleteItem($key)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'deleteItem', array('key' => $key), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->deleteItem($key);
    }

    public function getItem($key)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'getItem', array('key' => $key), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->getItem($key);
    }

    public function getItems(array $keys = [])
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'getItems', array('keys' => $keys), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->getItems($keys);
    }

    public function save(\Psr\Cache\CacheItemInterface $item)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'save', array('item' => $item), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->save($item);
    }

    public function saveDeferred(\Psr\Cache\CacheItemInterface $item)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'saveDeferred', array('item' => $item), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->saveDeferred($item);
    }

    public function enableVersioning($enable = true)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'enableVersioning', array('enable' => $enable), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->enableVersioning($enable);
    }

    public function reset()
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'reset', array(), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->reset();
    }

    public function setLogger(\Psr\Log\LoggerInterface $logger)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'setLogger', array('logger' => $logger), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->setLogger($logger);
    }

    public function setCallbackWrapper(?callable $callbackWrapper) : callable
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'setCallbackWrapper', array('callbackWrapper' => $callbackWrapper), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->setCallbackWrapper($callbackWrapper);
    }

    public function get(string $key, callable $callback, ?float $beta = null, ?array &$metadata = null)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'get', array('key' => $key, 'callback' => $callback, 'beta' => $beta, 'metadata' => $metadata), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->get($key, $callback, $beta, $metadata);
    }

    public function delete(string $key) : bool
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'delete', array('key' => $key), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->delete($key);
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
            unset($instance->namespace, $instance->defaultLifetime, $instance->namespaceVersion, $instance->versioningIsEnabled, $instance->deferred, $instance->ids, $instance->callbackWrapper, $instance->computing);
        }, $instance, 'Symfony\\Component\\Cache\\Adapter\\AbstractTagAwareAdapter')->__invoke($instance);

        $instance->initializer2e3ea = $initializer;

        return $instance;
    }

    public function __construct($redisClient, string $namespace = '', int $defaultLifetime = 0, ?\Symfony\Component\Cache\Marshaller\MarshallerInterface $marshaller = null)
    {
        static $reflection;

        if (! $this->valueHolder6074b) {
            $reflection = $reflection ?? new \ReflectionClass('Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter');
            $this->valueHolder6074b = $reflection->newInstanceWithoutConstructor();
        unset($this->maxIdLength, $this->logger);

        \Closure::bind(function (\Symfony\Component\Cache\Adapter\RedisTagAwareAdapter $instance) {
            unset($instance->redisEvictionPolicy, $instance->redis, $instance->marshaller);
        }, $this, 'Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter')->__invoke($this);

        \Closure::bind(function (\Symfony\Component\Cache\Adapter\AbstractTagAwareAdapter $instance) {
            unset($instance->namespace, $instance->defaultLifetime, $instance->namespaceVersion, $instance->versioningIsEnabled, $instance->deferred, $instance->ids, $instance->callbackWrapper, $instance->computing);
        }, $this, 'Symfony\\Component\\Cache\\Adapter\\AbstractTagAwareAdapter')->__invoke($this);

        }

        $this->valueHolder6074b->__construct($redisClient, $namespace, $defaultLifetime, $marshaller);
    }

    public function & __get($name)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, '__get', ['name' => $name], $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        if (isset(self::$publicPropertiesec5c2[$name])) {
            return $this->valueHolder6074b->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder6074b;

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

        $targetObject = $this->valueHolder6074b;
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
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        $realInstanceReflection = new \ReflectionClass('Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder6074b;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder6074b;
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
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, '__isset', array('name' => $name), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        $realInstanceReflection = new \ReflectionClass('Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder6074b;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder6074b;
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
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, '__unset', array('name' => $name), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        $realInstanceReflection = new \ReflectionClass('Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder6074b;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder6074b;
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
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, '__clone', array(), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        $this->valueHolder6074b = clone $this->valueHolder6074b;
    }

    public function __sleep()
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, '__sleep', array(), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return array('valueHolder6074b');
    }

    public function __wakeup()
    {
        unset($this->maxIdLength, $this->logger);

        \Closure::bind(function (\Symfony\Component\Cache\Adapter\RedisTagAwareAdapter $instance) {
            unset($instance->redisEvictionPolicy, $instance->redis, $instance->marshaller);
        }, $this, 'Symfony\\Component\\Cache\\Adapter\\RedisTagAwareAdapter')->__invoke($this);

        \Closure::bind(function (\Symfony\Component\Cache\Adapter\AbstractTagAwareAdapter $instance) {
            unset($instance->namespace, $instance->defaultLifetime, $instance->namespaceVersion, $instance->versioningIsEnabled, $instance->deferred, $instance->ids, $instance->callbackWrapper, $instance->computing);
        }, $this, 'Symfony\\Component\\Cache\\Adapter\\AbstractTagAwareAdapter')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer2e3ea = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer2e3ea;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'initializeProxy', array(), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder6074b;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder6074b;
    }

    public function __destruct()
    {
        $this->initializer2e3ea || $this->valueHolder6074b->__destruct();
    }
}

if (!\class_exists('RedisTagAwareAdapter_310208a', false)) {
    \class_alias(__NAMESPACE__.'\\RedisTagAwareAdapter_310208a', 'RedisTagAwareAdapter_310208a', false);
}
