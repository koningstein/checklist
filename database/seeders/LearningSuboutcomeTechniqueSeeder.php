<?php

namespace Database\Seeders;

use App\Models\LearningSuboutcomeTechnique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningSuboutcomeTechniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LearningSuboutcomeTechnique::factory()->count(3)->create();
    }
}
