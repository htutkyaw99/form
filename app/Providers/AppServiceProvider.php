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
        RateLimiter::for('profile', function (Request $request) {
            return Limit::perMinute(5)->by($request->user()?->id ?: $request->ip());
        });

        // Custom Response
        // RateLimiter::for('list', function (Request $request) {
        //     return Limit::perMinute(5)->response(function (Request $request, array $headers) {
        //         return response('You exceed the request limit', 429, $headers);
        //     })->by($request->user()?->id ?: $request->ip());
        // });
    }
}
