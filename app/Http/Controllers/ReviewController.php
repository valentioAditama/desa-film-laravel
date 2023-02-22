<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // 
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
    // Handling error
    try {
      // Validate form
      Validator::make($request->all(), [
        'starReview' => ['required'],
        'previewDescription' => ['required', 'string']
      ]);

      // store data to table review
      Review::create([
        'id_movie' => $request->id_movie,
        'id_user' => $request->user()->id,
        'rating' => $request->starReview,
        'preview' => $request->previewDescription
      ]);

      // success messages
      return redirect()->back()->with('success', 'Successfully To Add Rating, Thank you!');
    } catch (\Throwable $th) {
      // Failed Message
      return redirect()->back()->with('failed', 'there is something wrong with the system');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id, Request $request)
  {
    // if opened using category
    $categoryShowing = DB::table('category')
      ->where('id', '=', $id)
      ->first();

    if ($categoryShowing) {
      // if using access from category
      // Get data using joining table
      $data = DB::table('movie')
        ->where('movie.id', '=', $id)
        ->join('category', 'movie.id_category', '=', 'category.id')
        ->select('*', 'category.id as id_category', 'movie.id as id')
        ->first();
    } else {
      // if using home access
      // Get data using joining table
      $data = DB::table('movie')
        ->where('movie.id', '=', $id)
        ->join('category', 'movie.id_category', '=', 'category.id')
        ->select('*', 'category.id as id_category', 'movie.id as id')
        ->first();
    }

    return view('user.review.review', compact('data'));
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
