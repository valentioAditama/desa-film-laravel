<?php

use App\Http\Controllers\API\DataMovieController;
use App\Http\Controllers\API\DataUsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/movie', [DataMovieController::class, 'index'])->name('index');
Route::get('/user', [DataUsersController::class, 'index'])->name('index');
