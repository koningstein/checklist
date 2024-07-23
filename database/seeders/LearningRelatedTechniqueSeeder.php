<?php

namespace Database\Seeders;

use App\Models\LearningRelatedTechnique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningRelatedTechniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LearningRelatedTechnique::factory()->count(10)->create();
    }
}
