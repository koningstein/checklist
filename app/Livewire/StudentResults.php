<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;

class StudentResults extends Component
{
    public $studentId;
    public $searchCourseName = '';

    public function mount($studentId)
    {
        $this->studentId = $studentId;
    }

    public function render()
    {
        $student = Student::with([
            'enrolments' => function ($query) {
                $query->with([
                    'crebo',
                    'cohort',
                    'enrolmentStatus',
                    'enrolmentClasses.classYear.schoolClass',
                    'enrolmentClasses.studentAssignments' => function ($q) {
                        $q->with(['assignmentStatus', 'classAssignment.assignment.module.course', 'individualAssignment.module.course']);
                    }
                ]);
            },
        ])->findOrFail($this->studentId);

        return view('livewire.student-results', [
            'student' => $student,
        ]);
    }
}
