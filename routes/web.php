<?php

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/books', 'BookController@index');
$router->get('/books/create', 'BookController@create');
$router->post('/books/store', 'BookController@store');
$router->get('/books/edit', 'BookController@edit');
$router->post('/books/update', 'BookController@update');
$router->post('/books/delete', 'BookController@delete');

$router->get('/users', 'UserController@index');
$router->get('/users/create', 'UserController@create');
$router->post('/users/store', 'UserController@store');



$router->resolve();