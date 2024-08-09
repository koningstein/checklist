<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\ClassAssignment;
use App\Models\ClassYear;
use App\Models\SchoolClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        ClassYear::all()->each(function ($classYear) {
//            Assignment::all()->random(5)->each(function ($assignment) use ($classYear) {
//                ClassAssignment::factory()->create([
//                    'class_year_id' => $classYear->id,
//                    'assignment_id' => $assignment->id,
//                ]);
//            });
//        });
        // Haal alle school classes op die een '2' of '3' in de naam hebben
        $schoolClasses = SchoolClass::where('name', 'like', '%2%')
            ->orWhere('name', 'like', '%3%')
            ->pluck('id');

        // Haal alle class years op die bij deze school classes horen
        $classYears = ClassYear::whereIn('school_class_id', $schoolClasses)->get();

        // Haal alle opdrachten op
        $assignments = Assignment::all();

        // Voor elke gefilterde class year, ken alle opdrachten toe
        $classYears->each(function ($classYear) use ($assignments) {
            $assignments->each(function ($assignment) use ($classYear) {
                ClassAssignment::factory()->create([
                    'class_year_id' => $classYear->id,
                    'assignment_id' => $assignment->id,
                ]);
            });
        });
    }
}
