<?php
// Diagnostic endpoint
header('Content-Type: application/json');
echo json_encode([
    'status' => 'ok',
    'php_version' => phpversion(),
    'extensions' => get_loaded_extensions(),
    'memory_limit' => ini_get('memory_limit'),
    'vendor_autoload' => file_exists(__DIR__ . '/../vendor/autoload.php'),
    'composer_json' => file_exists(__DIR__ . '/../composer.json'),
    'timestamp' => date('Y-m-d H:i:s'),
]);
