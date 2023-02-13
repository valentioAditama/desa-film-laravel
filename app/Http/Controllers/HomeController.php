<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // showing movie data in home page users
        $data = DB::table('movie')
            ->latest('movie.updated_at')
            ->paginate(9);

        return view('user.dashboard.home', compact('data'));
    }
}
