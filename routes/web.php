<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

//without auth
$app->get('/todo', 'todoController@index');

$app->get('/todo/{id}', 'todoController@show');

$app->post('/todo', 'todoController@store');

$app->put('/todo/{id}', 'todoController@update');

$app->delete('/todo/{id}', 'todoController@destroy');


//with auth
$app->group(['prefix' => 'api/'], function ($app) {
	//api/login
    $app->get('login/','UsersController@authenticate');
    //api/todo
    $app->post('todo/','TodoController1@store');
    //api/todo
    $app->get('todo/', 'TodoController1@index');
    //api/todo
    $app->get('todo/{id}/', 'TodoController1@show');
    //api/todo
    $app->put('todo/{id}/', 'TodoController1@update');
    //api/todo
    $app->delete('todo/{id}/', 'TodoController1@destroy');
});