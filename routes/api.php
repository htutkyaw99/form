<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Middleware\LoginAttempts;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login'])->middleware('LogingAtemmpts');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/posts', function () {
    return response()->json([
        "message" => "Post List"
    ]);
})->middleware(['throttle:list']);
