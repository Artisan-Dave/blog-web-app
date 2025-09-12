<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/contact', [PagesController::class,'getContact']);

Route::get('/about', [PagesController::class,'getAbout']);

Route::get('/', [PagesController::class,'getIndex']);

Route::resource('posts',PostController::class);







