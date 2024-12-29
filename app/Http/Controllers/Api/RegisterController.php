<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = $request->validated();

        return response()->json([
            'message' => 'User Registered',
            'data' => $user
        ], 201);
    }
}
