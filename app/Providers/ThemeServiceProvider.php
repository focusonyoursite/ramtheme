<?php

namespace App\Providers;

use Roots\Acorn\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Filesystem\Filesystem;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('files', function () {
            return new Filesystem;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Register view composers
         * @link https://laravel.com/docs/9.x/views#view-composers
         */
        View::composer('*', \App\View\Composers\App::class);
        View::composer('partials.header', \App\View\Composers\Header::class);
        View::composer('partials.footer', \App\View\Composers\Footer::class);
        View::composer('partials.sidebar', \App\View\Composers\Sidebar::class);
        View::composer('partials.navigation', \App\View\Composers\Navigation::class);
        View::composer('partials.entry-meta', \App\View\Composers\Post::class);
    }
}
