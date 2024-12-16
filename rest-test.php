<?php
// Basic error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Load WordPress
require_once '/sites/ramsite.nl/files/wp-load.php';

// Initialize REST API
require_once ABSPATH . WPINC . '/rest-api.php';

// Test REST API initialization
echo "Testing REST API Initialization:\n";
echo "-----------------------------\n";

// Check if REST API is loaded
echo "1. REST API Classes:\n";
echo "WP_REST_Server exists: " . (class_exists('WP_REST_Server') ? 'Yes' : 'No') . "\n";
echo "WP_REST_Request exists: " . (class_exists('WP_REST_Request') ? 'Yes' : 'No') . "\n";
echo "WP_REST_Response exists: " . (class_exists('WP_REST_Response') ? 'Yes' : 'No') . "\n";

// Check REST API functions
echo "\n2. REST API Functions:\n";
echo "rest_get_url_prefix exists: " . (function_exists('rest_get_url_prefix') ? 'Yes' : 'No') . "\n";
echo "rest_url exists: " . (function_exists('rest_url') ? 'Yes' : 'No') . "\n";
echo "rest_api_init exists: " . (function_exists('rest_api_init') ? 'Yes' : 'No') . "\n";

// Get REST API URLs
echo "\n3. REST API URLs:\n";
echo "REST URL Prefix: " . rest_get_url_prefix() . "\n";
echo "Full REST URL: " . get_rest_url(null, '') . "\n";
echo "Site URL: " . get_site_url() . "\n";

// Test REST API request
echo "\n4. Testing REST API Request:\n";
$request = new WP_REST_Request('GET', '/wp/v2/posts');
$response = rest_do_request($request);
echo "Response Status: " . $response->get_status() . "\n";
echo "Response Data: " . print_r($response->get_data(), true) . "\n";

// Check REST API permissions
echo "\n5. REST API Permissions:\n";
echo "REST API Enabled: " . (rest_enabled() ? 'Yes' : 'No') . "\n";
echo "REST API Authentication Required: " . (rest_authorization_required() ? 'Yes' : 'No') . "\n";

// Test specific endpoints
echo "\n6. Testing Specific Endpoints:\n";
$endpoints = array(
    '/wp/v2/posts',
    '/wp/v2/pages',
    '/wp/v2/users',
    '/wp/v2/settings'
);

foreach ($endpoints as $endpoint) {
    $request = new WP_REST_Request('GET', $endpoint);
    $response = rest_do_request($request);
    echo "Endpoint $endpoint: " . ($response->get_status() === 200 ? 'OK' : 'Failed (' . $response->get_status() . ')') . "\n";
} 