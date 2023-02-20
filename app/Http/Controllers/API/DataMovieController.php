<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DataMovieController extends Controller
{
    public function index()
    {
        // get data all for api public 
        $data = Movie::latest()->paginate(10);

        return Response::json([
            'success' => true,
            'messages' => 'Successfully get data Movie',
            'data' => $data
        ], 200);
    }
}
