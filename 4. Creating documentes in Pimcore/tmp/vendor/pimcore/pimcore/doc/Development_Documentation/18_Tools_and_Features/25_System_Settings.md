# System Settings

In system settings (*Settings* > *System Settings*) system wide settings for Pimcore can be made. Changes should 
be made with care and only by developers. 
These settings are saved in `var/config/system.yml`. 


## General 
Contains general settings about timezone, view suffix, additional path variables, default langauge, user interface etc.

 
## Localization & Internationalization (i18n/l10n) 
These settings are used in documents to specify the content language (in properties tab), for objects in localized-fields, 
for shared translations, ... simply everywhere the editor can choose or use a language for the content.
Fallback languages are currently used in object's localized fields and shared translations.

## Debug

Several debugging settings for Pimcore, like Debug Mode and Application Logger settings.

Please note that the core logger (log levels, files, ...) can now directly be configured via Symfony's Monolog configuration.
For details see:

* [Symfony Logging](https://symfony.com/doc/3.4/logging.html#handlers-writing-logs-to-different-locations)
* [Logging](../19_Development_Tools_and_Details/07_Logging.md) 

### Debug Mode
The Debug Mode is useful if you're developing an application with Pimcore.

With debug-mode on, errors and warnings are displayed directly in the browser, otherwise they are deactivated and the 
error-controller is active (Error Page).

You can restrict the debug mode to an (or multiple) IP address(es), so that it is only active for requests from a 
specific remote address.

In order to include some specific debugging tools (profiler, toolbar, ...), Pimcore implicitly sets the 
environment to `dev` when enabling the debug mode and if **no** environment is 
[defined manually by using an environment variable](../21_Deployment/03_Multi_Environment.md). 

![System Settings](../img/system-settings1.png)

If you are using `Pimcore\Mail` to send emails and the Debug Mode is enabled, all emails will be sent to the debug email 
receivers defined in *Settings* > *System Settings* > *Email Settings* > *Debug email addresses*. In addition a debug 
information is attached to the email which shows you to who the email would be sent if the debug mode is disabled.

To check anywhere in your own code if you are working in debug-mode, you can make use of the `PIMCORE_DEBUG` constant.

### DEV-Mode
The development mode enables some debugging features. This is useful if you're developing on the core of Pimcore or when 
creating a bundle. Please don't activate it in production systems!

What exactly does the dev mode:
* Loading the source javascript files (uncompressed & commented)
* Disables some caches (Webservice Cache, ...)
* extensive logging into log files
* ... and some more little things


## E-Mail Settings
Settings for default values of Mails sent via `Pimcore\Mail`. 


## Website
System settings about the CMS part of Pimcore.

### EU Cookie Policy Notice
Pimcore has a default implementation for EU cookie policy that looks like as follows. 

![Cookie Policy](../img/system-settings-sample.png)


You can specify your own texts and add your custom detail link using the "Shared Translations".
Just search for "cookie-" in Shared Translations, then you get listed the predefined keys for the cookie 
texts and links:

![Cookie Policy Translation](../img/system-settings2.png)

##### Use a Custom Template Code

```php
<?php
// this example is inside a controller, but you can also inject the listener as dependency
$cookieListener = $this->get(\Pimcore\Bundle\CoreBundle\EventListener\Frontend\CookiePolicyNoticeListener::class);
$cookieListener->setTemplateCode("<b>Your Custom Template</b> ...");
```

## Documents
Settings for documents like version steps, default values and URL settings. 


## Objects
Version steps for objects. 


## Assets 
Settings for assets like version steps, default color profiles for thumbnail processing and display settings.


## Google Credentials & API Keys
Google API Credentials (Service Account Client ID for Analytics, ...) is required for the Google API integrations. 
Only use a *Service Account* from the Google Cloud Console.

Google API Key (Simple API Access for CSE, ...) is e.g. required for correct display of geo data types in Pimcore ojbects. 
 
 
## Output-Cache
Settings for Pimcore [output cache](../19_Development_Tools_and_Details/09_Cache/README.md).


## Outputfilters
Settings for default output filters shipped with Pimcore. 


## Web Service API
Settings fpr Pimcore web service API. 


## HTTP Connectivity (direct, proxy, ...)
Settings for outbound HTTP connectivity of Pimcore - needed e.g. for Pimcore Updates or custom code using HTTP-Clients. 
 
 
## Newsletter
Possibility for configuring different newsletter delivery settings from the default e-mail settings.
 
 
## Access system config in PHP Controller
Using `\Pimcore\Config::getSystemConfig()` is deprecated. You can choose one of the following options to access the system configuration:

```php 
<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Pimcore\Config;

class DefaultController extends FrontendController
{
    public function defaultAction(Request $request, Config $config)
    {
        // option 1 - use type-hinting to inject the config service
        $bar = $config['general']['valid_languages'];
        
        // option 2 - use the container parameter 
        $foo = $this->getParameter('pimcore.config')['general']['valid_languages'];    
    }

}
```
