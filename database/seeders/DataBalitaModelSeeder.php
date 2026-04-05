<?php

namespace Database\Seeders;

use App\Models\DataBalitaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataBalitaModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataBalitaModel::factory()->count(100)->create();
    }
}
