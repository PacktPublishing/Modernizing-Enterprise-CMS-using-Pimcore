<?php

include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/ExtensionInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/AbstractExtension.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Twig/Extension/SubrequestExtension.php';
class SubrequestExtension_ac4dffd extends \Pimcore\Twig\Extension\SubrequestExtension implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder194ac = null;
    private $initializer4216a = null;
    private static $publicProperties97668 = [
        
    ];
    public function getFunctions()
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getFunctions', array(), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getFunctions();
    }
    public function getTokenParsers()
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getTokenParsers', array(), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getTokenParsers();
    }
    public function getNodeVisitors()
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getNodeVisitors', array(), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getNodeVisitors();
    }
    public function getFilters()
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getFilters', array(), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getFilters();
    }
    public function getTests()
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getTests', array(), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getTests();
    }
    public function getOperators()
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getOperators', array(), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getOperators();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance = $reflection->newInstanceWithoutConstructor();
        unset($instance->incHelper, $instance->actionHelper);
        $instance->initializer4216a = $initializer;
        return $instance;
    }
    public function __construct(\Pimcore\Templating\Helper\Inc $incHelper, \Pimcore\Templating\Helper\Action $actionHelper)
    {
        static $reflection;
        if (! $this->valueHolder194ac) {
            $reflection = $reflection ?? new \ReflectionClass('Pimcore\\Twig\\Extension\\SubrequestExtension');
            $this->valueHolder194ac = $reflection->newInstanceWithoutConstructor();
        unset($this->incHelper, $this->actionHelper);
        }
        $this->valueHolder194ac->__construct($incHelper, $actionHelper);
    }
    public function & __get($name)
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, '__get', ['name' => $name], $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        if (isset(self::$publicProperties97668[$name])) {
            return $this->valueHolder194ac->$name;
        }
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder194ac;
            $backtrace = debug_backtrace(false);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    get_parent_class($this),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
            return;
        }
        $targetObject = $this->valueHolder194ac;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder194ac;
            return $targetObject->$name = $value;
            return;
        }
        $targetObject = $this->valueHolder194ac;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, '__isset', array('name' => $name), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder194ac;
            return isset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder194ac;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, '__unset', array('name' => $name), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder194ac;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder194ac;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __clone()
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, '__clone', array(), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        $this->valueHolder194ac = clone $this->valueHolder194ac;
    }
    public function __sleep()
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, '__sleep', array(), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return array('valueHolder194ac');
    }
    public function __wakeup()
    {
        unset($this->incHelper, $this->actionHelper);
    }
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer4216a = $initializer;
    }
    public function getProxyInitializer()
    {
        return $this->initializer4216a;
    }
    public function initializeProxy() : bool
    {
        return $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'initializeProxy', array(), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder194ac;
    }
    public function getWrappedValueHolderValue() : ?object
    {
        return $this->valueHolder194ac;
    }
}
