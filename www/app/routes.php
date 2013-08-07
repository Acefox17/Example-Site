<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/example_urn', 'ExampleController@exampleAction');
Route::get('/redirect_home', 'ExampleController@exampleRedirect');
Route::get('/helloworld','ExampleController@helloWorld');
Route::get('/deleteobject/{objectid}','ExampleController@deleteObject');
Route::get('/parametertest/{parameter}',function($parameter)
{
	return "The parameter was {$parameter}.";//note the double quotes
});
Route::get('/make_object/{intval?}', 'ExampleController@makeObject');
Route::get('/make_small_object', 'ExampleController@makeSmallObject');
Route::get('/one_to_one_test', 'TestController@oneToOneTest');
Route::get('/ex_view', function()
{
	return View::make('example_view');
});
Route::get('/ex_view_with_object/{objectid}', 'ExampleController@withObjectAndParameter');
Route::get('/customresponse', function()
	{	
		//http://api.symfony.com/2.2/Symfony/Component/HttpFoundation/Response.html“TheSymfonyResponseObject”
		$myresponse = Response::make('response body', 200); //second parameter is status code, 200=normal 302=redirect 404 = page not found
		$myresponse->headers->set('the key','value');
		return $myresponse;
	});

/************UNTESTED***************/
Route::get('/file/download', function()
	{
		//downloads the file when you navigate to this route
		$file = 'path_to_my_file.php';
		return Response::download($file);
	});
//working on this guy
//Route::controller('http://localhost', 'ExampleRESTfulController');