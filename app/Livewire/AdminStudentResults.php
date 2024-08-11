<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Period;
use App\Models\StudentAssignment;
use App\Models\AssignmentStatus;

class AdminStudentResults extends Component
{
    public $studentId;
    public $searchCourseName = '';
    public $selectedPeriodId = null;
    public $periods;
    public $selectedAssignmentId = null;
    public $selectedStatus = null;
    public $statuses;

    public function mount($studentId)
    {
        $this->studentId = $studentId;
        $this->periods = Period::all();
        $this->statuses = AssignmentStatus::all()->pluck('name', 'id')->toArray();
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

    public function openModal($assignmentId)
    {
        $this->selectedAssignmentId = $assignmentId;

        // Controleer of de assignment correct wordt opgehaald
        $assignment = StudentAssignment::find($assignmentId);

        if ($assignment) {
            $this->selectedStatus = $assignment->assignment_status_id;
        } else {
            $this->selectedStatus = null;
            $this->selectedAssignmentId = null;
        }
    }

    public function updateStatus()
    {
        $assignment = StudentAssignment::find($this->selectedAssignmentId);

        if ($assignment) {
            $assignment->assignment_status_id = $this->selectedStatus;
            $assignment->save();

            // Reset de geselecteerde status en opdracht
            $this->reset('selectedAssignmentId', 'selectedStatus');
        } else {
            // Fallback als de assignment niet gevonden wordt
            $this->addError('assignment', 'De geselecteerde opdracht kon niet worden gevonden.');
        }
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
                            'classAssignment.assignment.module.period',
                            'individualAssignment.module.period',
                        ]);
                    }
                ]);
            },
        ])->findOrFail($this->studentId);

        return view('livewire.admin-student-results', [
            'student' => $student,
            'periods' => $this->periods,
        ]);
    }
}
