<?php

namespace App\Http\Controllers;

use App\Extensions\ProductsTrait;
use App\Extensions\RequestsTrait;
use App\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class RequestsController extends Controller
{
    use ProductsTrait;
    use RequestsTrait;

    /**
     * List the products from a board
     *
     * @param int $id board id
     * @return json
     */
    public function showProductsFromBoard($id)
    {
        $products = Requests::where(['boards_id' => $id, 'status_id' => 1])->first();

        if (is_null($products)) {
            return Response::json(['message' => 'this board is not opened.']);
        } else {
            $products = $products->products()->get();
        }

        // add the ingredients and category to $products Collection
        $this->addProductsListsCollection($products, ['ingredients', 'category']);
        dd($products);
        return Response::json($products ?: [
            'message' => 'no products founded to this board.',
            'return' => null,
        ]);
    }

    /**
     * Create or just attach new products to a request
     *
     * @param $id
     * @return json
     */
    public function saveRequest($id)
    {
        // decode the parameter
        $products = json_decode(Input::get('products'));

        return Response::json($this->request($id, $products));
    }
}
