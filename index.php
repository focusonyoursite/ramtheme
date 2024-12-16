<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

// Basic error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Debug information
echo "<!-- Debug: Starting index.php -->\n";

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    echo "<!-- Debug: Composer autoload not found -->\n";
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

echo "<!-- Debug: Composer autoload loaded -->\n";

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

try {
    if (! function_exists('\Roots\bootloader')) {
        echo "<!-- Debug: Roots bootloader not found -->\n";
        wp_die(
            __('You need to install Acorn to use this theme.', 'sage'),
            '',
            [
                'link_url' => 'https://roots.io/acorn/docs/installation/',
                'link_text' => __('Acorn Docs: Installation', 'sage'),
            ]
        );
    }

    echo "<!-- Debug: Starting bootloader -->\n";
    \Roots\bootloader()->boot();
    echo "<!-- Debug: Bootloader completed -->\n";

} catch (Exception $e) {
    echo "<!-- Debug Error: " . esc_html($e->getMessage()) . " -->\n";
    echo "<!-- Debug Trace: " . esc_html($e->getTraceAsString()) . " -->\n";
}

echo view(app('sage.view'), app('sage.data'))->render();
