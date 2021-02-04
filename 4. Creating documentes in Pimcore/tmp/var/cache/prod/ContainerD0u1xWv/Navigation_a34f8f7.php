<?php

include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Templating/Helper/HelperInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/symfony/src/Symfony/Component/Templating/Helper/Helper.php';
include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Templating/Helper/Navigation.php';
class Navigation_a34f8f7 extends \Pimcore\Templating\Helper\Navigation implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder194ac = null;
    private $initializer4216a = null;
    private static $publicProperties97668 = [
        
    ];
    public function getName()
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getName', array(), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getName();
    }
    public function buildNavigation(\Pimcore\Model\Document $activeDocument, ?\Pimcore\Model\Document $navigationRootDocument = null, ?string $htmlMenuPrefix = null, ?callable $pageCallback = null, $cache = true, $maxDepth = null, $cacheLifetime = null) : \Pimcore\Navigation\Container
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'buildNavigation', array('activeDocument' => $activeDocument, 'navigationRootDocument' => $navigationRootDocument, 'htmlMenuPrefix' => $htmlMenuPrefix, 'pageCallback' => $pageCallback, 'cache' => $cache, 'maxDepth' => $maxDepth, 'cacheLifetime' => $cacheLifetime), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->buildNavigation($activeDocument, $navigationRootDocument, $htmlMenuPrefix, $pageCallback, $cache, $maxDepth, $cacheLifetime);
    }
    public function build(array $params) : \Pimcore\Navigation\Container
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'build', array('params' => $params), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->build($params);
    }
    public function getRenderer(string $alias) : \Pimcore\Navigation\Renderer\RendererInterface
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getRenderer', array('alias' => $alias), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getRenderer($alias);
    }
    public function render(\Pimcore\Navigation\Container $container, string $rendererName = 'menu', string $renderMethod = 'render', ... $rendererArguments)
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'render', array('container' => $container, 'rendererName' => $rendererName, 'renderMethod' => $renderMethod, 'rendererArguments' => $rendererArguments), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->render($container, $rendererName, $renderMethod, ...$rendererArguments);
    }
    public function __call($method, array $arguments = []) : \Pimcore\Navigation\Renderer\RendererInterface
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, '__call', array('method' => $method, 'arguments' => $arguments), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->__call($method, $arguments);
    }
    public function setCharset($charset)
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'setCharset', array('charset' => $charset), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->setCharset($charset);
    }
    public function getCharset()
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getCharset', array(), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getCharset();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance = $reflection->newInstanceWithoutConstructor();
        unset($instance->charset);
        \Closure::bind(function (\Pimcore\Templating\Helper\Navigation $instance) {
            unset($instance->builder, $instance->rendererLocator);
        }, $instance, 'Pimcore\\Templating\\Helper\\Navigation')->__invoke($instance);
        $instance->initializer4216a = $initializer;
        return $instance;
    }
    public function __construct(\Pimcore\Navigation\Builder $builder, \Psr\Container\ContainerInterface $rendererLocator)
    {
        static $reflection;
        if (! $this->valueHolder194ac) {
            $reflection = $reflection ?? new \ReflectionClass('Pimcore\\Templating\\Helper\\Navigation');
            $this->valueHolder194ac = $reflection->newInstanceWithoutConstructor();
        unset($this->charset);
        \Closure::bind(function (\Pimcore\Templating\Helper\Navigation $instance) {
            unset($instance->builder, $instance->rendererLocator);
        }, $this, 'Pimcore\\Templating\\Helper\\Navigation')->__invoke($this);
        }
        $this->valueHolder194ac->__construct($builder, $rendererLocator);
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
        unset($this->charset);
        \Closure::bind(function (\Pimcore\Templating\Helper\Navigation $instance) {
            unset($instance->builder, $instance->rendererLocator);
        }, $this, 'Pimcore\\Templating\\Helper\\Navigation')->__invoke($this);
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
