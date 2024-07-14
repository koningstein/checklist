<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\ClassAssignment;
use App\Models\ClassYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassYear::all()->each(function ($classYear) {
            Assignment::all()->random(5)->each(function ($assignment) use ($classYear) {
                ClassAssignment::factory()->create([
                    'class_year_id' => $classYear->id,
                    'assignment_id' => $assignment->id,
                ]);
            });
        });
    }
}
