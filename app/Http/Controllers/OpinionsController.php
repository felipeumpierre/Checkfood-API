<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Opinions;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;

class OpinionsController extends Controller
{
    public function add()
    {
        $opinion = json_decode(Input::get('opinion'));

        try {
            $newOpinion = new Opinions($opinion);

            return Response::json($newOpinion);
        } catch (\Exception $e) {
            return Response::json([
                'message' => 'error to save opinion. Try again.',
                'return' => null,
            ]);
        }
    }
}
