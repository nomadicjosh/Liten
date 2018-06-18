<?php namespace Liten\Tests;

use \Liten\Liten;

defined('DS') or define('DS', DIRECTORY_SEPARATOR);
defined('BASE_PATH') or define('BASE_PATH', __DIR__ . DS);
defined('APP_PATH') or define('APP_PATH', BASE_PATH . 'app' . DS);

class LitenTest extends \PHPUnit_Framework_TestCase
{

    public function testMapRouting()
    {
        $app = new Liten();

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
