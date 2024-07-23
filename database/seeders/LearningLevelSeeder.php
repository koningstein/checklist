<?php

namespace Database\Seeders;

use App\Models\LearningLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LearningLevel::factory()->count(3)->create();
    }
}
