<?php

namespace App\Http\Controllers;

use App\Boards;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class BoardsController extends Controller
{
    /**
     * Get the board
     *
     * @param int $id board id
     * @return json
     */
    public function index($id)
    {
        return Response::json(Boards::find($id) ?: [
            'message' => 'error to find board. Check if is the correct board.',
            'return' => null,
        ]);
    }
}
