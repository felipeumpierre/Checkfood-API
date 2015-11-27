<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Opinions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class OpinionsController extends Controller
{
    public function add(Request $request)
    {
        $requests = (object) $request->all();

        try {
            $opinion = new Opinions();
            $opinion->grade = $requests->grade;
            $opinion->opinion = $requests->opinion;
            $opinion->save();

            return Response::json([
                'message' => 'Opinion saved with success.',
                'return' => 1,
            ]);
        } catch (\Exception $e) {
            return Response::json([
                'message' => 'error to save opinion. Try again.',
                'return' => null,
            ]);
        }
    }

    public function listOpinions()
    {
        return Response::json(Opinions::all() ?: [
            'message' => 'No opinions found.',
            'return' => null,
        ]);
    }
}
