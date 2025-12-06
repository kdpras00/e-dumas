<?php

use App\Models\User;
use App\Models\UserLevel;
use App\Models\Kategori;
use App\Models\Status;
use App\Models\PengaduanHeader;
use App\Models\PengaduanDetail;
use App\Models\Rt;
use App\Models\Rw;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Testing Models...\n";

try {
    echo "User count: " . User::count() . "\n";
    echo "UserLevel count: " . UserLevel::count() . "\n";
    echo "Kategori count: " . Kategori::count() . "\n";
    echo "Status count: " . Status::count() . "\n";
    echo "PengaduanHeader count: " . PengaduanHeader::count() . "\n";
    echo "PengaduanDetail count: " . PengaduanDetail::count() . "\n";
    echo "Rt count: " . Rt::count() . "\n";
    echo "Rw count: " . Rw::count() . "\n";
    echo "Models configured successfully!\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
