# Pimcore Controller

## Introduction

Pimcore controllers play the designated role in the MVC pattern. They bind the design patterns together and contain or delegate 
the functionality of the application. It is good practise to keep the controllers as lean as possible and encapsulate
the business logic into models or services/libraries. 

Pimcore offers an abstract class (`Pimcore\Controller\FrontendController`), which can be implemented by your controllers.
This abstract class adds some Pimcore specific dispatching features - especially in combination with Pimcore Documents,
multi-language support etc. 

The naming of the file and the class is just the same as in Symfony. 

## Pimcore Specialities and Examples

| Controller Name | File Name                   | Class Name        | Default View Directory               |
|-----------------|-----------------------------|-------------------|--------------------------------------|
| Content         | `src/Controller/ContentController.php` | `App\Controller\ContentController` | `/templates/content` |
| News            | `src/Controller/NewsController.php`    | `App\Controller\NewsController`    | `/templates/news`    |

In controllers, for every action there exists a separate method ending with the `Action` suffix. 
The `DefaultController` comes with Pimcore. When you create an empty page in Pimcore it will call 
the `defaultAction` in the `DefaultController` which uses the view `/templates/default/default.html.twig`. 

You can render templates just the [standard Symfony way](https://symfony.com/doc/5.2/templates.html#rendering-a-template-in-emails), by either using `$this->render('foo.html.twig')` or using the `@Template()` [annotation](https://symfony.com/doc/5.2/bundles/SensioFrameworkExtraBundle/annotations/view.html). 


### Examples

```php
<?php

namespace App\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pimcore\Controller\Configuration\ResponseHeader;

class DefaultController extends FrontendController
{   
    /**
    * Very simple example using $this->>render() and passing the parameter 'foo'
    */
    public function myAction()
    {
        return $this->render('content/default.html.twig', ["foo" => "bar"]);
    }

    /**
     * Example using the @Template annotation and auto-resolving the template using the controller/action name. 
     * The frontend controller also provides methods to add response headers via annotation without having
     * access to the final response object (as it is automatically created when rendering the view).
     *
     * @Template
     * @ResponseHeader("X-Foo", values={"123456", "98765"})
     */
    public function headerAction(Request $request)
    {
        // schedule a response header via code
        $this->addResponseHeader('X-Foo', 'bar', false, $request);
        
        return ["foo" => "bar"];
    }
    
    /**
     * This action returns a JSON response. 
    */
    public function jsonAction(Request $request)
    {
        return $this->json(array('key' => 'value'));
    }
    
    /**
     * This returns a standard symfony Response object 
    */
    public function customAction(Request $request)
    {
        return new Response("Just some text");
    }
}
``` 

###### There are also some properties which can be useful:

| Name              | Type        | Description                                              |
|-------------------|-------------|----------------------------------------------------------|
| `$this->document` | Document    | Reference to the current document, if any is available.  |
| `$this->editmode` | boolean     | True if you are in editmode (admin)                      |
   
