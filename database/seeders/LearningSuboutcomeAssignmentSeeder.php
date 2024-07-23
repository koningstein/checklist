<?php

namespace Database\Seeders;

use App\Models\LearningSuboutcomeAssignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningSuboutcomeAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LearningSuboutcomeAssignment::factory()->count(15)->create();
    }
}
