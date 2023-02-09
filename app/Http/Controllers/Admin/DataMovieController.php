<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        // Get for container count data from data movie
        $dataContainer = Movie::all()->count('id');

        // Get data using joining table
        $data = DB::table('movie')
            ->join('category', 'movie.id_category', '=', 'category.id')
            ->latest('movie.updated_at')
            ->paginate(10);

        return view('admin.movie.movie', compact('dataContainer', 'data'));
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
            'poster' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        // Handling Catch Error
        try {
            // Category table insert and get add variable for get id category
            $category = Category::create([
                'category' => $request->category
            ]);

            // store file to image public
            $imageName = time() . '.' . $request->poster->extension();

            $request->poster->storeAs('public/images', $imageName);

            // Movie Table insert
            Movie::create([
                'title' => $request->title,
                'description' => $request->description,
                'id_category' => $category->id,
                'link_film' => $request->link_film,
                'poster' => $imageName,
                'link_trailer' => $request->link_trailer
            ]);

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
        // define id for table movie 
        $data = DB::table('movie')->where('id_category', '=', $id)->first();

        // Delete old image in public 
        Storage::delete('public/images', $data->poster);

        // Create category from table category
        $category = Category::create([
            'category' => $request->category
        ]);

        // store file to image public
        $imageName = time() . '.' . $request->poster->extension();

        $request->poster->storeAs('public/images', $imageName);

        // Movie Table insert
        Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'id_category' => $category->id,
            'link_film' => $request->link_film,
            'poster' => $imageName,
            'link_trailer' => $request->link_trailer
        ]);

        // handling error
        try {
            // updated data 
            $data->update();
            return redirect('/dataMovie')->with('data-updated', 'Data has Been Updated');
        } catch (\Throwable $th) {
            return redirect('/dataMovie')->with('failed', 'There is something wrong with the system');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Define Data users from id
        $data = DB::table('movie')->where('id_category', '=', $id)->first();

        // Try Cathing handling error
        try {
            $data->delete();
            return redirect('/dataMovie')->with('data-deleted', 'Data Has Been Deleted');
        } catch (\Throwable $th) {
            return redirect('/dataMovie')->with('failed', 'there is something wrong with the system');
        }
    }
}
