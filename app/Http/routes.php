<?php

/**
 * API 2.0
 *
 * @author Felipe Pieretti Umpierre <umpierre[dot]felipe[at]gmail[dot]com>
 */
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api', 'middleware' => 'cors'], function () {
    // Request
    Route::get('/request/board/{id}', 'RequestsController@index');
    Route::get('/request/board/{id}/close', 'RequestsController@close');

    // Order
    Route::post('/order/board/{id}', 'OrderController@saveRequest');
    Route::get('/order/board/{id}', 'OrderController@showProductsFromBoard');

    // Product
    Route::get('/product/{id}', 'ProductsController@index');
    Route::get('/menu', 'ProductsController@menu');
    Route::get('/product/{id}/ingredients', 'ProductsController@ingredients');

    // Board
    Route::get('/board/{id}', 'BoardsController@index');
    Route::get('/boards', 'BoardsController@all');

    // Category
    Route::get('/category/{id}', 'CategoriesController@index');
    Route::get('/category/{id}/products', 'CategoriesController@products');

    // Opinion
    Route::post('/opinion', 'OpinionsController@add');
    Route::get('/opinion', 'OpinionsController@listOpinions');
});