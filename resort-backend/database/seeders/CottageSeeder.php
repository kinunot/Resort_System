<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CottageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cottages')->insert([
            [
                'name' => 'Beachfront Cottage',
                'description' => 'A cozy cottage by the sea.',
                'price' => 1500,
                'capacity' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more entries if needed
        ]);
    }
}