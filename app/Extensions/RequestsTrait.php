<?php namespace App\Extensions;

use App\Boards;
use App\Products;
use App\Requests;
use App\RequestsObservation;
use App\Status;

trait RequestsTrait
{
    /**
     * Generate the request, check if has a board opened, if not
     * will create a new request and attach the products to this
     * request, otherwise, will just attach the product to the
     * current request.
     *
     * @param int $id board id
     * @param array $parameters
     * @return array
     */
    public function request($id, array $parameters)
    {
        $board = Boards::findOrFail($id);
        $status = Status::findOrFail(1);

        $request = Requests::where(['boards_id' => $board->id, 'status_id' => $status->id])->first();

        try {
            if (is_null($request)) {
                $request = $this->newRequest($board, $status);
            }

            $this->attachProducts($request, $parameters);

            return ['message' => 'products added with success!'];
        } catch (\Exception $e) {
            return [
                'message' => 'an error occurred. check it.',
                'error_message' => $e->getMessage(),
                'error_line' => $e->getLine(),
                'error_file' => $e->getFile(),
            ];
        }
    }

    /**
     * Create a new Request and associate Board and Status to
     * this request
     *
     * @param Boards $board
     * @param Status $status
     * @return Requests
     */
    public function newRequest(Boards $board, Status $status)
    {
        // Generate a new Request
        $request = new Requests();

        // Associate the board
        $request->board()->associate($board);

        // Associate the status
        $request->status()->associate($status);

        // Save the request
        $request->save();

        return $request;
    }

    /**
     * Attach products to a Request object
     *
     * @param Requests $request
     * @param array $products
     */
    public function attachProducts(Requests $request, array $products)
    {
        // Loop through the products array
        // attach to this request
        foreach ($products as $productKey => $productInformation) {
            // cast to object
            $productInformation = (object) $productInformation;

            // Search for the product
            // if not found, fail
            $product = Products::findOrFail($productInformation->id);

            // Quantity
            $quantity = $productInformation->quantity;

            // Attach product and others parameters
            // into requests_products table
            $request->products()->attach($product, [
                'unity_price' => $product->price,
                'quantity' => $quantity,
                'total_price' => $product->price * $quantity
            ]);
        }

        // Save the request, with the attach
        $request->save();

        $this->insertObservationInProductRequest($request, $products);
    }

    /**
     * Insert the observation to the request_product
     *
     * @param Requests $request
     * @param array $products
     */
    public function insertObservationInProductRequest(Requests $request, array $products)
    {
        foreach ($products as $productKey => $productInformation) {
            // Check if the observation is empty or null
            if (empty($productInformation->observation) || is_null($productInformation->observation)) {
                continue;
            }

            // cast to object
            $productInformation = (object) $productInformation;

            // Search for the product that was inserted in the function
            // @see attachProducts()
            $productRequest = $request->products()->find($productInformation->id);

            // Create the RequestsObservations instance
            $requestsObservations = new RequestsObservation();
            $requestsObservations->requests_products_id = $productRequest->pivot->id;
            $requestsObservations->observation = $productInformation->observation;
            $requestsObservations->save();
        }
    }
}