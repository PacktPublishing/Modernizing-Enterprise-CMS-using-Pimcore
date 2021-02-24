# Logging

There are several different kinds of logs in Pimcore. All of them are located under `/var/logs/` and get rotated
as well as compressed automatically on every day (7 days retention) by the maintenance command. 
 
## <env>.log
This is definitely one of the most important logs and also the default logging location. 

Pimcore uses Symfony default monolog logging with following channels: `pimcore`, `pimcore_api`, `session`. 
For details see [Symfonys monolog docs](http://symfony.com/doc/3.4/logging.html).

## php.log
By default Pimcore writes PHP-Engine Log Messages to the file `php.log`.
You can change this using constant `PIMCORE_PHP_ERROR_LOG` that is used to set PHP's [error_log Configuration](http://php.net/manual/en/errorfunc.configuration.php#ini.error-log).

You can additionally use the Constant `PIMCORE_PHP_ERROR_REPORTING` to set PHP's [error_reporting](http://php.net/manual/en/errorfunc.configuration.php#ini.error-reporting)

## usagelog.log
In this log you can find every action done within the Pimcore Backend Interface. It can be deactivated in system settings.

![Usage Log Setting](../img/usage-log-setting.jpg)

##### Example Entry: 
``` 
2013-07-25T18:26:30+02:00 : 2|admin|page|save|{"task":"publish","id":"4","data":"{\"headTitle\":{\"data\":\"Getting started\",\"..."}
```

##### Explanation

| Value (from the example above) | Description                               |
|--------------------------------|-------------------------------------------|
| 2013-07-25T18:26:30+02:00      | Timestamp                                 |
| 2                              | User-ID                                   |
| admin                          | Module (MVC)                              |
| page                           | Controller (MVC)                          |
| save                           | Action (MVC)                              |
| {"task":"pub ....              | Request Parameters (shortened & censored) |


## redirect.log
Sometimes it's necessary to debug redirects, for example when a redirect ends in an infinite loop. 
In this log you can see every request where a redirect takes action. 

##### Example
```
2013-08-12T19:49:43+02:00 : 10.242.2.255         Source: /asdsad/redirectsource/asd -> /basic-examples
```

## Writing your own log files
You can add your own logging functionality using Pimcore's log writer. You can call a static 
function like this:

##### Custom log entry
```php
\Pimcore\Log\Simple::log($name, $message);
```

The `$name` variable defines the filename of the log file, "mylog" will write a file to `/var/logs/mylog.log` 
(extension is added automatically). If the file does not yet exist it will be created on the fly. 

The message is the line that will be written to the log. A date and time will also be prepended 
automatically to each log entry.


