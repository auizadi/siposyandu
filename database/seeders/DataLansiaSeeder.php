<?php

namespace Database\Seeders;

use App\Models\DataLansia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataLansiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataLansia::factory()->count(100)->create();
    }
}
