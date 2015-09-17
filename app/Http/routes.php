<?php

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
    Route::get("/order/{id}", function($id) {

    });

    /**
     * Get the menu list
     */
    Route::get("/menu", function() {

    });

});