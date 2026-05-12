<?php

// Standardize production environment variables for TiDB Cloud
$vars = [
    'DB_CONNECTION' => 'mysql',
    'DB_HOST' => 'gateway01.ap-southeast-1.prod.aws.tidbcloud.com',
    'DB_PORT' => '4000',
    'DB_DATABASE' => 'test',
    'DB_USERNAME' => '4Ne3F4jtiazG79R.root',
    'DB_PASSWORD' => 'QT4NOLaePhl5dVDm',
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'true', // Temporarily enable debug for Vercel troubleshooting
];

foreach ($vars as $key => $value) {
    putenv("$key=$value");
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}


// Forward Vercel requests to normal index.php
require __DIR__ . '/../public/index.php';