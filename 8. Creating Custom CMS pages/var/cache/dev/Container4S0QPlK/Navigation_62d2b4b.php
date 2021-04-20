<?php

namespace Container4S0QPlK;
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Twig/Extension/Templating/Navigation.php';

class Navigation_62d2b4b extends \Pimcore\Twig\Extension\Templating\Navigation implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Pimcore\Twig\Extension\Templating\Navigation|null wrapped object, if the proxy is initialized
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

    public function build(array $params) : \Pimcore\Navigation\Container
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'build', array('params' => $params), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->build($params);
    }

    public function getRenderer(string $alias) : \Pimcore\Navigation\Renderer\RendererInterface
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'getRenderer', array('alias' => $alias), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->getRenderer($alias);
    }

    public function render(\Pimcore\Navigation\Container $container, string $rendererName = 'menu', string $renderMethod = 'render', ... $rendererArguments)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'render', array('container' => $container, 'rendererName' => $rendererName, 'renderMethod' => $renderMethod, 'rendererArguments' => $rendererArguments), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->render($container, $rendererName, $renderMethod, ...$rendererArguments);
    }

    public function __call($method, array $arguments = []) : \Pimcore\Navigation\Renderer\RendererInterface
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, '__call', array('method' => $method, 'arguments' => $arguments), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->__call($method, $arguments);
    }

    public function setCharset(string $charset)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'setCharset', array('charset' => $charset), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->setCharset($charset);
    }

    public function getCharset()
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, 'getCharset', array(), $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        return $this->valueHolder13cb8->getCharset();
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

        $instance->initializer29583 = $initializer;

        return $instance;
    }

    public function __construct(\Pimcore\Navigation\Builder $builder, \Psr\Container\ContainerInterface $rendererLocator)
    {
        static $reflection;

        if (! $this->valueHolder13cb8) {
            $reflection = $reflection ?? new \ReflectionClass('Pimcore\\Twig\\Extension\\Templating\\Navigation');
            $this->valueHolder13cb8 = $reflection->newInstanceWithoutConstructor();
        unset($this->charset);

        \Closure::bind(function (\Pimcore\Twig\Extension\Templating\Navigation $instance) {
            unset($instance->builder, $instance->rendererLocator);
        }, $this, 'Pimcore\\Twig\\Extension\\Templating\\Navigation')->__invoke($this);

        }

        $this->valueHolder13cb8->__construct($builder, $rendererLocator);
    }

    public function & __get($name)
    {
        $this->initializer29583 && ($this->initializer29583->__invoke($valueHolder13cb8, $this, '__get', ['name' => $name], $this->initializer29583) || 1) && $this->valueHolder13cb8 = $valueHolder13cb8;

        if (isset(self::$publicProperties1bf39[$name])) {
            return $this->valueHolder13cb8->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Pimcore\\Twig\\Extension\\Templating\\Navigation');

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

        $realInstanceReflection = new \ReflectionClass('Pimcore\\Twig\\Extension\\Templating\\Navigation');

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

        $realInstanceReflection = new \ReflectionClass('Pimcore\\Twig\\Extension\\Templating\\Navigation');

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

        $realInstanceReflection = new \ReflectionClass('Pimcore\\Twig\\Extension\\Templating\\Navigation');

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
        unset($this->charset);

        \Closure::bind(function (\Pimcore\Twig\Extension\Templating\Navigation $instance) {
            unset($instance->builder, $instance->rendererLocator);
        }, $this, 'Pimcore\\Twig\\Extension\\Templating\\Navigation')->__invoke($this);
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

if (!\class_exists('Navigation_62d2b4b', false)) {
    \class_alias(__NAMESPACE__.'\\Navigation_62d2b4b', 'Navigation_62d2b4b', false);
}
