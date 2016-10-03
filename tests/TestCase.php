<?php namespace Tests;

use \Liten;

class RouterTest extends \PHPUnit_Framework_TestCase
{

    public function testMapRouting()
    {
        $app = \Liten\Liten();

        $app->get('/foo/', function () {
            return 'get foo';
        });

        $app->post('/foo/', function () {
            return 'post foo';
        });

        $app->delete('/foo/', function () {
            return 'delete foo';
        });

        $app->put('/foo/', function () {
            return 'put foo';
        });

        $app->run();
    }
}
