# Bundle Developer's Guide

Since Pimcore utilizes the powerful Symfony Bundle system, let us refer to the [Symfony Bundle Documentation](http://symfony.com/doc/3.4/bundles.html) on how
to get started with your custom bundles. A bundle can do anything - in fact, core Pimcore functionalities like the admin
interface are implemented as bundle. From within your bundle, you have all possibilities to extend the system, from
defining new services or routes to hook into the event system or provide controllers and views.


## Bundle Directory Structure

See [Bundle Directory Structure](http://symfony.com/doc/3.4/bundles.html#bundle-directory-structure) for a standard
bundle directory layout.


## Pimcore Bundles

There is a special kind of bundle implementing `Pimcore\Extension\Bundle\PimcoreBundleInterface` which gives you additional
possibilities. These bundles provide a similar API as plugins did in previous versions:

* The bundle shows up in the extension manager and can be enabled/disabled from there. Normal bundles need to be registered
  via code in your `AppKernel.php`.
* In the extension manager, you're able to trigger installation/uninstallation of bundles, for example to install/update 
  database structure.
* The bundle adds methods to natively register JS and CSS files to be loaded with the admin interface and in editmode. 

See the [Pimcore Bundles](./05_Pimcore_Bundles) documentation to getting started with Pimcore bundles.

### Generating Pimcore Bundles

With [SensioGeneratorBundle](http://symfony.com/doc/3.4/bundles/SensioGeneratorBundle/index.html) there's already a
great bundle which facilitates creation of new bundles. Pimcore extends the `SensioGeneratorBundle` and  adds a
`PimcoreGeneratorBundle` which provides commands to build Pimcore specific code. At the moment, it provides a single
command which can be used to generate new Pimcore Bundles:
 
```
# generate bundle interactively
$ bin/console pimcore:generate:bundle

# if the command is not available, make sure you are running the console in dev environment (see note below)
$ bin/console pimcore:generate:bundle --env=dev

# generate bundle with a given name and don't ask questions
$ bin/console pimcore:generate:bundle --namespace=Acme/FooBundle --no-interaction
```

> The `pimcore:generate:bundle` command is only available in the `dev` environment by default as the generator bundle is 
  not loaded in the `prod` environment. If you need the generator bundle in another environment than `dev` please load it
  manually in your `AppKernel`.

## Common tasks

Below is a list of common tasks and how to achieve them inside your bundles. 

### Service configuration

If you want to provide custom services from within your bundle, you need to create an `Extension` which is able to load
your service definitions. This is covered in detail in the [Extensions Documentation](http://symfony.com/doc/3.4/bundles/extension.html).

An example how to create an extension for your bundles can be found in
[Loading Service Definitions](./01_Loading_Service_Definitions.md).


### Auto loading config and routing definitions

Bundles can provide config and routing definitions in `Resources/config/pimcore` which will be automatically loaded with
the bundle. See [Auto loading config and routing definitions](./03_Auto_Loading_Config_And_Routing_Definitions.md) for
more information.


### i18n / Translations

See the [Symfony Translation Component Documentation](http://symfony.com/doc/3.4/translation.html#translation-resource-file-names-and-locations)
for locations which will be automatically searched for translation files.

For bundles, translations should be stored in the `Resources/translations/` directory of the bundle in the format `locale.loader`
(or `domain.locale.loader` if you want to handle a specific translation domain). For the most cases this will be something
like `Resources/translations/en.yml`, which resolves to the default `messages` translation domain.


### Security / Authentication

You can make full use of the [Symfony Security Component](http://symfony.com/doc/3.4/security.html) by auto loading
the security configuration as documented above. Best practice is to define the security configuration in a dedicated
`security.yml` which can be imported from your bundle's `config.yml`.

For further details on security please refer to [Security](../../19_Development_Tools_and_Details/10_Security_Authentication/README.md).


### Events

To hook into core functions you can attach to any event provided by the [Pimcore event manager](../11_Event_API_and_Event_Manager.md).
Custom listeners can be registered from your bundle by defining an event listener service. Further reading:
 
* [Symfony Event Dispatcher](http://symfony.com/doc/3.4/event_dispatcher.html) for documentation how to create event
   listeners and how to register them as a service
* [Pimcore Event Manager](../11_Event_API_and_Event_Manager.md) for a list of available events


### Local Storage for your Bundle

Sometimes a bundle needs to save files (e.g. generated files or cached data, ...). If the data is temporary and should be
removed when the Symfony cache is cleared, please use a directory inside the cache directory. The core cache directory can
be fetched from the `Kernel` and is registered as parameter on the container:

* `$kernel->getCacheDir()`
* `%kernel.cache_dir%` parameter

If you need persistent storage, create a unique directory in `PIMCORE_PRIVATE_VAR`, e.g. `var/bundles/YourBundleName`.

### Extending the Admin UI

The following section explains how to design and structure bundles and how to register for and utilize the events provided
in the PHP backend and the Ext JS frontend: [Plugin_Backend_UI](./06_Plugin_Backend_UI.md)

### Adding Document Editables

See [Adding Document Editables](./09_Adding_Document_Editables.md)
