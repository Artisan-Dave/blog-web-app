<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//Auth Routes
Route::get('auth/login',[AuthController::class,'getLogin']);
Route::post('auth/login',[AuthController::class,'postLogin']);
Route::get('auth/logout',[AuthController::class,'getLogout']);

//Registration Routes
Route::get('auth/register',[AuthController::class,'getRegister']);
Route::post('auth/register',[AuthController::class,'getpostRegister'])->name('auth.store');

Route::get('/blog/{slug}',[BlogController::class,'getSingle'])->name('blog.single')
->where('slug','[\w\d\-\_]+');
Route::get('/blog',[BlogController::class,'getArchive'])->name('blog.index');

// Welcome page routes
Route::get('/contact', [PagesController::class,'getContact']);
Route::get('/about', [PagesController::class,'getAbout']);
Route::get('/', [PagesController::class,'getIndex']);

// Post routes
Route::resource('posts',PostController::class);







