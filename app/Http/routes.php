<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

//Простейший GET-роут
Route::get('/', function()
{
    return 'Hello World';
});

Route::get('user/{id}', function($id)
{
    echo 'user: '.$id;
});