<?php

namespace App\Http\Controllers;

use App\Boards;
use App\Extensions\ListsTrait;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class BoardsController extends Controller
{
    use ListsTrait;

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

    /**
     * Get all boards
     *
     * @return json
     */
    public function all()
    {
        $boards = Boards::all();

        $this->addListsCollection($boards, ['status']);

        return Response::json($boards);
    }
}
