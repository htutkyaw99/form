<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'statusCode' => 401,
                'message' => 'Invalidated Credentials',
            ], 401);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'statusCode' => 200,
            'message' => 'User Logged In',
            'data' => new UserResource($user),
            'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'statusCode' => 200,
            'message' => 'User Logged Out',
        ], 200);
    }
}
