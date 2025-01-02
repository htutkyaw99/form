<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $authUser = User::where('email', 'aungaung@gmail.com')->first();

        return response()->json([
            'status' => 200,
            'message' => 'User Profile',
            'data' => new UserResource($authUser)
        ], 200);
    }
}
