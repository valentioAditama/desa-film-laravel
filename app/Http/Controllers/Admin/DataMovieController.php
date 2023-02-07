<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DataMovieController extends Controller
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
        return view('admin.movie.movie');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate Form
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'link_film' => ['required', 'string'],
            'link_trailer' => ['required', 'string'],
            'poster' => ['required', 'string'],
        ]);


        $insert = [
            'title' => $request->title,
            'description' => $request->description,
            'link_film' => $request->link_film,
            'poster' => $request->poster,
            'link_trailer' => $request->link_trailer
        ];

        $insertCategory = [
            'category' => $request->category
        ];

        return DB::table('movie')->insert($insert);
        DB::table('category')->insert($insertCategory);



        // Check data if data has been save
        try {
            $insert = [
                'title' => $request->title,
                'description' => $request->description,
                'link_film' => $request->link_film,
                'poster' => $request->poster,
                'link_trailer' => $request->link_trailer
            ];

            $insertCategory = [
                'category' => $request->category
            ];

            return DB::table('movie')->insert($insert);
            DB::table('category')->insert($insertCategory);

            return redirect('/dataMovie')->with('success', 'Data Has Been Saved');
        } catch (\Throwable $th) {
            return redirect('/dataMovie')->with('failed', 'there is something wrong with the system');
        }
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
