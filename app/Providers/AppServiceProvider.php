<?php

namespace App\Providers;

use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('pagination::view');
        Paginator::defaultSimpleView('pagination::view');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('partials.manage.menu', function ($view) {
            /** @var \Illuminate\View\View $view */
            $view->with('currentUser', Auth::user());
        });
    }
}
