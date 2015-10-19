<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Products;
use App\Extensions\ProductsTrait;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Debug\Exception\FatalErrorException;

class ProductsController extends Controller
{
    use ProductsTrait;

    /**
     * Get the product with ingredients and category
     *
     * @param int $id product id
     * @return json
     */
    public function index($id)
    {
        $products = Products::find($id);

        $this->addProductsListsCollection($products, ['ingredients', 'category']);

        return Response::json($products ?: [
            'message' => 'error to find product. Check if is the correct product.',
            'return' => null,
        ]);
    }

    /**
     * List the ingredients from the product
     *
     * @param int $id product id
     * @return json
     */
    public function ingredients($id)
    {
        return Response::json(Products::find($id)->ingredients()->get() ?: [
            'message' => 'error to find the ingredients from this product.',
            'return' => null,
        ]);
    }

    /**
     * List the products with ingredients and category.
     *
     * If an error occurred, a FatalErrorException will be throws.
     *
     * @see App\Exceptions\Handler
     * @throws FatalErrorException
     * @return json
     */
    public function menu()
    {
        $products = Products::all();

        $this->addProductsListsCollection($products, ['ingredients', 'category']);

        return Response::json($products);
    }
}
