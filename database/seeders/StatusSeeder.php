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
        // Status flow: Open -> On Progress/Done/Cancel, On Progress -> Done/Cancel
        // Done and Cancel are final states
        $statuses = [
            1 => 'Open', 
            2 => 'On Progress', 
            3 => 'Done', 
            4 => 'Cancel'  // Changed from 'Close' to 'Cancel'
        ];
        
        foreach ($statuses as $id => $status) {
            \App\Models\Status::updateOrCreate(
                ['id' => $id],
                ['status' => $status]
            );
        }
    }
}
