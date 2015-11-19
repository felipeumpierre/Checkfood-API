<?php

namespace App\Http\Controllers;

use App\Boards;

class RequestsController extends Controller
{
    public function index($id)
    {
        $board = Boards::findOrFail($id);

        dump($board);
    }
}
