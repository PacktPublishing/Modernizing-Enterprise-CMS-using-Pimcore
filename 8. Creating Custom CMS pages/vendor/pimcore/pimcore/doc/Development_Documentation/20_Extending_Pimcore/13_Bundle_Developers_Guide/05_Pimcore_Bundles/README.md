# Pimcore Bundles

Pimcore bundles follow the same rules as normal bundles, but need to implement `Pimcore\Extension\Bundle\PimcoreBundleInterface`
in order to show up in the extension manager. This gives you the following possibilities:

* The bundle shows up in the extension manager and can be enabled/disabled from there. Normal bundles need to be registered
  via code in your `AppKernel.php`.
* In the extension manager, you're able to trigger installation/uninstallation of bundles, for example to install/update 
  database structure.
* The bundle adds methods to natively register JS and CSS files to be loaded with the admin interface and in editmode. 

To get started quickly, you can extend `Pimcore\Extension\Bundle\AbstractPimcoreBundle` which already implements all methods
defined by the interface. Besides name, description and version as shown in the extension manager, the interface defines the following methods you
can use to configure your bundle:

```php
interface PimcoreBundleInterface extends BundleInterface
{
    // name, description, version, ...

    /**
     * If the bundle has an installation routine, an installer is responsible of handling installation related tasks
     *
     * @return InstallerInterface|null
     */
    public function getInstaller();

    /**
     * Get path to include in admin iframe
     *
     * @return string|RouteReferenceInterface|null
     */
    public function getAdminIframePath();

    /**
     * Get javascripts to include in admin interface
     *
     * @return string[]|RouteReferenceInterface[]
     */
    public function getJsPaths();

    /**
     * Get stylesheets to include in admin interface
     *
     * @return string[]|RouteReferenceInterface[]
     */
    public function getCssPaths();

    /**
     * Get javascripts to include in editmode
     *
     * @return string[]|RouteReferenceInterface[]
     */
    public function getEditmodeJsPaths();

    /**
     * Get stylesheets to include in editmode
     *
     * @return string[]|RouteReferenceInterface[]
     */
    public function getEditmodeCssPaths();
}
```

## Installer

By default, a Pimcore bundle does not define any installation or update routines, but you can use the `getInstaller()` method
to return an instance of a `Pimcore\Extension\Bundle\Installer\InstallerInterface`. If a bundle returns an installer instance,
this installer will be used by the extension manager to allow installation/uninstallation.

The `install` method can be used to create database tables and do other initial tasks. The `uninstall` method should make
sure to undo all these things. The installer is also the right place to check for requirements such as minimum Pimcore
version or read/write permissions on the filesystem.

Read more in [Installers](./01_Installers.md).

## Registration to extension manager

To make use of the installer, a bundle needs to be managed through the extension manager and not manually registered on
the `AppKernel` as normal bundles. As the extension manager needs to find the bundles it can manage, a Pimcore bundle needs
to fulfill the following requirements:

  * Implement the `PimcoreBundleInterface`
  * Located in a directory which is scanned for Pimcore bundles. This is configured in the `pimcore.bundles.search_paths`
    configuration and defaults to `src/`
    
If you add a new bundle to `src/YourBundleName/YourBundleName.php` and it implements the interface, it should be automatically
shown in the extension manager.

### Composer bundles

If you provide your bundle via composer, it won't be automatically found. To include your package directory to the list 
of scanned paths, please set the package type of your package to `pimcore-bundle`. Additionally, if you set the specific
bundle name through the `pimcore.bundles` composer extra config no filesystem scanning will be done which will have a
positive effect on the bundle lookup performance.

> Whenever you can, you should explicitly set the bundle class name through the extra config.

An example of a `composer.json` defining a Pimcore bundle:

```json
{
    "name": "myVendor/myBundleName",
    "type": "pimcore-bundle",
    "autoload": {
        "psr-4": {
            "MyBundleName\\": ""
        }
    },
    "extra": {
        "pimcore": {
            "bundles": [
                "MyBundleName\\MyBundleName"
            ]
        }
    }
}
```

#### Returning the composer package version in extension manager

If you provide your bundle as composer package, you'll probably want to show the composer version of your bundle in the
extension manager grid. As pimcore includes the [ocramius/package-versions](https://github.com/Ocramius/PackageVersions)
library which generates a list of package versions installed via composer you can easily use that library to return the 
installed version of your bundle.

Pimcore provides a `Pimcore\Extension\Bundle\Traits\PackageVersionTrait` which you can include in your bundle. All you need
to do is to implement a `getComposerPackageName` method returning the name of your composer package (e.g. `company/foo-bundle`):


```php
<?php

declare(strict_types=1);

namespace Company\FooBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;

class FooBundle extends AbstractPimcoreBundle
{
    use PackageVersionTrait;

    protected function getComposerPackageName(): string
    {
        // getVersion() will use this name to read the version from
        // PackageVersions and return a normalized value
        return 'company/foo-bundle';
    }
}
```
