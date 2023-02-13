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
            ->paginate(12);

        return view('user.dashboard.home', compact('data'));
    }

    public function searchMovie(Request $request)
    {
        // Searching movie data in home page users
        $searchMovie = DB::table('movie')
            ->where('title', 'LIKE', '%' . $request->searchMovie . '%')
            ->paginate(12);

        // return value for search bar
        $searchResult = $request->searchMovie;

        return view('user.dashboard.searchMovie', compact('searchMovie', 'searchResult'));
    }
}
