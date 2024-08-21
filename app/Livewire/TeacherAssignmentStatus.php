<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\ClassYear;
use App\Models\Course;
use App\Models\Module;
use App\Models\Assignment;
use App\Models\StudentAssignment;
use App\Models\EnrolmentClass;
use App\Models\Student;

class TeacherAssignmentStatus extends Component
{
    public $classYearId;
    public $courseId;
    public $moduleId;
    public $assignmentId;

    public $classYears = [];
    public $courses = [];
    public $modules = [];
    public $assignments = [];
    public $students = [];

    public function mount()
    {
        // Haal alle beschikbare klassen op om mee te beginnen
        $this->classYears = ClassYear::all();
    }

    public function updatedClassYearId()
    {
        // Haal de vakken op die gekoppeld zijn aan de geselecteerde klas
        $this->courses = Course::whereHas('modules.assignments.classAssignments', function($query) {
            $query->whereHas('studentAssignments', function($q) {
                $q->where('class_year_id', $this->classYearId);
            });
        })->get();

        // Reset de vervolgkeuzes
        $this->courseId = null;
        $this->modules = [];
        $this->assignments = [];
        $this->students = [];
    }

    public function updatedCourseId()
    {
        // Haal de modules op die aan het geselecteerde vak zijn gekoppeld
        $this->modules = Module::whereHas('assignments.classAssignments', function($query) {
            $query->whereHas('studentAssignments', function($q) {
                $q->where('class_year_id', $this->classYearId);
            });
        })->where('course_id', $this->courseId)->get();

        // Reset de vervolgkeuzes
        $this->moduleId = null;
        $this->assignments = [];
        $this->students = [];
    }

    public function updatedModuleId()
    {
        // Haal de opdrachten op die aan de geselecteerde module zijn gekoppeld
        $this->assignments = Assignment::whereHas('classAssignments', function($query) {
            $query->whereHas('studentAssignments', function($q) {
                $q->where('class_year_id', $this->classYearId);
            });
        })->where('module_id', $this->moduleId)->get();

        // Reset de vervolgkeuzes
        $this->assignmentId = null;
        $this->students = [];
    }

    public function updatedAssignmentId()
    {
        // Stap 1: Vind de class_assignment_id op basis van assignment_id en class_year_id
        $classAssignment = DB::table('class_assignments')
            ->where('assignment_id', $this->assignmentId)
            ->where('class_year_id', $this->classYearId)
            ->first();

        // Log voor debugging
        if (!$classAssignment) {
            Log::info('Geen class_assignment gevonden voor assignment_id: ' . $this->assignmentId . ' en class_year_id: ' . $this->classYearId);
            return;
        }

        Log::info('Gevonden class_assignment_id: ' . $classAssignment->id);

        // Stap 2: Zoek alle student_assignments met de class_assignment_id
        $studentAssignments = DB::table('student_assignments')
            ->where('class_assignment_id', $classAssignment->id)
            ->get();

        // Log voor debugging
        if ($studentAssignments->isEmpty()) {
            Log::info('Geen student_assignments gevonden voor class_assignment_id: ' . $classAssignment->id);
            return;
        }

        Log::info('Aantal gevonden student_assignments: ' . $studentAssignments->count());

        // Stap 3: Zoek enrolment_classes en enrolments op basis van student_assignments
        $studentIds = [];
        foreach ($studentAssignments as $studentAssignment) {
            $enrolmentClass = DB::table('enrolment_classes')
                ->where('id', $studentAssignment->enrolment_class_id)
                ->first();

            if ($enrolmentClass) {
                $enrolment = DB::table('enrolments')
                    ->where('id', $enrolmentClass->enrolment_id)
                    ->first();

                if ($enrolment) {
                    $studentIds[] = $enrolment->student_id;
                }
            }
        }

        // Log de gevonden student_ids
        if (empty($studentIds)) {
            Log::info('Geen studenten gevonden gekoppeld aan de gevonden enrolments.');
            return;
        }

        Log::info('Gevonden student_ids: ' . implode(', ', $studentIds));

//        // Stap 4: Zoek studenten op basis van student_ids
//        $this->students = DB::table('students')
//            ->whereIn('id', $studentIds)
//            ->get();
        // Stap 4: Zoek studenten op basis van student_ids en laad de gerelateerde users
        $this->students = Student::with('user') // Hier laden we de gekoppelde users
        ->whereIn('id', $studentIds)
            ->get();

        // Log het aantal gevonden studenten
        Log::info('Aantal gevonden studenten: ' . $this->students->count());

        // Nu zijn de studenten beschikbaar in $this->students
    }

    public function render()
    {
        return view('livewire.teacher-assignment-status');
    }
}
