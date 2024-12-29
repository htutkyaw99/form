<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    private $users = [
        [
            'email' => 'test1@example.com',
            'password' => 'password123',
            'name' => 'Test User 1',
        ],
        [
            'email' => 'test2@example.com',
            'password' => 'password456',
            'name' => 'Test User 2',
        ],
    ];

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

        foreach ($this->users as $user) {
            if ($user['email'] === $request->email && $user['password'] === $request->password) {
                RateLimiter::clear($key);
                return response()->json([
                    'message' => 'Login successful!',
                    'user' => $user
                ]);
            }
        }

        RateLimiter::hit($key, $decayMinutes * 60);

        return response()->json([
            'message' => 'Invalid credentials.',
        ], 401);
    }
}
