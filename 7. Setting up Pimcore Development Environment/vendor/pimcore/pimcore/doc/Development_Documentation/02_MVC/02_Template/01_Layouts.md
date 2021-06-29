# Template Inheritance and Layouts

## Introduction

Layouts define everything that repeats on one page to another, such as a header, footer, navigation. 
Layouts often contain the basic structure of a HTML document, such as `<html>`, `<head>` and the `<body>` 
tag as well as scripts and stylesheets.

In Symfony/Pimcore, this problem is thought about differently: a template can be decorated by another one. 
This works exactly the same as PHP classes: template inheritance allows you to build a base "layout" 
template that contains all the common elements of your site defined as blocks (think "PHP class with 
base methods"). A child template can extend the base layout and override any of its blocks 
(think "PHP subclass that overrides certain methods of its parent class").

Layout scripts are just normal view scripts and are located together with normal view scripts in: `/templates`

For more details about template inheritance and layouts, please have a look at the 
[Symfony documentation](https://symfony.com/doc/5.2/templating.html#template-inheritance-and-layouts). 

## Usage of Layouts

###### A Simple Sample Layout Looks Like the Following:  

```twig
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Example</title>
    <link rel="stylesheet" type="text/css" href="/static/css/global.css" />
</head>
<body>
    <div id="site">
        {{ block('content') }}
    </div>
</body>
</html>
```

Of course, editables and template helpers can be used within the layout file and therefore layouts can become much 
more complicated. The most important line though is `{{ block('content') }}`. 
It includes the actual rendered content of the view. 

###### Use a Layout in a template

Layouts are simply used by declaring a parent template with the following code. 

```twig
{% extends 'layout.html.twig' %}
```

In this example we extend from the template `layout.html.twig`, but we can use any other and as many as needed 
scripts instead.  
  
A complete example of a document page would look like the following: 

```twig
{% extends 'layout.html.twig' %}

<h1>
    {{ pimcore_input('headline', {'width': 540}) }}
</h1>
```
