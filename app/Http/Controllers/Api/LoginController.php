<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = $request->validated();

        return response()->json([
            'message' => 'User Logged In',
            'data' => $user
        ], 200);
    }
}
