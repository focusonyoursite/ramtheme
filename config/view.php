<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most template systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views.
    |
    */

    'paths' => [
        get_theme_file_path('/resources/views'),
        get_parent_theme_file_path('/resources/views'),
    ],


    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the uploads
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => get_theme_file_path('storage/framework/views'),


    /*
    |--------------------------------------------------------------------------
    | View Namespaces
    |--------------------------------------------------------------------------
    |
    | Blade has an underutilized feature that allows developers to add
    | supplemental view paths that may contain conflictingly named views.
    | These paths are prefixed with a namespace to get around the conflicts.
    | A use case might be including views from within a plugin folder.
    |
    */

    'namespaces' => [
        /* Given the below example, in your views use something like: @include('WC::some.view.or.partial.here') */
        // 'WC' => WP_PLUGIN_DIR.'/woocommerce/templates/',
    ],

    /*
    |--------------------------------------------------------------------------
    | View Directives
    |--------------------------------------------------------------------------
    |
    | Hier definiëren we de Blade directives die beschikbaar zijn in onze views.
    | Deze directives worden gebruikt om extra functionaliteit toe te voegen
    | aan onze Blade templates.
    |
    */
    'directives' => [
        'asset' => Roots\Acorn\Assets\AssetDirective::class,
        'style' => Roots\Acorn\Assets\StyleDirective::class,
        'script' => Roots\Acorn\Assets\ScriptDirective::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | View Composers
    |--------------------------------------------------------------------------
    |
    | View composers allow you to attach data to views whenever they are rendered.
    | This is particularly useful when you want to bind data to certain views
    | that are rendered in many different places across your application.
    |
    */

    'composers' => [
        'App\View\Composers\App' => ['*'],
        'App\View\Composers\Header' => ['partials.header'],
        'App\View\Composers\Footer' => ['partials.footer'],
        'App\View\Composers\Sidebar' => ['partials.sidebar'],
        'App\View\Composers\Navigation' => ['partials.navigation'],
        'App\View\Composers\Post' => ['partials.entry-meta'],
    ],
]; 