<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    return view('home');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    // Dashboard Admin
    Route::get('/dashboard', [App\Http\Controllers\Admin\Dashboard::class, 'index'])->name('dashboard');

    // Data User
    Route::get('/dataUser', [App\Http\Controllers\Admin\DataUsersController::class, 'index'])->name('dataUser');
    Route::post('/dataUser/post', [App\Http\Controllers\Admin\DataUsersController::class, 'store'])->name('dataUser-post');
    Route::post('/dataUser/update/{id}', [App\Http\Controllers\Admin\DataUsersController::class, 'update'])->name('dataUser-update');
    Route::post('/dataUser/delete/{id}', [App\Http\Controllers\Admin\DataUsersController::class, 'destroy'])->name('dataUser-delete');

    // Data Movie
    Route::get('/dataMovie', [App\Http\Controllers\Admin\DataMovieController::class, 'index'])->name('dataMovie');
    Route::get('/dataMovie/create', [App\Http\Controllers\Admin\DataMovieController::class, 'create'])->name('dataMovie-create');
    Route::post('/dataMovie/post', [App\Http\Controllers\Admin\DataMovieController::class, 'store'])->name('dataMovie-post');
    Route::post('/dataMovie/update/{id}', [App\Http\Controllers\Admin\DataMovieController::class, 'update'])->name('dataMovie-update');
    Route::post('/dataMovie/delete/{id}', [App\Http\Controllers\Admin\DataMovieController::class, 'destroy'])->name('dataMovie-delete');

    // Data Review
    Route::get('/dataReview', [App\Http\Controllers\Admin\DataReviewController::class, 'index'])->name('dataReview');
});

Route::group(['middleware' => ['auth', 'isUser']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
