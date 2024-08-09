<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;

class StudentResults extends Component
{
    public $studentId;

    public function mount($studentId)
    {
        $this->studentId = $studentId;
    }

    public function render()
    {
        // Haal de student op met de gerelateerde gegevens
        $student = Student::with([
            'enrolments' => function ($query) {
                $query->with([
                    'crebo',
                    'cohort',
                    'enrolmentStatus',
                    'enrolmentClasses.classYear.schoolClass',
                    'enrolmentClasses.studentAssignments' => function ($q) {
                        $q->with(['assignmentStatus', 'classAssignment.assignment']);
                    }
                ]);
            },
        ])->findOrFail($this->studentId);


        return view('livewire.student-results', [
            'student' => $student,
        ])->layout('layouts.layoutadmin');
    }
}
