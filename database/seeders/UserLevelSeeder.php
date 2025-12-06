<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = ['Masyarakat', 'Petugas', 'Admin', 'Kepala Kelurahan'];
        foreach ($levels as $level) {
            \App\Models\UserLevel::firstOrCreate(['user_level' => $level]);
        }
    }
}
