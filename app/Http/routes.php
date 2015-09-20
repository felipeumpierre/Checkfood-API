<?php

use App\Products;
use App\Requests;

/**
 * API 1.0
 *
 * @author Felipe Pieretti Umpierre
 */
Route::group(["prefix" => "api"], function() {

    /**
     * Insert a new order
     */
    Route::post("/order", function() {

    });

    /**
     * Update an order
     */
    Route::put("/order/{id}", function($id) {

    });

    /**
     * Get information from an order
     */
    Route::get("/order/{boardsId}", function($boardsId) {
        $request = Requests::where('boards_id', $boardsId)->get();

        return Response::json($request);
    });

    /**
     * Get the menu list
     */
    Route::get("/menu", function() {
        $products = Products::all();

        return Response::json($products);
    });

});