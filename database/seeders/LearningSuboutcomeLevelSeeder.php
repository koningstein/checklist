<?php

namespace Database\Seeders;

use App\Models\LearningSuboutcomeLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningSuboutcomeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LearningSuboutcomeLevel::factory()->count(600)->create();
    }
}
