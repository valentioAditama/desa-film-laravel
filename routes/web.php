<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('isUser');
// Route::get('/dashboard', [App\Http\Controllers\Admin\Dashboard::class, 'index'])->middleware('isAdmin');

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\Dashboard::class, 'index'])->name('dashboard');
    Route::get('/dataUser', [App\Http\Controllers\Admin\DataUsersController::class, 'index'])->name('dataUser');
    Route::get('/dataMovie', [App\Http\Controllers\Admin\DataMovieController::class, 'index'])->name('dataMovie');
    Route::get('/dataReview', [App\Http\Controllers\Admin\DataReviewController::class, 'index'])->name('dataReview');
});

Route::group(['middleware' => ['auth', 'isUser']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
