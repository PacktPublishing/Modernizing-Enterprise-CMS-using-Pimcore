# Plugin Backend UI

## General

The Pimcore Backend UI is based upon the [Ext JS](https://www.sencha.com/products/extjs/#overview) Framework. A plugin can
add Ext components to the user interface or execute any other JavaScript required in the plugin context.

All JavaScript and CSS which should be included, needs to be defined in your bundle class, as described in 
[Pimcore Bundles](./05_Pimcore_Bundles). 

Alternatively, you can setup this via an Eventlistener:

```yaml
services:
  # adds additional static files to admin backend
  AppBundle\EventListener\PimcoreAdminListener:
    tags:
      - { name: kernel.event_listener, event: pimcore.bundle_manager.paths.css, method: addCSSFiles }
      - { name: kernel.event_listener, event: pimcore.bundle_manager.paths.js, method: addJSFiles }
```

```php
<?php
namespace AppBundle\EventListener;

use Pimcore\Event\BundleManager\PathsEvent;

class PimcoreAdminListener
{
    public function addCSSFiles(PathsEvent $event)
    {
        $event->setPaths(
            array_merge(
                $event->getPaths(),
                [
                    '/admin-static/css/admin-style.css'
                ]
            )
        );
    }

    public function addJSFiles(PathsEvent $event)
    {
        $event->setPaths(
            array_merge(
                $event->getPaths(),
                [
                    '/admin-static/js/startup.js'
                ]
            )
        );
    }
}
```


These scripts are loaded last upon Pimcore startup. They are loaded in the same order as specified in the bundle class.

Starting point for javascript development is the javascript plugin class (`plugin.js`). An instance of this class 
needs to be registered as a plugin at the plugin broker, which notifies all registered plugins upon certain events.

A plugin class must extend `pimcore.plugin.admin` and can override all methods defined there. 

A simple plugin class can look as follows: 
```javascript
pimcore.registerNS("pimcore.plugin.sample");

pimcore.plugin.sample = Class.create(pimcore.plugin.admin, {
    getClassName: function() {
        return "pimcore.plugin.sample";
    },

    initialize: function() {
        pimcore.plugin.broker.registerPlugin(this);
    },
 
    pimcoreReady: function (params,broker){
        // alert("Sample Plugin Ready!");
    }
});

var samplePlugin = new pimcore.plugin.sample();
```

## JavaScript UI Events

The broker then will notify each plugin upon the events described below. For registering to these events just add a 
corresponding method to the javascript plugin class. 

| Name                                 | Description                                                                                                     | Notes    |
|--------------------------------------|-----------------------------------------------------------------------------------------------------------------|----------|
| uninstall                            | is called when the corresponding plugin is uninstalled via Pimcore backend UI                                   |          |
| pimcoreReady                         | Pimcore backend UI is loaded, viewport is passed as parameter                                                   |          |
| preOpenAsset                         | before asset is opened, asset and type are passed as parameters                                                 |          |
| postOpenAsset                        | after asset is opened, asset and type are passed as parameters                                                  |          |
| preSaveAsset                         | before asset is saved, asset id is passed as parameter                                                          |          |
| postSaveAsset                        | after asset is saved, asset id is passed as parameter                                                           |          |
| preOpenDocument                      | before document is opened, document and type are passed as parameters                                           |          |
| postOpenDocument                     | after document is opened, document and type are passed as parameters                                            |          |
| preSaveDocument                      | before document is saved, document, type, task and onlySaveVersion are passed as parameters                     |          |
| postSaveDocument                     | after document is saved, document, type, task and onlySaveVersion are passed as parameters                      |          |
| postAddDocumentTree                  | after the document is successfully created in the tree, document id is passed as parameter                      |          |
| preOpenObject                        | before object is opened, object and type are passed as parameters                                               |          |
| postOpenObject                       | after object is opened, object and type are passed as parameters                                                |          |
| preSaveObject                        | before object is saved, object and type are passed as parameters                                                |          |
| postSaveObject                       | after object is saved, object is passed as parameter                                                            |          |
| postAddObjectTree                    | after the object is successfully created in the tree, object id is passed as parameter                          |          |
| preCreateMenuOption                  | called before navigation menu is created                                                                         |          |
| preCreateAssetMetadataEditor         | fired when asset metadata editor tab is created                                                                 | internal |
| prepareAssetMetadataGridConfigurator | before opening the grid config dialog, url returning the metadata definitions is passed as parameter            |          |
| prepareAssetTreeContextMenu          | before context menu is opened, menu, tree class and asset record are passed as parameters                       |          |
| prepareObjectTreeContextMenu         | before context menu is opened, menu, tree class and object record are passed as parameters                      |          |
| prepareDocumentTreeContextMenu       | before context menu is opened, menu, tree and document record are passed as parameters                          |          |
| prepareClassLayoutContextMenu        | before context menu is opened, allowedTypes array is passed as parameters                                       |          |
| prepareOnRowContextmenu              | before context menu is opened object folder grid, menu, folder class and object record are passed as parameters |          |

Uninstall is called after plugin has been uninstalled - this hook can be used to remove plugin features from the UI 
after uninstall.
 
**Note:** In order to be notified upon uninstall, a plugin must override the `getClassName` method of `pimcore.plugin.admin` 
and return its own class name. 

## Validate Pimcore Object's Data in frontend before saving

It is possible to validate Pimcore Object's Data in frontend and cancel the saving if needed.

This can be done by throwing any of the following two exceptions and passing in the message to be displayed for the user:

```
pimcore.error.ActionCancelledException
pimcore.error.ValidationCancelledException
```


The only difference between above exceptions is in how the error message is displayed:

- ValidationException displays error alert (the same as ValidationException coming from the backend)

  ![Validation Exception](../../img/object-validation-exception.png)

- ActionCancelledException displays instead just a non intrusive notification in the bottom right corner.

  ![Action Cancelled Exception](../../img/object-action-cancelled-exception.png)

Code example in startup.js:

```
pimcore.registerNS("pimcore.plugin.MyTestBundle");

pimcore.plugin.MyTestBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.MyTestBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    preSaveObject: function (object, type) {
        var userAnswer = confirm("Are you sure you want to save " + object.data.general.o_className + "?");
        if (!userAnswer) {
            throw new pimcore.error.ActionCancelledException('Cancelled by user');
        }
    }
});

var MyTestBundlePlugin = new pimcore.plugin.MyTestBundle();
```

## I18n texts for plugins

Pimcore supports i18n for plugin UI extensions. Fist see the [i18n section for bundles](./README.md) how to prepare the data 
server-side. 

Once this is done, translations can be accessed anywhere in the plugin's javascript by calling

```javascript
t('translation_key')
```

## Adding Custom Main Navigation Items

It is possible to add leftside main navigation via plugins. See the following example to know how: 

> The new navigation item (the `li` tag) must have an `id` attribute starting with `pimcore_menu_`, whose suffix must be the prefix of the "menu variable" of the toolbar.
  So, the `xxx` part of the id `pimcore_menu_xxx` must match `pimcore.layout.toolbar.prototype.xxxMenu` to display the navigation item.

```javascript
pimcore.registerNS("pimcore.plugin.menusample");
 
pimcore.plugin.menusample = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.menusample";
    },
 
    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
 
        this.navEl = Ext.get('pimcore_menu_search').insertSibling('<li id="pimcore_menu_mds" data-menu-tooltip="mds Erweiterungen" class="pimcore_menu_item pimcore_menu_needs_children">mds Erweiterungen</li>', 'after');
        this.menu = new Ext.menu.Menu({
            items: [{
                text: "Item 1",
                iconCls: "pimcore_icon_apply",
                handler: function () {
                    alert("pressed 1");
                }
            }, {
                text: "Item 2",
                iconCls: "pimcore_icon_delete",
                handler: function () {
                    alert("pressed 2");
                }
            }],
            cls: "pimcore_navigation_flyout"
        });
        pimcore.layout.toolbar.prototype.mdsMenu = this.menu;
    },
 
    pimcoreReady: function (params, broker) {
        var toolbar = pimcore.globalmanager.get("layout_toolbar");
        this.navEl.on("mousedown", toolbar.showSubMenu.bind(toolbar.mdsMenu));
        pimcore.plugin.broker.fireEvent("mdsMenuReady", toolbar.mdsMenu);
    }
});
 
var menusamplePlugin = new pimcore.plugin.menusample();
```

## Installing and Uninstalling Plugin UI Components

Plugin UI components might need to be activated/loaded after the plugin is installed in the Pimcore backend UI.

As plugin JavaScript and CSS files are only available in the browser after installation and reloading of the UI, the 
backend plugin can return a flag that UI reload is required.
If this flag is set to true, the UI asks the user to reload after install. After that, all plugin components should be 
available.
 
With uninstall, it is not absolutely necessary to reload just to deactivate plugin components. 
The plugin is notified through the `uninstall` event (provided that it implements the `getClassName()` method correctly).
In the `uninstall` function the plugin can hide/deactivate everything in the frontend UI that will not work anymore 
after uninstalling the plugin.
