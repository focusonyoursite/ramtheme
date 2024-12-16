<?php
// Include WordPress
require_once('../../../wp-load.php');

// Debug informatie
echo '<h1>WordPress Debug Info</h1>';

// Theme informatie
echo '<h2>Current Theme</h2>';
echo '<pre>';
print_r(wp_get_theme());
echo '</pre>';

// Template informatie
echo '<h2>Template Hierarchy</h2>';
echo '<pre>';
global $template;
echo $template;
echo '</pre>';

// Active plugins
echo '<h2>Active Plugins</h2>';
echo '<pre>';
print_r(get_option('active_plugins'));
echo '</pre>';

// WordPress versie
echo '<h2>WordPress Version</h2>';
echo get_bloginfo('version');

// PHP versie
echo '<h2>PHP Version</h2>';
echo PHP_VERSION;

// Server informatie
echo '<h2>Server Software</h2>';
echo $_SERVER['SERVER_SOFTWARE'];

// Document root
echo '<h2>Document Root</h2>';
echo $_SERVER['DOCUMENT_ROOT'];

// Theme directory
echo '<h2>Theme Directory</h2>';
echo get_template_directory();

// Theme URL
echo '<h2>Theme URL</h2>';
echo get_template_directory_uri();
 