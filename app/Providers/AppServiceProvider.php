<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Pagination
        Paginator::useBootstrapFive();

        // Share Settings
        $settings = Setting::first() ?? new Setting();
        View::share('settings', $settings);

        // Define Gates هنا 👇
        Gate::define('create-post', function (User $user) {
            return $user->role == 'writer';
        });

        Gate::define('admin-control', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('update-post', function (User $user, Post $post) {
            return $user->id == $post->user_id || $user->role === 'admin';
        });
    }
}
