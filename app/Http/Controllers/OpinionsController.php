<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Opinions;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Console\Input\Input;

class OpinionsController extends Controller
{
    public function add()
    {
        $opinion = json_decode(Input::get('products'));

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
