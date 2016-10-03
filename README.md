# Liten

[![Join the chat at https://gitter.im/parkerj/Liten](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/parkerj/Liten?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Liten is a small and simple microframework. Even though it is small, you can still use it to build intelligent and dynamic restful api's.

## System Requirement

Minimum PHP version 5.4

## Features

* Simple Configuration
* Static Routes
* Dynamic Routes
* Route Subpatterns
* Group Routing
* Before Route Middlewares
* Before Router Middlewares
* After Router Middlewares
* HTTP methods and responses

## Install

```
$ composer require liten/liten
```

## Rewrite Rules

### .htaccess
```
RewriteEngine On
 
# Some hosts may require you to use the `RewriteBase` directive.
# If you need to use the `RewriteBase` directive, it should be the
# absolute physical path to the directory that contains this htaccess file.
#
# RewriteBase /
 
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php [L]
```

### Nginx (root directory)
```
location / {
    try_files $uri /index.php$is_args$args;
}
```

### Nginx (subdirectory)
```
location /liten {
    try_files $uri /liten/index.php$is_args$args;
}
```

## Hello World Example

Instantiate a new Liten Application:
```php
$app = new \Liten\Liten();
```
GET Route:
```php
$app->get('/hello/(\w+)/' function($name) {
    echo "Howdy, $name";
}
```
Run the new Liten Application
```php
$app->run();
```

## Sample Application

The [Liten Blog] (https://github.com/parkerj/Liten-Blog) is a sample application to show what you can do with the Liten Framework.

## Documentation & Community

Would love to have your input and help into making Liten a small but yet powerful micro framework. Head on over to 
the [online documentation] (https://www.litenframework.com/) site to ask questions and or make suggestions.