<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create($validated);

        $token = $user->createToken($user->email);

        return response()->json([
            'statusCode' => 201,
            'message' => 'User Registered',
            'data' => $user,
            'token' => $token->plainTextToken
        ], 201);
    }
}
