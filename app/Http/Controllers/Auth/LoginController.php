<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {

        if (RateLimiter::tooManyAttempts('login' . $request->ip(), $perMinute = 5)) {
            return 'Too many attempts!';
        }

        if (Auth::attempt($request->validated())) {

            $request->session()->regenerate();

            RateLimiter::clear('login' . $request->ip());

            return redirect('dashboard');
            // dd($request->user()->createToken()->accessToken());
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
