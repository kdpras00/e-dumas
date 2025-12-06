<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$tables = DB::select('SHOW TABLES');
$dbName = env('DB_DATABASE');
$key = "Tables_in_" . $dbName;

echo "Database: " . $dbName . "\n";
foreach ($tables as $table) {
    $tableName = $table->$key;
    echo "\nTable: " . $tableName . "\n";
    $columns = DB::select("SHOW COLUMNS FROM " . $tableName);
    foreach ($columns as $column) {
        echo " - " . $column->Field . " (" . $column->Type . ")\n";
    }
}
