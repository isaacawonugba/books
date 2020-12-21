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

$router->get('/api/start', function () {
    // this is a api endpoint demo, you should create a controller for your endpoint
    return [
        'message' => 'All requests with api prefix will go to backend'
    ];
});
$router->group(['prefix' => 'api'],  function($router){
    // this api endpoint lists all books 
    $router->get('books', 'BooksController@listAllBooks');

    // this api endpoint displays a book using the id of the book
    $router->get('/books/{id:[\d]+}', 'BooksController@showBookById');

    // this api endpoint creates a new book
    $router->post('books', 'BooksController@create');

    // this api endpoint allows up to update the book status 0 -> being sold, 1 -> being available for sale
    $router->put('books/{id}', 'BooksController@update');

    //this api endpoint deletes a book from store
    $router->delete('books/{id}', 'BooksController@delete');
});