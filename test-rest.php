<?php
// Load WordPress
require_once dirname(__FILE__) . '/../../wp-load.php';

// Test REST API
$response = rest_do_request(new WP_REST_Request('GET', '/'));
if (is_wp_error($response)) {
    echo "Error: " . $response->get_error_message();
} else {
    echo "Response code: " . $response->get_status();
    echo "\nResponse data: ";
    print_r($response->get_data());
}

// Test permissions
echo "\n\nREST API Permissions:\n";
echo "rest_enabled: " . (rest_enabled() ? 'true' : 'false') . "\n";
echo "is_rest_enabled_for_request: " . (is_rest_enabled_for_request() ? 'true' : 'false') . "\n";
echo "rest_authorization_required: " . (rest_authorization_required() ? 'true' : 'false') . "\n";

// Test environment
echo "\n\nEnvironment:\n";
echo "PHP Version: " . phpversion() . "\n";
echo "WordPress Version: " . get_bloginfo('version') . "\n";
echo "REST API Version: " . rest_get_api_version() . "\n";
echo "Current Theme: " . wp_get_theme()->get('Name') . "\n";

// Test active plugins
echo "\n\nActive Plugins:\n";
$active_plugins = get_option('active_plugins');
foreach ($active_plugins as $plugin) {
    echo "- " . $plugin . "\n";
} 