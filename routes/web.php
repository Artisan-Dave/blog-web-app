<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//Auth Routes
Route::get('auth/login',[AuthController::class,'getLogin'])->name('login')->middleware('guest');
Route::post('auth/login',[AuthController::class,'postLogin'])->name('auth.login')->middleware('guest');
Route::get('auth/logout',[AuthController::class,'getLogout'])->name('auth.logout')->middleware('auth');

//Registration Routes
Route::get('auth/register',[AuthController::class,'getRegister'])->middleware('guest');
Route::post('auth/register',[AuthController::class,'getpostRegister'])->name('auth.store')->middleware('guest');

Route::get('/blog/{slug}',[BlogController::class,'getSingle'])->name('blog.single')
->where('slug','[\w\d\-\_]+');
Route::get('/blog',[BlogController::class,'getArchive'])->name('blog.index');

// Welcome page routes
Route::get('/contact', [PagesController::class,'getContact']);
Route::get('/about', [PagesController::class,'getAbout']);
Route::get('/', [PagesController::class,'getIndex'])->middleware('web');

// Post routes
Route::resource('posts',PostController::class)->middleware('auth');

//checking sessions
Route::get('/check', function () {
    return [
        'auth_check' => Auth::check(),
        'user' => Auth::user(),
        'session' => session()->all(),
    ];
});







