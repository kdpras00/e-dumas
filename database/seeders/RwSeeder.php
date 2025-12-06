<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $rwNumber = str_pad($i, 2, '0', STR_PAD_LEFT);
            \App\Models\Rw::firstOrCreate(['rw' => $rwNumber]);
        }
    }
}
