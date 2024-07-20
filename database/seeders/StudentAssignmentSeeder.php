<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\AssignmentStatus;
use App\Models\ClassAssignment;
use App\Models\EnrolmentClass;
use App\Models\StudentAssignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EnrolmentClass::all()->each(function ($enrolmentClass) {
            // ClassAssignments for the enrolment class
            $classAssignments = ClassAssignment::where('class_year_id', $enrolmentClass->class_year_id)->get();

            $classAssignments->each(function ($classAssignment) use ($enrolmentClass) {
                StudentAssignment::factory()->create([
                    'enrolment_class_id' => $enrolmentClass->id,
                    'individual_assignment_id' => null,
                    'class_assignment_id' => $classAssignment->id,
                    'assignment_status_id' => AssignmentStatus::all()->random()->id,
                    'marked_by_id' => null,
                    'completed' => false,
                    'marked_at' => null,
                ]);
            });

            // Individuele opdrachten
            $individualAssignments = Assignment::inRandomOrder()->take(3)->get(); // Neem 3 willekeurige individuele opdrachten
            $individualAssignments->each(function ($individualAssignment) use ($enrolmentClass) {
                StudentAssignment::factory()->create([
                    'enrolment_class_id' => $enrolmentClass->id,
                    'individual_assignment_id' => $individualAssignment->id,
                    'class_assignment_id' => null,
                    'assignment_status_id' => AssignmentStatus::all()->random()->id,
                    'marked_by_id' => null,
                    'completed' => false,
                    'marked_at' => null,
                ]);
            });
        });
    }
}
