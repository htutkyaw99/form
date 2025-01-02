<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {
        $user = $request->validated();

        $authUser = User::where('email', $user['email'])->first();

        if ($authUser) {
            return new UserResource($authUser);
        }

        return response()->json([
            'status' => 401,
            'message' => 'Invalid credentials.',
        ], 401);
    }
}
