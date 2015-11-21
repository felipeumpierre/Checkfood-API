<?php

namespace App\Http\Controllers;

use App\Boards;
use Illuminate\Support\Facades\Response;

class RequestsController extends Controller
{
    public function index($id)
    {
        $board = Boards::find($id);

        if ($board instanceof Boards) {
            if ($board->status_id == 1) {
                $board->status_id = 2;

                $board->save();

                return Response::json([
                    'message' => 'This board is now open.',
                    'return' => 1,
                ]);
            }

            return Response::json([
                'message' => 'This board is already opened.',
                'return' => null,
            ]);
        }

        return Response::json([
            'message' => sprintf('The board id: %d was not found.', $id),
            'return' => null,
        ]);
    }

    public function close($id)
    {
        $board = Boards::find($id);

        if ($board instanceof Boards) {
            if ($board->status_id != 1) {
                $board->status_id = 1;

                $board->save();

                return Response::json([
                    'message' => 'The board is now closed.',
                    'return' => 1,
                ]);
            }

            return Response::json([
                'message' => 'This board is already closed waiting for a customer.',
                'return' => null,
            ]);
        }

        return Response::json([
            'message' => sprintf('The board id: %d was not found.', $id),
            'return' => null,
        ]);
    }
}
