<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\LoginAttempts;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login'])->middleware('LogingAtempts');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth:sanctum');
Route::get('/profile', [UserController::class, 'profile'])->middleware(['throttle:profilec', 'auth:sanctum']);

// Route::get('/posts', function () {
//     return response()->json([
//         "message" => "Post List"
//     ]);
// })->middleware(['throttle:list']);
