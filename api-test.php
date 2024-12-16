<?php
// Basic error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Load WordPress
require_once dirname(__FILE__) . '/../../wp-load.php';

// Basic WordPress test
echo "WordPress is loaded: " . (defined('ABSPATH') ? 'Yes' : 'No') . "\n";
echo "WordPress version: " . $wp_version . "\n";

// Test if REST API class exists
echo "WP_REST_Server exists: " . (class_exists('WP_REST_Server') ? 'Yes' : 'No') . "\n";

// Test basic WordPress functions
echo "get_bloginfo works: " . (function_exists('get_bloginfo') ? 'Yes' : 'No') . "\n";
echo "Site name: " . get_bloginfo('name') . "\n";

// Test REST API specific functions
echo "rest_get_url_prefix exists: " . (function_exists('rest_get_url_prefix') ? 'Yes' : 'No') . "\n";
if (function_exists('rest_get_url_prefix')) {
    echo "REST URL prefix: " . rest_get_url_prefix() . "\n";
}

// Memory usage
echo "Memory usage: " . memory_get_usage() / 1024 / 1024 . " MB\n";
echo "Memory limit: " . ini_get('memory_limit') . "\n";

// Include path
echo "Include path: " . get_include_path() . "\n";

// Current file location
echo "Current file: " . __FILE__ . "\n";
echo "ABSPATH: " . ABSPATH . "\n"; 