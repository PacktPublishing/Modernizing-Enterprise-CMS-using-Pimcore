<?php

namespace ContainerRWbhxvk;
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Model/PersisterInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Model/Persister/DoctrinePersister.php';

class DoctrinePersister_a694024 extends \Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister|null wrapped object, if the proxy is initialized
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

    public function persist($user) : void
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'persist', array('user' => $user), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        $this->valueHolder13cb8->persist($user);
return;
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

        \Closure::bind(function (\Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister $instance) {
            unset($instance->om);
        }, $instance, 'Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister')->__invoke($instance);

        $instance->initializer29583 = $initializer;

        return $instance;
    }

    public function __construct($om)
    {
        static $reflection;

        if (! $this->valueHolder13cb8) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');
            $this->valueHolder13cb8 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister $instance) {
            unset($instance->om);
        }, $this, 'Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister')->__invoke($this);

        }

        $this->valueHolder13cb8->__construct($om);
    }

    public function & __get($name)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, '__get', ['name' => $name], $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        if (isset(self::$publicProperties1bf39[$name])) {
            return $this->valueHolder13cb8->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');

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

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');

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

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');

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

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');

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
        \Closure::bind(function (\Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister $instance) {
            unset($instance->om);
        }, $this, 'Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister')->__invoke($this);
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
}

if (!\class_exists('DoctrinePersister_a694024', false)) {
    \class_alias(__NAMESPACE__.'\\DoctrinePersister_a694024', 'DoctrinePersister_a694024', false);
}
