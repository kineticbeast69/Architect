<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
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
        // admin role gate
        Gate::define("isAdmin", function (User $user) {
            return $user->role === "admin";
        });
        // editor role gate
        Gate::define('isWriter', function (User $user) {
            return $user->role === "writer";
        });

    }
}
