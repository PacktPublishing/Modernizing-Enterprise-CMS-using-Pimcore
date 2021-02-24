# Templating Helpers

## Introduction

Template Helpers are methods that offer special functionality to increase usability of view scripts. 
This is a concept of the [Symfony Templating Component](http://symfony.com/doc/3.4/components/templating.html) 
and you can of course use all of the built-in functionalities of this component.  

Following an overview of some helpers provided by the Symfony Templating Component:   
- `escape()` 
- `extend()` 
- `actions()` 
- `assets()` 
- `code()` 
- `form()` 
- `request()` 
- `router()` 
- `session()` 
- `stopwatch()` 
- `translator()` 
- `url()` 
- `path()` 
- `device()`

For more information please have a look into the docs of the [Symfony PHP Templating Compontent](http://symfony.com/doc/3.4/templating/PHP.html). 
  
In addition to the Symfony standard templating helpers, Pimcore adds some additional powerful helpers. 
  
## Pimcore Templating Helpers

All helpers are described below in detail, the following tables give just a short overview of all available helpers.

| Method                                   | Description                                             |
|------------------------------------------|---------------------------------------------------------|
| `action()`       | Call an  arbitrary action, this is a shorthand for Symfony's `actions()` helper |
| `cache()`        | Simple in-template caching functionality                                        |
| `device()`       | Helps implementing adaptive designs.                                            |
| `getAllParams()` | Returns all parameters on the request object                                    |
| `getParam()`     | Returns a specific parameter from the request                                   |
| `glossary()`     | Helper to control the glossary engine                                           |
| `placeholder()`  | Adding and embedding custom placeholders, e.g. for special header tags, etc.    |
| `headLink()`     | Embeding / managing referenced stylesheets (alternative to `assets()`)          |
| `headMeta()`     | Managing your <meta> elements in your HTML document                             |
| `headScript()`   | Managing your <scripts> elements                                                |
| `headStyle()`    | Managing inline styles (pendant to `headLink()` for inline styles)              |
| `headTitle()`    | Create and store the HTML document's `<title>` for later retrieval and output   |
| `inc()`          | Use this function to directly include a Pimcore document.                       |
| `inlineScript()` | Managing inline scripts (pendant to `headScript()` for inline scripts)          |
| `navigation()`   | Embed and build navigations based on the document structure                     |
| `pimcoreUrl()`   | An alternative to `url()` and `path()` with the building behavior of Pimcore 4  |
| `template()`     | Directly include a template                                                     |
| `translate()`    | I18n / Shared Translations                                                      |


You can also create your own custom templating helpers to make certain functionalities available to your views.  
Here you can find an example how to [create](https://github.com/pimcore/demo-basic/tree/master/src/AppBundle/Templating/Helper/LanguageSwitcher.php)
and [register](https://github.com/pimcore/demo-basic/tree/master/src/AppBundle/Resources/config/services.yml#L41)
your own templating helper.

### `$this->action()`

This helper is a shorthand of Symfony's `actions` helper. 

<div class="code-section">

```php
<?= $this->action($action, $controller, $bundle, $params = []) ?>
```

```twig
{{ pimcore_action(action, controller, bundle, {}) }}
```

</div>
   
| Name                | Description  |
|---------------------|--------------|
| `$action`     | Name of the action (eg. `foo`) |
| `$controller` | Name of the controller (eg. `Bar`) |
| `$bundle`     | Optional name of the bundle where the controller/action lives |
| `$params`     | Optional params added to the request object for the action |

   
##### Example

<div class="code-section">

```php
<section id="foo-bar">
    <?= $this->action("foo", "Bar", null, ["awesome" => "value"]) ?>
</section>
```

```twig
<section id="foo-bar">
    {{ pimcore_action('foo', 'Bar', ~, { awesome: 'value' }) }}
</section>
```

</div>
   
    
### `$this->cache()`
This is an implementation of an in-template cache. You can use this to cache some parts directly in the template, 
independent of the other global definable caching functionality. This can be useful for templates which need a lot 
of calculation or require a huge amount of objects (like navigations, ...).

`$this->cache(string $name, [int $lifetime = null], [bool $force = false])`

| Name                | Description  |
|---------------------|--------------|
| `$name`         | Name of cache item |
| `$lifetime`     | Lifetime in seconds. If you define no lifetime the behavior is like the output cache, so if you make any change in Pimcore, the cache will be flushed. When specifying a lifetime this is independent from changes in the CMS. |
| `$force`        | Force caching, even when request is done within Pimcore admin interface |

##### Example

<div class="code-section">

```php
<?php $cache = $this->cache("test_cache_key", 60); ?>
<?php if (!$cache->start()): ?>
    <h1>This is some cached microtime</h1>
    <?= microtime() ?>
    <?php $cache->end(); ?>
<?php endif ?>
```

```twig
{% set cache = pimcore_cache("test_cache_key", 60) %}
{% if not cache.start() %}
    <h1>This is some cached microtime</h1>
    {{ 'now'|date('U') }}
    {% do cache.end() %}
{% endif %}
```

</div>

### `$this->device()`

This helper makes it easy to implement "Adaptive Design" in Pimcore. 

<div class="code-section">

```php
<?= $this->device('a default value'); ?>
```

```twig
{{ pimcore_device('a default value') }}
```

</div>



| Name                | Description  |
|---------------------|--------------|
| `$default`         | Default if no device can be detected |

##### Example

<div class="code-section">

```php
<?php
    $device = $this->device("phone"); // first argument is the default setting
?>
 
<?php if($device->isPhone()) { ?>
    This is my phone content
<?php } else if($device->isTablet()) { ?>
    This text is shown on a tablet
<?php } else if($device->isDesktop()) { ?>
    This is for default desktop Browser
<?php } ?>
 
<?php if($this->device()->isDesktop()) { ?>
    Here is some desktop specific content
<?php } ?>
```

```twig
{% if pimcore_device().isPhone() %}
    This is my phone content
{% elseif pimcore_device().isTablet() %}
    This text is shown on a tablet
{% elseif pimcore_device().isDesktop() %}
    This is for default desktop Browser
{% endif %}
```

</div>
   
For details also see [Adaptive Design](../../../19_Development_Tools_and_Details/21_Adaptive_Design_Helper.md).


### `$this->getAllParams()`
Returns all parameters as an array on the request object.   
See also `$this->getParam()`. 


### `$this->getParam()`
Returns a parameter from the request object (get, post, .... ), it's an equivalent to `$request->get()` in the controller action.

`$this->getParam(string $key, [mixed $default = null])`

| Name                | Description  |
|---------------------|--------------|
| `$key`              | Key of param |
| `$default`            | Default value if key not set |

##### Example
```php
<?= $this->getParam("myParam"); ?>
```


### `$this->glossary()`

For details please see [Glossary Documentation](../../../18_Tools_and_Features/21_Glossary.md).

##### Example
```php
<section class="area-wysiwyg">

    <?php // start capturing content with Glossary feature ?>
    <?php $this->glossary()->start(); ?>
        <?= $this->wysiwyg("content"); ?>
    <?php // call the processor with optional parameters ?>
    <?php $this->glossary()->stop(['limit' => 1]); ?>

</section>
```

### `$this->placeholder()` 
See [Placeholder Template Helper](00_Placeholder.md)

### `$this->headLink()` 
See [HeadLink Template Helper](01_HeadLink.md)

### `$this->headMeta()` 
See [HeadMeta Template Helper](02_HeadMeta.md)

### `$this->headScript()` 
See [HeadScript Template Helper](03_HeadScript.md)

### `$this->headStyle()` 
See [HeadStyle Template Helper](04_HeadStyle.md)

### `$this->headTitle()` 
See [HeadTitle Template Helper](05_HeadTitle.md)


### `$this->inc()` 
Use `$this->inc()` to include documents (eg. snippets) within views. 
This is especially useful for footers, headers, navigations, sidebars, teasers, ...

`$this->inc(mixed $document, [array $params], [$cacheEnabled = true])`

| Name                | Description  |
|---------------------|--------------|
| `$document`     | Document to include, can be either an ID, a path or even the Document object itself |
| `$params`       | Is optional and should be an array with key value pairs like in `$this->action()` from ZF. |
| `$enabledCache` | Is true by default, set it to false to disable the cache. Hashing is done across source and parameters to ensure a consistent result. |
 
 ##### Example
```php
use Pimcore\Model\Document;
  
<!-- include path -->
<?= $this->inc("/shared/boxes/buttons") ?>
 
<!-- include ID -->
<?= $this->inc(256) ?>
 
<!-- include object -->
<?php
 
$doc = Document::getById(477);
echo $this->inc($doc, [
    "param1" => "value1"
]);
?> 
  
<!-- disable caching -->
<?= $this->inc(123, null, false) ?>
```

When passing parameters to something included with pimcore_inc(), these parameters are not automatically passed to Twig.
The parameters are passed as attributes to the included document, and should be passed to Twig via the document's controller action.

Example:

index.html.twig
```php
{{ pimcore_inc('/some/other/document', { 'parameterToPass': parameterToPass }) }}
``` 

IndexController.php (whatever controller / method is designated for /some/other/document in the document tree)
```php
public function otherDocumentAction(Request $request) {
    return ['parameterToPass' => $request->get('parameterToPass')];
}
```

more Convenient way
```php
public function otherDocumentAction(Request $request) {
    return $this->render(":Default:someOtherDocument.html.twig", ['parameterToPass' => $request->get('parameterToPass')]);
}
```


someOtherDocument.html.twig (whatever Twig template is actually for /some/other/document in the document tree)
```twig
...
{{ parameterToPass }}
...
```


### `$this->inlineScript()` 
See [InlineScript Template Helper](06_InlineScript.md)

### `$this->navigation()` 
See [Navigation](../../../03_Documents/03_Navigation.md)

### `$this->pimcoreUrl()` 
An alternative to `url()` and `path()` with the building behavior of Pimcore 4. 


### `$this->template()`
This method is designed to include a different template directly, without calling an action. 

`$this->template($name, array $parameters = [])`

| Name                | Description  |
|---------------------|--------------|
| `$path`              | Path of template to include in Symfony template notation |
| `$params`            | Params to include. |



##### Example
```php
<?php echo $this->template("Includes/footer.html.php") ?>
 
<!-- with parameters -->
<?php echo $this->template("Includes/somthingelse.html.php", [
    "param1" => "value1"
]) ?>
```

Parameters in the included template are then accessible through `$this->paramName` or directly as `$paramName`, 
i.e. from the example above. 

##### Example
```php
<?= $this->param1 ?>
<?= $param1 ?>
```

Following parameter names cannot be used with `$this->parameterName` notation:  
  - current
  - container
  - loader
  - helpers
  - parents
  - stach
  - charset
  - cache
  - escapers
  - globals
  - parser
  - evalTemplate
  - evalParameter


### `$this->translate()`
View helper for getting translation from shared translations. For details also see [Shared Translations](../../../06_Multi_Language_i18n/04_Shared_Translations.md).

`$this->t(string $key = "")`
`$this->translate(string $key = "")`

| Name                | Description  |
|---------------------|--------------|
| `$key`         | Key of translation |


##### Example
```php
<a href="/"><?= $this->translate("Home"); ?></a>
```


### `$this->webLink()`

Exposes methods provided by Symfony's [WebLink Component](https://symfony.com/blog/new-in-symfony-3-3-weblink-component).
See [WebLink](https://github.com/pimcore/pimcore/blob/web-link-support/pimcore/lib/Pimcore/Templating/Helper/WebLink.php)
for details.

```php
<link rel="stylesheet" href="<?= $this->webLink()->preload('/static/css/global.css', ['as' => 'style']) ?>">
```
