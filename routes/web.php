<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BeatController;


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

// Route::get('/', function () {
//     return view('index');
// })->name('index');

//index
Route::get('/', [IndexController::class, 'index'])->name('index');

Route::middleware('login')->group(function () {
    // route pour post
    Route::get('/new_post', [PostController::class, 'create'])->name('post.create');
    Route::post('/new_post', [PostController::class, 'store'])->name('post.store');

    //likes
    Route::post('/like_post/{id}', [LikesController::class, 'like'])->name('post.like');
    Route::post('/like_beat/{id}', [LikesController::class, 'likeBeat'])->name('beat.like');

    Route::middleware('admin')->group(function() {
        // route pour beat
        Route::get('/new_beat', [BeatController::class, 'create'])->name('beat.create');
        Route::post('/new_beat', [BeatController::class, 'store'])->name('beat.store');
    });
});

//signup
Route::get('/inscription', [SignupController::class, 'index'])->name('signup.index');
Route::post('/inscription', [SignupController::class, 'store'])->name('signup.store');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');

//logout
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');



