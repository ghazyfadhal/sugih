<?php

// Diagnostic endpoint - test basic PHP and Laravel boot
header('Content-Type: application/json');

$checks = [];

// 1. PHP Version
$checks['php_version'] = phpversion();

// 2. Required extensions
$requiredExtensions = ['pdo', 'pdo_pgsql', 'pgsql', 'mbstring', 'openssl', 'tokenizer', 'xml', 'ctype', 'json'];
foreach ($requiredExtensions as $ext) {
    $checks['extensions'][$ext] = extension_loaded($ext);
}

// 3. Writable tmp
$checks['tmp_writable'] = is_writable('/tmp');

// 4. Vendor autoload exists
$checks['vendor_autoload'] = file_exists(__DIR__ . '/../vendor/autoload.php');

// 5. Key env vars (just check if set, don't expose values)
$envVars = ['APP_KEY', 'DB_HOST', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD', 'SUPABASE_URL'];
foreach ($envVars as $var) {
    $val = getenv($var) ?: ($_ENV[$var] ?? ($_SERVER[$var] ?? null));
    $checks['env'][$var] = $val ? 'SET (' . strlen($val) . ' chars)' : 'NOT SET';
}

// 6. Try to boot Laravel
try {
    $storagePath = '/tmp/storage';
    $bootstrapCache = '/tmp/bootstrap/cache';
    
    $directories = [
        $storagePath . '/app/public',
        $storagePath . '/framework/cache/data',
        $storagePath . '/framework/sessions',
        $storagePath . '/framework/testing',
        $storagePath . '/framework/views',
        $storagePath . '/logs',
        $bootstrapCache,
    ];
    
    foreach ($directories as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }
    
    putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");
    
    require __DIR__ . '/../vendor/autoload.php';
    $checks['autoload'] = 'OK';
    
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $app->useStoragePath($storagePath);
    $app->useBootstrapPath('/tmp/bootstrap');
    
    $kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
    $checks['laravel_boot'] = 'OK';
    
    // Try DB connection
    try {
        $app->make('db')->connection()->getPdo();
        $checks['database'] = 'OK';
    } catch (\Throwable $dbE) {
        $checks['database'] = 'FAIL: ' . $dbE->getMessage();
    }
    
} catch (\Throwable $e) {
    $checks['laravel_boot'] = 'FAIL: ' . $e->getMessage();
    $checks['laravel_trace'] = $e->getTraceAsString();
}

echo json_encode($checks, JSON_PRETTY_PRINT);
