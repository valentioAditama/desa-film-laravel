<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // data count for data users container and table
        $dataUser = User::all()->count('id');
        $dataUserTable = DB::table('users')
            ->latest('users.updated_at')
            ->paginate(5);

        // data count for data movie container and table
        $dataMovie = Movie::all()->count('id');
        $dataMovieTable = DB::table('movie')
            ->join('category', 'movie.id_category', '=', 'category.id')
            ->latest('movie.updated_at')
            ->paginate(5);

        // data count for data review and table
        $dataReview = Review::all()->count('id');
        $dataReviewTable = DB::table('review')
            ->latest('review.updated_at')
            ->paginate(5);

        return view('admin.dashboard.dashboard', compact(
            'dataUser',
            'dataUserTable',
            'dataMovie',
            'dataMovieTable',
            'dataReview',
            'dataReviewTable'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
