<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        //route rate limiting
        // RateLimiter::for('login', function (Request $request) {
        //     return Limit::perMinute(2)->response(function (Request $request, array $headers) {
        //         return redirect()->back()->withErrors(['login' => 'Too many attempts...']);
        //     });
        // });


        // Custom Response
        RateLimiter::for('profilec', function (Request $request) {
            return Limit::perMinute(5)->response(function (Request $request, array $headers) {
                return response()->json([
                    'statusCode' => 429,
                    'message' => 'You exceed the request limit'
                ], 429);
            })->by($request->user()?->id ?: $request->ip());
        });
    }
}
