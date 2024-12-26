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

//auth
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LoginController::class, 'destroy']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [PostController::class, 'index'])->middleware('auth')->name('dashboard');

//post
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store'])->name('post.create');
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::post('/posts/{post}/delete', [PostController::class, 'destroy'])->name('post.delete');
