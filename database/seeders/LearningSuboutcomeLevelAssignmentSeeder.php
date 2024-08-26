<?php

namespace Database\Seeders;

use App\Models\LearningSuboutcomeLevelAssignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningSuboutcomeLevelAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LearningSuboutcomeLevelAssignment::factory()->count(15)->create();
    }
}
