<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.layoutpublic', function ($view) {
            $user = Auth::user();
            $unreadNotifications = $user ? $user->unreadNotifications : collect();
            $view->with('unreadNotifications', $unreadNotifications);
        });
    }
}
