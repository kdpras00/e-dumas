<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update existing statuses to match new requirement if possible, or just create new ones.
        // For simplicity and to match the user's request explicitly:
        $statuses = [
            1 => 'Open', 
            2 => 'On Progress', 
            3 => 'Done', 
            4 => 'Close'
        ];
        
        foreach ($statuses as $id => $status) {
            \App\Models\Status::updateOrCreate(
                ['id' => $id],
                ['status' => $status]
            );
        }
    }
}
