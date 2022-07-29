<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/user', ['uses' => 'UserController@index']);
$router->get('/user/{id}', ['uses' => 'UserController@show']);

$router->get('/surat', ['uses' => 'SuratController@index']);
$router->get('/surat/{id}', ['uses' => 'SuratController@show']);


$router->post('/register', ['uses' => 'AuthController@register']);
$router->post('/login', ['uses' => 'AuthController@login']);