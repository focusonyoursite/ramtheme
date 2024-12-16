<?php

namespace App\Providers;

use Roots\Acorn\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Filesystem\Filesystem;
use Roots\Acorn\Sage\SageServiceProvider;
use Roots\Acorn\View\Composer\Composer;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register the Sage Service Provider
        $this->app->register(SageServiceProvider::class);

        // Register the filesystem
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
        // Ensure storage directories exist and are writable
        $this->ensureStorageDirectories();

        /**
         * Register view composers
         * @link https://laravel.com/docs/9.x/views#view-composers
         */
        if (class_exists('\App\View\Composers\App')) {
            View::composer('*', \App\View\Composers\App::class);
        }

        if (class_exists('\App\View\Composers\Header')) {
            View::composer('partials.header', \App\View\Composers\Header::class);
        }

        if (class_exists('\App\View\Composers\Footer')) {
            View::composer('partials.footer', \App\View\Composers\Footer::class);
        }

        if (class_exists('\App\View\Composers\Sidebar')) {
            View::composer('partials.sidebar', \App\View\Composers\Sidebar::class);
        }

        if (class_exists('\App\View\Composers\Navigation')) {
            View::composer('partials.navigation', \App\View\Composers\Navigation::class);
        }

        if (class_exists('\App\View\Composers\Post')) {
            View::composer('partials.entry-meta', \App\View\Composers\Post::class);
        }
    }

    /**
     * Ensure all required storage directories exist and are writable
     */
    protected function ensureStorageDirectories()
    {
        $directories = [
            $this->app->storagePath(),
            $this->app->storagePath('framework'),
            $this->app->storagePath('framework/cache'),
            $this->app->storagePath('framework/views'),
        ];

        foreach ($directories as $directory) {
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }
        }
    }
}
