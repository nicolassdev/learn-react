<?php

require_once './vendor/autoload.php';
date_default_timezone_set('Asia/Manila');

use backend\System\Main;

try {
    // Initialize API class
    $API = new Main();

    // Handle incoming request
    $result = $API->handleIncomingRequests();

    // Exit gracefully
    exit($result);
} catch (Exception $e) {
    // Log exception
    file_put_contents(
        __DIR__ . "/storage/logs/exception_log.txt",
        "[" . date('Y-m-d H:i:s') . "]\n" . $e . "\n" . PHP_EOL,
        FILE_APPEND | LOCK_EX
    );

    // Set header
    header('Content-Type: application/json');

    // Gracefully exit
    exit(json_encode([
        'message' => 'Internal Server Error.'
    ]));
}
