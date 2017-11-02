<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/{locale}', function ($locale) {
    App::setLocale($locale);

    return view('index.index');
});*/
/*
Route::group(['prefix' => '{lang}'], function () {

});*/    

Route::get('/', function () {
    return view('index.index');
});

Route::get('index', 'indexController@index');

Route::get('/search', 'indexController@search');

Route::post('/pay', 'BuyController@payTicket');

Route::get('ticket/{id}', ['as'=>'ticket.id', 'uses'=> 'BuyController@buyTicket']);

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::resource('tickets', 'TicketController');
    Route::resource('books', 'BooksController');
});

Route::get('/home', 'HomeController@index')->name('home');
