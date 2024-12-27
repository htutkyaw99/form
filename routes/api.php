<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
