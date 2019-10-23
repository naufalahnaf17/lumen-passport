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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Route Grup (Akses Menggunakan Token)
$router->group(['middleware' => 'auth:api'] , function() use ($router) {
  $router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('books','BooksController@index');
    $router->post('books','BooksController@store');
    $router->put('books/{id}','BooksController@update');
    $router->delete('books/{id}','BooksController@delete');

  });
});
