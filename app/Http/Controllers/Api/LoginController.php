<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {
        $user = $request->validated();

        $key = 'login:' . $request->ip();
        $maxAttempts = 5;
        $decayMinutes = 1;

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            return response()->json([
                'message' => 'Too many login attempts. Please try again later.',
            ], 429);
        }

        $authUser = User::where('email', $user['email'])->first();

        if ($authUser) {
            RateLimiter::clear($key);
            return new UserResource($authUser);
        }

        RateLimiter::hit($key, $decayMinutes * 60);

        return response()->json([
            'message' => 'Invalid credentials.',
        ], 401);
    }
}
