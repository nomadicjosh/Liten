<?php
/**
 * Liten - PHP 5 micro framework
 * 
 * @link        http://www.litenframework.com
 * @version     1.0.0
 * @package		Liten
 * 
 * The MIT License (MIT)
 * Copyright (c) 2015 Joshua Parker
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
/**
 * Step 1: Initial constants defined
 * 
 * Several constants defined in order to help
 * with the autoloader and the loading of other
 * needed functions and files.
 */
defined('APP_ENV')      or define('APP_ENV', 'DEV');
defined('DS')           or define('DS', DIRECTORY_SEPARATOR);
defined('BASE_PATH')    or define('BASE_PATH', __DIR__ . DS);
defined('APP_PATH')     or define('APP_PATH', BASE_PATH . 'app' . DS);

/**
 * Step 1: Require the Bootstrap
 *
 * The bootstrap includes defines as well as autoloader
 * in order to have a working install of Liten.
 */
require( BASE_PATH . 'Liten' . DS . 'Bootstrap.php');

/**
 * Step 2: Instantiate a Liten application
 *
 * This example instantiates a Liten application using
 * its default settings. However, you can configure
 * your Liten application by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Liten\Liten();

/**
 * Step 3: Include database config file
 * 
 * This is an example of loaded a database config
 * file when calling an application that needs
 * database connection.
 */
if(file_exists( BASE_PATH . 'config.php' )) {
    include( BASE_PATH . 'config.php' );
}

/**
 * Step 4: Require a functions file
 *
 * A functions file may include any dependency injections
 * or prelimary functions for your application.
 */
require( APP_PATH . 'functions.php' );

/**
 * Step 5: Include the routers needed
 *
 * Here we loop through the routers directory in order
 * to include routes needed at runtime. This helps
 * keep routers organized and the index.php clean.
 */
$routers = glob($app->config('routers_dir') . '*.router.php');
foreach ($routers as $router) {
    if (file_exists($router))
        include($router);
}

/**
 * Step 6: Run the Liten application
 *
 * This method should be called last. This executes the Liten application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
