<?php

namespace ContainerRWbhxvk;
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Twig/Extension/SubrequestExtension.php';

class SubrequestExtension_ac4dffd extends \Pimcore\Twig\Extension\SubrequestExtension implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Pimcore\Twig\Extension\SubrequestExtension|null wrapped object, if the proxy is initialized
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

    public function getFunctions()
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'getFunctions', array(), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->getFunctions();
    }

    public function getTokenParsers()
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'getTokenParsers', array(), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->getTokenParsers();
    }

    public function getNodeVisitors()
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'getNodeVisitors', array(), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->getNodeVisitors();
    }

    public function getFilters()
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'getFilters', array(), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->getFilters();
    }

    public function getTests()
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'getTests', array(), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->getTests();
    }

    public function getOperators()
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'getOperators', array(), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->getOperators();
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

        unset($instance->incHelper);

        $instance->initializer29583 = $initializer;

        return $instance;
    }

    public function __construct(\Pimcore\Twig\Extension\Templating\Inc $incHelper)
    {
        static $reflection;

        if (! $this->valueHolder13cb8) {
            $reflection = $reflection ?? new \ReflectionClass('Pimcore\\Twig\\Extension\\SubrequestExtension');
            $this->valueHolder13cb8 = $reflection->newInstanceWithoutConstructor();
        unset($this->incHelper);

        }

        $this->valueHolder13cb8->__construct($incHelper);
    }

    public function & __get($name)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, '__get', ['name' => $name], $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        if (isset(self::$publicProperties1bf39[$name])) {
            return $this->valueHolder13cb8->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Pimcore\\Twig\\Extension\\SubrequestExtension');

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

        $realInstanceReflection = new \ReflectionClass('Pimcore\\Twig\\Extension\\SubrequestExtension');

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

        $realInstanceReflection = new \ReflectionClass('Pimcore\\Twig\\Extension\\SubrequestExtension');

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

        $realInstanceReflection = new \ReflectionClass('Pimcore\\Twig\\Extension\\SubrequestExtension');

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
        unset($this->incHelper);
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

if (!\class_exists('SubrequestExtension_ac4dffd', false)) {
    \class_alias(__NAMESPACE__.'\\SubrequestExtension_ac4dffd', 'SubrequestExtension_ac4dffd', false);
}
