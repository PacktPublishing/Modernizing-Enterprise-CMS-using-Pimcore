<?php

include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Migrations/MigrationManager.php';
class MigrationManager_012d3a8 extends \Pimcore\Migrations\MigrationManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder194ac = null;
    private $initializer4216a = null;
    private static $publicProperties97668 = [
        
    ];
    public function getConfiguration(string $migrationSet) : \Pimcore\Migrations\Configuration\Configuration
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getConfiguration', array('migrationSet' => $migrationSet), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getConfiguration($migrationSet);
    }
    public function getVersion(string $migrationSet, string $versionId) : \Doctrine\DBAL\Migrations\Version
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getVersion', array('migrationSet' => $migrationSet, 'versionId' => $versionId), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getVersion($migrationSet, $versionId);
    }
    public function getBundleConfiguration(\Symfony\Component\HttpKernel\Bundle\BundleInterface $bundle) : \Pimcore\Migrations\Configuration\Configuration
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getBundleConfiguration', array('bundle' => $bundle), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getBundleConfiguration($bundle);
    }
    public function getBundleVersion(\Symfony\Component\HttpKernel\Bundle\BundleInterface $bundle, string $versionId) : \Doctrine\DBAL\Migrations\Version
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getBundleVersion', array('bundle' => $bundle, 'versionId' => $versionId), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getBundleVersion($bundle, $versionId);
    }
    public function getInstallConfiguration(\Pimcore\Migrations\Configuration\Configuration $configuration, \Pimcore\Extension\Bundle\Installer\MigrationInstallerInterface $installer) : \Pimcore\Migrations\Configuration\InstallConfiguration
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'getInstallConfiguration', array('configuration' => $configuration, 'installer' => $installer), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->getInstallConfiguration($configuration, $installer);
    }
    public function executeVersion(\Doctrine\DBAL\Migrations\Version $version, bool $up = true, bool $dryRun = false) : array
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'executeVersion', array('version' => $version, 'up' => $up, 'dryRun' => $dryRun), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->executeVersion($version, $up, $dryRun);
    }
    public function markVersionAsMigrated(\Doctrine\DBAL\Migrations\Version $version, bool $includePrevious = true)
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'markVersionAsMigrated', array('version' => $version, 'includePrevious' => $includePrevious), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->markVersionAsMigrated($version, $includePrevious);
    }
    public function markVersionAsNotMigrated(\Doctrine\DBAL\Migrations\Version $version)
    {
        $this->initializer4216a && ($this->initializer4216a->__invoke($valueHolder194ac, $this, 'markVersionAsNotMigrated', array('version' => $version), $this->initializer4216a) || 1) && $this->valueHolder194ac = $valueHolder194ac;
        return $this->valueHolder194ac->markVersionAsNotMigrated($version);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Pimcore\Migrations\MigrationManager $instance) {
            unset($instance->connection, $instance->configurationFactory);
        }, $instance, 'Pimcore\\Migrations\\MigrationManager')->__invoke($instance);
        $instance->initializer4216a = $initializer;
        return $instance;
    }
    public function __construct(\Pimcore\Db\ConnectionInterface $connection, \Pimcore\Migrations\Configuration\ConfigurationFactory $configurationFactory)
    {
        static $reflection;
        if (! $this->valueHolder194ac) {
            $reflection = $reflection ?? new \ReflectionClass('Pimcore\\Migrations\\MigrationManager');
            $this->valueHolder194ac = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Pimcore\Migrations\MigrationManager $instance) {
            unset($instance->connection, $instance->configurationFactory);
        }, $this, 'Pimcore\\Migrations\\MigrationManager')->__invoke($this);
        }
        $this->valueHolder194ac->__construct($connection, $configurationFactory);
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
        \Closure::bind(function (\Pimcore\Migrations\MigrationManager $instance) {
            unset($instance->connection, $instance->configurationFactory);
        }, $this, 'Pimcore\\Migrations\\MigrationManager')->__invoke($this);
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
