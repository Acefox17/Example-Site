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

Route::get('/redirect_home', function()
{
	return Redirect::to('/');
});

Route::get('/helloworld',function()
{
	return 'Hello World.';
});

Route::get('/parametertest/{parameter}',function($parameter)
{
	return "The parameter was {$parameter}.";//note the double quotes
});

Route::get('/make_object/{intval?}', function($intval = 0)
{
	$an_object = new ExObject;
	$an_object->example_string = 'testing';
	$an_object->example_integer = $intval;
	$an_object->save();
});

Route::get('/ex_view', function()
{
	return View::make('example_view');
});

Route::get('/ex_view_with_object/{objectid}', function($objectid)
{
	$data['object'] = ExObject::find($objectid);
	return View::make('example_view_with_object', $data);
});