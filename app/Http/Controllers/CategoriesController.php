<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;

/**
 * CategoriesController to manage the requests to get Category information
 *
 * @package App\Http\Controllers
 * @author Felipe Pieretti Umpierre
 */
class CategoriesController extends Controller
{
    /**
     * Get the category
     *
     * @param int $id category id
     * @return json
     */
    public function index($id)
    {
        return Response::json(Categories::find($id) ?: [
            'message' => 'error to find category. Check if is the correct category.',
            'return' => null,
        ]);
    }

    /**
     * List the products from a category
     *
     * @param int $id category id
     * @return json
     */
    public function products($id)
    {
        return Response::json(Categories::find($id)->products()->get() ?: [
            'message' => 'error to find the products from this category. Check if is the correct category.',
            'return' => null,
        ]);
    }
}
