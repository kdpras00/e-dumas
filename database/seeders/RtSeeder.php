<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rws = \App\Models\Rw::all();
        
        foreach ($rws as $rw) {
            for ($i = 1; $i <= 10; $i++) {
                $rtNumber = str_pad($i, 2, '0', STR_PAD_LEFT);
                \App\Models\Rt::firstOrCreate([
                    'rt' => $rtNumber,
                    'rw_id' => $rw->id
                ]);
            }
        }
    }
}
