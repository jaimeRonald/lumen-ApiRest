<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\LibroController;

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

$router->get('/libros','LibroController@index');
$router->post('/libros','LibroController@guardar');
$router->put('/libros/{id}',"LibroController@update");
