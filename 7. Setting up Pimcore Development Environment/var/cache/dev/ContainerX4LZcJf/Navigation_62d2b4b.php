<?php

namespace ContainerX4LZcJf;
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Twig/Extension/Templating/Navigation.php';

class Navigation_62d2b4b extends \Pimcore\Twig\Extension\Templating\Navigation implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Pimcore\Twig\Extension\Templating\Navigation|null wrapped object, if the proxy is initialized
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

    public function build(array $params) : \Pimcore\Navigation\Container
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'build', array('params' => $params), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->build($params);
    }

    public function getRenderer(string $alias) : \Pimcore\Navigation\Renderer\RendererInterface
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'getRenderer', array('alias' => $alias), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->getRenderer($alias);
    }

    public function render(\Pimcore\Navigation\Container $container, string $rendererName = 'menu', string $renderMethod = 'render', ... $rendererArguments)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'render', array('container' => $container, 'rendererName' => $rendererName, 'renderMethod' => $renderMethod, 'rendererArguments' => $rendererArguments), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->render($container, $rendererName, $renderMethod, ...$rendererArguments);
    }

    public function __call($method, array $arguments = []) : \Pimcore\Navigation\Renderer\RendererInterface
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, '__call', array('method' => $method, 'arguments' => $arguments), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->__call($method, $arguments);
    }

    public function setCharset(string $charset)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'setCharset', array('charset' => $charset), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->setCharset($charset);
    }

    public function getCharset()
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, 'getCharset', array(), $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        return $this->valueHolder6074b->getCharset();
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

        unset($instance->charset);

        \Closure::bind(function (\Pimcore\Twig\Extension\Templating\Navigation $instance) {
            unset($instance->builder, $instance->rendererLocator);
        }, $instance, 'Pimcore\\Twig\\Extension\\Templating\\Navigation')->__invoke($instance);

        $instance->initializer2e3ea = $initializer;

        return $instance;
    }

    public function __construct(\Pimcore\Navigation\Builder $builder, \Psr\Container\ContainerInterface $rendererLocator)
    {
        static $reflection;

        if (! $this->valueHolder6074b) {
            $reflection = $reflection ?? new \ReflectionClass('Pimcore\\Twig\\Extension\\Templating\\Navigation');
            $this->valueHolder6074b = $reflection->newInstanceWithoutConstructor();
        unset($this->charset);

        \Closure::bind(function (\Pimcore\Twig\Extension\Templating\Navigation $instance) {
            unset($instance->builder, $instance->rendererLocator);
        }, $this, 'Pimcore\\Twig\\Extension\\Templating\\Navigation')->__invoke($this);

        }

        $this->valueHolder6074b->__construct($builder, $rendererLocator);
    }

    public function & __get($name)
    {
        $this->initializer2e3ea && ($this->initializer2e3ea->__invoke($valueHolder6074b, $this, '__get', ['name' => $name], $this->initializer2e3ea) || 1) && $this->valueHolder6074b = $valueHolder6074b;

        if (isset(self::$publicPropertiesec5c2[$name])) {
            return $this->valueHolder6074b->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Pimcore\\Twig\\Extension\\Templating\\Navigation');

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

        $realInstanceReflection = new \ReflectionClass('Pimcore\\Twig\\Extension\\Templating\\Navigation');

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

        $realInstanceReflection = new \ReflectionClass('Pimcore\\Twig\\Extension\\Templating\\Navigation');

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

        $realInstanceReflection = new \ReflectionClass('Pimcore\\Twig\\Extension\\Templating\\Navigation');

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
        unset($this->charset);

        \Closure::bind(function (\Pimcore\Twig\Extension\Templating\Navigation $instance) {
            unset($instance->builder, $instance->rendererLocator);
        }, $this, 'Pimcore\\Twig\\Extension\\Templating\\Navigation')->__invoke($this);
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

if (!\class_exists('Navigation_62d2b4b', false)) {
    \class_alias(__NAMESPACE__.'\\Navigation_62d2b4b', 'Navigation_62d2b4b', false);
}
