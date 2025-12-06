<?php

use App\Models\UserLevel;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$levels = UserLevel::all();
foreach ($levels as $level) {
    echo $level->id . ": " . $level->user_level . "\n";
}
