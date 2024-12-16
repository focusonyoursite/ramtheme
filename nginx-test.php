<?php
// Show server information
echo "Server software: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
echo "Server protocol: " . $_SERVER['SERVER_PROTOCOL'] . "\n";
echo "Request method: " . $_SERVER['REQUEST_METHOD'] . "\n";
echo "Request URI: " . $_SERVER['REQUEST_URI'] . "\n";
echo "Script name: " . $_SERVER['SCRIPT_NAME'] . "\n";
echo "PHP SAPI: " . php_sapi_name() . "\n";

// Show headers
echo "\nRequest headers:\n";
foreach (getallheaders() as $name => $value) {
    echo "$name: $value\n";
}

// Show PHP configuration
echo "\nPHP configuration:\n";
echo "max_execution_time: " . ini_get('max_execution_time') . "\n";
echo "memory_limit: " . ini_get('memory_limit') . "\n";
echo "post_max_size: " . ini_get('post_max_size') . "\n";
echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "\n";
echo "display_errors: " . ini_get('display_errors') . "\n";

// Test file permissions
echo "\nFile permissions:\n";
echo "Current file permissions: " . substr(sprintf('%o', fileperms(__FILE__)), -4) . "\n";
echo "Parent directory permissions: " . substr(sprintf('%o', fileperms(dirname(__FILE__))), -4) . "\n";

// Test write permissions
$test_file = dirname(__FILE__) . '/write-test.txt';
$can_write = @file_put_contents($test_file, 'test');
echo "Can write to theme directory: " . ($can_write !== false ? 'Yes' : 'No') . "\n";
if ($can_write !== false) {
    unlink($test_file);
} 