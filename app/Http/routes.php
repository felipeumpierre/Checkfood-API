<?php

/**
 * API 2.0
 *
 * @author Felipe Pieretti Umpierre <umpierre[dot]felipe[at]gmail[dot]com>
 */
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api'], function () {
    // Request
    Route::post('/order/board/{id}', 'RequestsController@saveRequest');
    Route::get('/order/board/{id}', 'RequestsController@showProductsFromBoard');

    // Product
    Route::get('/product/{id}', 'ProductsController@index');
    Route::get('/menu', 'ProductsController@menu');
    Route::get('/product/ingredients/{id}', 'ProductsController@ingredients');

    // Board
    Route::get('/board/{id}', 'BoardsController@index');

    // Category
    Route::get('/category/{id}', 'CategoriesController@index');
    Route::get('/category/{id}/products', 'CategoriesController@products');
});