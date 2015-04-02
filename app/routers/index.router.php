<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');

// GET route
$app->get('/', function () use($app, $orm) {

    $app->view->display('index/index', ['title' => 'Liten Framework']);
});

$app->setError(function() use($app) {
    
    echo $app->res->_format('json', $app->res->HTTP[404]);
    
});
