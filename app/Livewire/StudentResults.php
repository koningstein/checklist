<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Period;

class StudentResults extends Component
{
    public $studentId;
    public $searchCourseName = '';
    public $selectedPeriodId = null; // Om de geselecteerde periode bij te houden

    public function mount($studentId)
    {
        $this->studentId = $studentId;
    }

    public function setPeriod($periodId)
    {
        $this->selectedPeriodId = $periodId;
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
                        $q->with([
                            'assignmentStatus',
                            'classAssignment.assignment.module.course',
                            'individualAssignment.module.course'
                        ]);
                    }
                ]);
            },
        ])->findOrFail($this->studentId);

        // Haal alle perioden op om de knoppen weer te geven
        $periods = Period::all();

        return view('livewire.student-results', [
            'student' => $student,
            'periods' => $periods,
        ]);
    }
}
