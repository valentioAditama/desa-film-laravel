<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DataUsersController extends Controller
{
    public function index()
    {
        // get data users for login using api
        $data = User::latest()->paginate(10);

        return Response::json([
            'success' => true,
            'messages' => 'Successfully get data users',
            'data' => $data
        ], 200);
    }
}
