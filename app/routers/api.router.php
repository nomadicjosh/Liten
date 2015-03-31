<?php if ( ! defined('BASE_PATH')) exit('No direct script access allowed');

// RESTful API
$app->group('/api', function() use ($app,$orm) {
	
	/**
	 * Will result in /api/.
	 */
	$app->get('/', function () use($app) {
		echo $app->res->_type('json',$app->res->HTTP[204]);
	});
	
	/**
	 * Will result in /api/dbtable/
	 */
	$app->get('/(\w+)', function ($table) use($app,$orm) {
	    $table = $orm->$table();
		/**
		 * Use closure as callback.
		 */
		$q = $table->find(function($data) {
			$array = [];
			foreach($data as $d) {
				$array[] = $d;
			}
			return $array;
		});
		/**
		 * If the database table doesn't exist, then it
		 * is false and a 404 should be sent.
		 */
		if($q === false)
		{
			echo $app->res->_type('json',$app->res->HTTP[404]);
			
		}
		/**
		 * If the query is legit, but there
		 * is no data in the table, then a 204
		 * status should be sent
		 */
		elseif(empty($q) === true)
		{
			echo $app->res->_type('json',$app->res->HTTP[204]);
		}
		/**
		 * If we get to this point, the all is well
		 * and it is ok to process the query and print
		 * the results in a json format.
		 */
		else
		{
			echo $app->res->_type('json',$q);
		}
	});
	
	/**
	 * Will result in /api/dbtable/columnname/data/
	 */
	$app->get('/(\w+)/(\w+)/(.+)', function ($table,$field,$any) use($app,$orm) {
	    $table = $orm->$table();
		$q = $table->select()->where("$field = ?",$any);
		/**
		 * Use closure as callback.
		 */
		$results = $q->find(function($data) {
			$array = [];
			foreach($data as $d) {
				$array[] = $d;
			}
			return $array;
		});
		/**
		 * If the database table doesn't exist, then it
		 * is false and a 404 should be sent.
		 */
		if($results === false)
		{
			echo $app->res->_type('json',$app->res->HTTP[404]);
			
		}
		/**
		 * If the query is legit, but there
		 * is no data in the table, then a 204
		 * status should be sent
		 */
		elseif(empty($results) === true)
		{
			echo $app->res->_type('json',$app->res->HTTP[204]);
		}
		/**
		 * If we get to this point, the all is well
		 * and it is ok to process the query and print
		 * the results in a json format.
		 */
		else
		{
			echo $app->res->_type('json',$results);
		}
	});
	
});