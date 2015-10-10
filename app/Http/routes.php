<?php

use App\Products;
use App\Requests;
use App\Boards;
use App\Categories;
use App\Status;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Support\Facades\Input;

/**
 * API 1.0
 *
 * @author Felipe Pieretti Umpierre
 */
Route::group(['prefix' => 'api'], function () {

    /**
     * INSERT|UPDATE an order
     */
    Route::post('/order/board/{id}', function ($id) {
        // Decode the json with the product ids
        $products = json_decode(Input::get('products'));

        $board = Boards::find($id);
        $status = Status::find(1);

        if (empty($board)) {
            return Response::json([
                'error_code' => '001',
                'message' => 'error to find board. Check if is the correct board.',
                'return' => null,
            ]);
        }

        try {
            // search to see if this board is already opened
            $request = Requests::where(['boards_id' => $board->id, 'status_id' => $status->id])->first();

            // if the count is 0, means that need to
            // create a new request object
            if ($request->count() == 0) {
                // Generate a new Request
                $request = new Requests();

                // Associate the board
                $request->board()->associate($board);

                // Associate the status
                $request->status()->associate($status);

                // Save the request
                $request->save();
            }

            // Loop through the products array
            // attach to this request
            foreach ($products as $productKey => $productId) {
                // Search for the product
                // if not found, fail
                $product = Products::findOrFail($productId);

                // Default value
                $quantity = 1;

                // Attach product and other informations
                // into requests_products table
                $request->products()->attach($product, [
                    'unity_price' => $product->price,
                    'quantity' => $quantity,
                    'total_price' => $product->price * $quantity
                ]);
            }

            // Save the request, with the attach
            $request->save();

            return Response::json('Products added with success!');
        } catch (ValidationException $e) {
            return Response::json($e->getErrors());
        }
    });

    /**
     * Get information from an order
     */
    Route::get('/order/board/{id}', function ($boardsId) {
        $products = Requests::where(['boards_id' => $boardsId, 'status_id' => 1])->first()->products()->get();

        foreach ($products as $key => $val) {
            $val->ingredients->lists('id', 'name');
            $val->category->lists('id', 'name');
        }

        return Response::json($products ?: [
            'error_code' => '002',
            'message' => 'no products founded to this board.',
            'return' => null,
        ]);
    });

    /**
     * Get the menu list
     */
    Route::get('/menu', function () {
        $products = Products::all();

        foreach ($products as $key => $val) {
            $val->ingredients->lists('id', 'name');
            $val->category->lists('id', 'name');
        }

        return Response::json($products ?: [
            'error_code' => '005',
            'message' => 'no products founded.',
            'return' => null,
        ]);
    });

    /**
     * Get the product info
     */
    Route::get('/product/{id}', function ($id) {
        return Response::json(Products::find($id) ?: [
            'error_code' => '004',
            'message' => 'error to find product. Check if is the correct product.',
            'return' => null,
        ]);
    });

    /**
     * Get the ingredients from a product
     */
    Route::get('/product/ingredients/{id}', function ($id) {
        return Response::json(Products::find($id)->ingredients()->get());
    });

    /**
     * Get the board info
     */
    Route::get('/board/{id}', function ($id) {
        return Response::json(Boards::find($id) ?: [
            'error_code' => '003',
            'message' => 'error to find board. Check if is the correct board.',
            'return' => null,
        ]);
    });

    /**
     * Get category data
     */
    Route::get('/category/{id}', function ($id) {
        return Response::json(Categories::find($id) ?: [
            'error_code' => '002',
            'message' => 'error to find category. Check if is the correct category.',
            'return' => null,
        ]);
    });

    /**
     * Get products from a category
     */
    Route::get('/category/{id}/products', function ($id) {
        return Response::json(Categories::find($id)->products()->get());
    });

});