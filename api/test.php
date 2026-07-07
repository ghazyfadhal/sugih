<?php
// Ultra-minimal test - no Laravel, no vendor
echo json_encode([
    'status' => 'ok',
    'php_version' => phpversion(),
    'extensions' => get_loaded_extensions(),
    'memory_limit' => ini_get('memory_limit'),
    'timestamp' => date('Y-m-d H:i:s'),
]);
