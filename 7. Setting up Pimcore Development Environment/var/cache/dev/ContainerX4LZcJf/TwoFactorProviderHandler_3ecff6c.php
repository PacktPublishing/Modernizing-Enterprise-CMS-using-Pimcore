<?php

namespace ContainerX4LZcJf;
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Handler/AuthenticationHandlerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Handler/TwoFactorProviderHandler.php';

class TwoFactorProviderHandler_3ecff6c extends \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler|null wrapped object, if the proxy is initialized
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

    public function beginTwoFactorAuthentication(\Scheb\TwoFactorBundle\Security\TwoFactor\AuthenticationContextInterface $context) : \Symfony\Component\Security\Core\Authentication\Token\TokenInterface
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'beginTwoFactorAuthentication', array('context' => $context), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->beginTwoFactorAuthentication($context);
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

        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler $instance) {
            unset($instance->providerRegistry, $instance->twoFactorTokenFactory);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler')->__invoke($instance);

        $instance->initializer2e3ea = $initializer;

        return $instance;
    }

    public function __construct(\Scheb\TwoFactorBundle\Security\TwoFactor\Provider\TwoFactorProviderRegistry $providerRegistry, \Scheb\TwoFactorBundle\Security\Authentication\Token\TwoFactorTokenFactoryInterface $twoFactorTokenFactory)
    {
        static $reflection;

        if (! $this->valueHolder6074b) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');
            $this->valueHolder6074b = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler $instance) {
            unset($instance->providerRegistry, $instance->twoFactorTokenFactory);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler')->__invoke($this);

        }

        $this->valueHolder6074b->__construct($providerRegistry, $twoFactorTokenFactory);
    }

    public function & __get($name)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, '__get', ['name' => $name], $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        if (isset(self::$publicPropertiesec5c2[$name])) {
            return $this->valueHolder6074b->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');

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

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');

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

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');

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

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');

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
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler $instance) {
            unset($instance->providerRegistry, $instance->twoFactorTokenFactory);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler')->__invoke($this);
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
}

if (!\class_exists('TwoFactorProviderHandler_3ecff6c', false)) {
    \class_alias(__NAMESPACE__.'\\TwoFactorProviderHandler_3ecff6c', 'TwoFactorProviderHandler_3ecff6c', false);
}
