<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Default showing and searching showing movie
        $showingSearch = DB::table('movie')
            ->join('category', 'movie.id_category', '=', 'category.id')
            ->where('category.category', 'LIKE', '%' . $request->searchCategory . '%')
            ->paginate(12);

        // return back to value input elements searching 
        $searchValue = $request->searchCategory;

        return view('user.category.category', compact('showingSearch', 'searchValue'));
    }
}
