<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (!auth()) {
        return redirect('login');
    }
    return redirect('dashboard');
});

//auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy']);
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
});

//posts routes
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store'])->name('post.create');
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::post('/posts/{post}/delete', [PostController::class, 'destroy'])->name('post.delete');
