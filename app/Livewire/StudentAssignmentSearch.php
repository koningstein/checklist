<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StudentAssignment;

class StudentAssignmentSearch extends Component
{
    use WithPagination;

    public $searchStudentName = '';
    public $searchSchoolClassName = '';
    public $searchAssignmentName = '';
    public $searchAssignmentStatusName = '';
    public $searchDuedate = '';
    public $sortField = 'users.name';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchStudentName()
    {
        $this->resetPage();
    }

    public function updatingSearchSchoolClassName()
    {
        $this->resetPage();
    }

    public function updatingSearchAssignmentName()
    {
        $this->resetPage();
    }

    public function updatingSearchAssignmentStatusName()
    {
        $this->resetPage();
    }

    public function updatingSearchDuedate()
    {
        $this->resetPage();
    }

    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function render()
    {
        $studentAssignments = StudentAssignment::query()
            ->join('enrolment_classes', 'student_assignments.enrolment_class_id', '=', 'enrolment_classes.id')
            ->join('class_years', 'enrolment_classes.class_year_id', '=', 'class_years.id')
            ->join('school_classes', 'class_years.school_class_id', '=', 'school_classes.id')
            ->join('enrolments', 'enrolment_classes.enrolment_id', '=', 'enrolments.id')
            ->join('students', 'enrolments.student_id', '=', 'students.id')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->leftJoin('class_assignments', 'student_assignments.class_assignment_id', '=', 'class_assignments.id')
            ->leftJoin('assignments as class_assignment', 'class_assignments.assignment_id', '=', 'class_assignment.id')
            ->leftJoin('assignments as individual_assignment', 'student_assignments.individual_assignment_id', '=', 'individual_assignment.id')
            ->join('assignment_statuses', 'student_assignments.assignment_status_id', '=', 'assignment_statuses.id')
            ->select('student_assignments.*', 'users.name as student_name', 'school_classes.name as school_class_name', 'assignment_statuses.name as assignment_status_name',
                \DB::raw('IFNULL(class_assignment.name, individual_assignment.name) as assignment_name'))
            ->when($this->searchStudentName, function ($query) {
                $query->where('users.name', 'like', '%'.$this->searchStudentName.'%');
            })
            ->when($this->searchSchoolClassName, function ($query) {
                $query->where('school_classes.name', 'like', '%'.$this->searchSchoolClassName.'%');
            })
            ->when($this->searchAssignmentName, function ($query) {
                $query->where(\DB::raw('IFNULL(class_assignment.name, individual_assignment.name)'), 'like', '%'.$this->searchAssignmentName.'%');
            })
            ->when($this->searchAssignmentStatusName, function ($query) {
                $query->where('assignment_statuses.name', 'like', '%'.$this->searchAssignmentStatusName.'%');
            })
            ->when($this->searchDuedate, function ($query) {
                $query->where('student_assignments.duedate', 'like', '%'.$this->searchDuedate.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.student-assignment-search', [
            'studentAssignments' => $studentAssignments,
        ]);
    }
}
