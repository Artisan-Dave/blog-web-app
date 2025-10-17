<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//Auth Routes
Route::get('auth/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('auth/login', [AuthController::class, 'postLogin'])->name('auth.login');
Route::get('auth/register', [AuthController::class, 'getRegister']);
Route::post('auth/register', [AuthController::class, 'getpostRegister'])->name('auth.store');
Route::get('auth/logout', [AuthController::class, 'getLogout'])->name('auth.logout');

//Password Reset
Route::get('password/reset/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/email', [PasswordController::class, 'sendResetLink'])->name('password.email');
Route::post('password/reset', [PasswordController::class, 'reset'])->name('password.update');
Route::get('password/reset', [PasswordController::class, 'forgotPassword']);

// Post routes
Route::resource('posts', PostController::class);

//checking sessions
Route::get('/check', function () {
        return [
            'auth_check' => Auth::check(),
            'user' => Auth::user(),
            'session' => session()->all(),
        ];
    });

//Categories
Route::resource('categories',CategoryController::class)->except(['create']);

Route::get('/blog/{slug}', [BlogController::class, 'getSingle'])->name('blog.single')->where('slug', '[\w\d\-\_]+');
Route::get('/blog', [BlogController::class, 'getArchive'])->name('blog.index');

// Welcome page routes
Route::get('/contact', [PagesController::class, 'getContact']);
Route::get('/about', [PagesController::class, 'getAbout']);
Route::get('/', [PagesController::class, 'getIndex']);









