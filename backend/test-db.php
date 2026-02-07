<?php
// backend/test-mysqldb.php
require_once __DIR__ . '/vendor/autoload.php';  // Composer autoload

use backend\System\Main;

// require_once __DIR__ . '/../backend/System/Main.php';  // Ensure Main class is included

try {
    $db = new Main(true);
    echo "✅ MYSQLIDB CONNECTION: SUCCESS\n";

    $tables = $db->rawQuery('SHOW TABLES');
    echo "✅ TABLES: " . count($tables) . "\n";
    foreach ($tables as $table) {
        echo "  📋 " . reset($table) . "\n";
    }
} catch (Exception $e) {
    echo "❌ ERROR: " . $e->getMessage() . "\n";
}
