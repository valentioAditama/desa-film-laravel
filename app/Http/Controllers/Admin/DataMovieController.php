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
        // Handling Catch Error
        try {

            // Validate Form
            Validator::make($request->all(), [
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'link_film' => ['required', 'string'],
                'link_trailer' => ['required', 'string'],
                'banner' => 'required|image|mimes:jpg,png,jpeg',
                'poster' => 'required|image|mimes:jpg,png,jpeg',
            ]);

            // Category table insert and get add variable for get id category
            $category = Category::create([
                'category' => $request->category
            ]);

            // store file to image public
            // image poster store to storage
            $imagePoster = time() . '.' . $request->poster->extension();
            $request->poster->storeAs('public/poster', $imagePoster);

            // image Banner store to storage
            $imageBanner = time() . '.' . $request->banner->extension();
            $request->banner->storeAs('public/banner', $imageBanner);


            // Movie Table insert
            Movie::create([
                'title' => $request->title,
                'description' => $request->description,
                'id_category' => $category->id,
                'link_film' => $request->link_film,
                'poster' => $imagePoster,
                'banner' => $imageBanner,
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
        // handling error
        try {
            // define id for table movie 
            $data = DB::table('movie')->where('id_category', '=', $id)->first();

            // passing data id movie to create using model
            $movie = Movie::find($data->id);

            // define id for table category 
            $dataCategory = DB::table('category')->where('id', '=', $data->id_category)->first();

            // passing data id Category to create using model
            $category = Category::find($dataCategory->id);

            // Delete old image in public 
            if ($request->hasFile('poster')) {
                $checkPoster = storage_path('app/public/poster/' . $data->poster);
                unlink($checkPoster);

                // store file to image public
                // image poster store to storage
                $imagePoster = time() . '.' . $request->poster->extension();
                $request->poster->storeAs('public/poster', $imagePoster);

                // updated data movie
                $movie->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'id_category' => $dataCategory->id,
                    'link_film' => $request->link_film,
                    'poster' => $imagePoster,
                    'link_trailer' => $request->link_trailer
                ]);
            } else {
                // updated data movie
                $movie->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'id_category' => $dataCategory->id,
                    'link_film' => $request->link_film,
                    'link_trailer' => $request->link_trailer
                ]);
            }

            // Delete old image banner in public 
            if ($request->hasFile('banner')) {
                $checkBanner = storage_path('app/public/banner/' . $data->banner);
                unlink($checkBanner);

                // store file to image public
                // image Banner store to storage
                $imageBanner = time() . '.' . $request->banner->extension();
                $request->banner->storeAs('public/banner', $imageBanner);

                // updated data movie
                $movie->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'id_category' => $dataCategory->id,
                    'link_film' => $request->link_film,
                    'banner' => $imageBanner,
                    'link_trailer' => $request->link_trailer
                ]);
            } else {
                // updated data movie
                $movie->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'id_category' => $dataCategory->id,
                    'link_film' => $request->link_film,
                    'link_trailer' => $request->link_trailer
                ]);
            }

            $category->update([
                'category' => $request->category
            ]);

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
        // Try Cathing handling error
        try {
            // Define Data users from id
            $dataMovie = DB::table('movie')
                // ->select('id as id_movie')
                ->where('id_category', '=', $id)
                ->first();

            // return $id using model Movie;
            $data = Movie::find($dataMovie->id);

            // Delete old image poster in public 
            $imagePoster = storage_path('app/public/poster/' . $dataMovie->poster);
            unlink($imagePoster);

            // Delete old image banner in public 
            $imageBanner = storage_path('app/public/banner/' . $dataMovie->banner);
            unlink($imageBanner);

            // delete function
            $data->delete();

            return redirect('/dataMovie')->with('data-deleted', 'Data Has Been Deleted');
        } catch (\Throwable $th) {
            return redirect('/dataMovie')->with('failed', 'there is something wrong with the system');
        }
    }
}
