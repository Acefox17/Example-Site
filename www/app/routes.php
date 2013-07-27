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

Route::get('/test', function()
{
	$an_object = new ExObject;
	$an_object->example_string = 'testing, one two three';
	$an_object->example_integer = 1;
	$an_object->second_example_string = 'word';
	$an_object->save();
});