<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


//The first route /new_ticket will show the form to open a new ticket while the second route will call the store() on TicketsController which will do the actual storing of the ticket in the database.

Route::get('/new_ticket', 'TicketsController@create');

Route::post('/new_ticket_store', 'TicketsController@store');
