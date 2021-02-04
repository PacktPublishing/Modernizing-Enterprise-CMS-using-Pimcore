<?php

include_once \dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Security/TwoFactor/Provider/TwoFactorFormRendererInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/two-factor-bundle/Security/TwoFactor/Provider/DefaultTwoFactorFormRenderer.php';
class DefaultTwoFactorFormRenderer_892ae3f extends \Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder194ac = null;
    private $initializer4216a = null;
    private static $publicProperties97668 = [
        
    ];
    public function renderForm(\Symfony\Component\HttpFoundation\Request $request, array $templateVars) : \Symfony\Component\HttpFoundation\Response
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'renderForm', array('request' => $request, 'templateVars' => $templateVars), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->renderForm($request, $templateVars);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer $instance) {
            unset($instance->twigEnvironment, $instance->template);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer')->__invoke($instance);
        $instance->initializer4216a = $initializer;
        return $instance;
    }
    public function __construct(\Twig\Environment $twigRenderer, string $template)
    {
        static $reflection;
        if (! $this->valueHolder194ac) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer');
            $this->valueHolder194ac = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer $instance) {
            unset($instance->twigEnvironment, $instance->template);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer')->__invoke($this);
        }
        $this->valueHolder194ac->__construct($twigRenderer, $template);
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
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer $instance) {
            unset($instance->twigEnvironment, $instance->template);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer')->__invoke($this);
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
