<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');

// RESTful API
$app->group('/api', function() use ($app, $orm) {

    /**
     * Will result in /api/.
     */
    $app->get('/', function () use($app) {
        $app->res->_format('json');
    });

    /**
     * Will result in /api/dbtable/
     */
    $app->get('/(\w+)', function ($table) use($app, $orm) {
        $table = $orm->$table();
        /**
         * Use closure as callback.
         */
        $q = $table->find(function($data) {
            $array = [];
            foreach ($data as $d) {
                $array[] = $d;
            }
            return $array;
        });
        /**
         * If the database table doesn't exist, then it
         * is false and a 404 should be sent.
         */
        if ($q === false) {
            $app->res->_format('json', 404);
        }
        /**
         * If the query is legit, but there
         * is no data in the table, then a 200
         * status should be sent. Why? Check out
         * the accepted answer at
         * http://stackoverflow.com/questions/13366730/proper-rest-response-for-empty-table/13367198#13367198
         */
        elseif (empty($q) === true) {
            $app->res->_format('json');
        }
        /**
         * If we get to this point, the all is well
         * and it is ok to process the query and print
         * the results in a json format.
         */
        else {
            $app->res->_format('json', 200, $q);
        }
    });

    /**
     * Will result in /api/dbtable/columnname/data/
     */
    $app->get('/(\w+)/(\w+)/(.+)', function ($table, $field, $any) use($app, $orm) {
        $table = $orm->$table();
        $q = $table->select()->where("$field = ?", $any);
        /**
         * Use closure as callback.
         */
        $results = $q->find(function($data) {
            $array = [];
            foreach ($data as $d) {
                $array[] = $d;
            }
            return $array;
        });
        /**
         * If the database table doesn't exist, then it
         * is false and a 404 should be sent.
         */
        if ($results === false) {
            $app->res->_format('json', 404);
        }
        /**
         * If the query is legit, but there
         * is no data in the table, then a 200
         * status should be sent. Why? Check out
         * the accepted answer at
         * http://stackoverflow.com/questions/13366730/proper-rest-response-for-empty-table/13367198#13367198
         */
        elseif (empty($results) === true) {
            $app->res->_format('json');
        }
        /**
         * If we get to this point, the all is well
         * and it is ok to process the query and print
         * the results in a json format.
         */
        else {
            $app->res->_format('json', 200, $results);
        }
    });
});