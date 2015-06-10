# slf4psrlog
The Simple Logging Facade for PSR-3 loggers serves as a simple facade or abstraction for the various logging frameworks
implementing the PSR-3 logging standard. To achieve true interoperability, your own code should not depend on a specific
library implementing the PSR-3 logging standard.

Installation
------------

The preferred way of installation is through Composer. Simply add `bitexpert/slf4psrlog` as a dependency:

```
composer.phar require bitexpert/slf4psrlog
```

Example
-------

Configure a callable to return a logger instance:

```php
    \bitExpert\Slf4PsrLog\LoggerFactory::registerFactoryCallback(function($channel) {
        // return configured PSR-3 logger instance
    });
```

In your classes create a logger instance by calling:

```php
     $logger = \bitExpert\Slf4PsrLog\LoggerFactory::getLogger(__CLASS__);
```

The \bitExpert\Slf4PsrLog\LoggerFactory will delegate the call to the callback function which needs to return an instance
of a PSR-3 logger.

License
-------

slf4psrlog is released under the Apache 2.0 license.
