<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Period;

class StudentResults extends Component
{
    public $studentId;
    public $searchCourseName = '';
    public $selectedPeriodId = null;
    public $periods;

    public function mount($studentId)
    {
        $this->studentId = $studentId;
        $this->periods = Period::all(); // Haal alle perioden op
    }

    public function setPeriod($periodId)
    {
        $this->selectedPeriodId = $periodId;
    }

    public function isPeriodFullyApproved($periodId)
    {
        $student = Student::with([
            'enrolments.enrolmentClasses.studentAssignments.assignmentStatus',
            'enrolments.enrolmentClasses.studentAssignments.classAssignment.assignment.module.period',
            'enrolments.enrolmentClasses.studentAssignments.individualAssignment.module.period',
        ])->findOrFail($this->studentId);

        $hasAssignments = false;
        foreach ($student->enrolments as $enrolment) {
            foreach ($enrolment->enrolmentClasses as $enrolmentClass) {
                $assignmentsInPeriod = $enrolmentClass->studentAssignments->filter(function($assignment) use ($periodId) {
                    $modulePeriodId = $assignment->classAssignment
                        ? $assignment->classAssignment->assignment->module->period_id
                        : ($assignment->individualAssignment
                            ? $assignment->individualAssignment->module->period_id
                            : null);
                    return $modulePeriodId == $periodId;
                });

                if ($assignmentsInPeriod->isNotEmpty()) {
                    $hasAssignments = true;
                    $allApproved = $assignmentsInPeriod->every(function($assignment) {
                        return $assignment->assignmentStatus->name === 'Goedgekeurd';
                    });

                    if (!$allApproved) {
                        return false;
                    }
                }
            }
        }

        return $hasAssignments ? true : null;
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
                            'individualAssignment.module.course',
                            'classAssignment.assignment.module.period', // Periode om te filteren
                            'individualAssignment.module.period', // Periode om te filteren
                        ]);
                    }
                ]);
            },
        ])->findOrFail($this->studentId);

        return view('livewire.student-results', [
            'student' => $student,
            'periods' => $this->periods, // Geef de perioden door aan de view
        ]);
    }
}
