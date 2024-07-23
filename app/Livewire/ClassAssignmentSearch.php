<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ClassAssignment;

class ClassAssignmentSearch extends Component
{
    use WithPagination;

    public $searchSchoolClassName = '';
    public $searchAssignmentName = '';
    public $searchDuedate = '';
    public $sortField = 'school_classes.name';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchSchoolClassName()
    {
        $this->resetPage();
    }

    public function updatingSearchAssignmentName()
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
        $classAssignments = ClassAssignment::query()
            ->join('class_years', 'class_assignments.class_year_id', '=', 'class_years.id')
            ->join('school_classes', 'class_years.school_class_id', '=', 'school_classes.id')
            ->join('assignments', 'class_assignments.assignment_id', '=', 'assignments.id')
            ->select('class_assignments.*', 'school_classes.name as school_class_name', 'assignments.name as assignment_name')
            ->when($this->searchSchoolClassName, function ($query) {
                $query->where('school_classes.name', 'like', '%'.$this->searchSchoolClassName.'%');
            })
            ->when($this->searchAssignmentName, function ($query) {
                $query->where('assignments.name', 'like', '%'.$this->searchAssignmentName.'%');
            })
            ->when($this->searchDuedate, function ($query) {
                $query->where('class_assignments.duedate', 'like', '%'.$this->searchDuedate.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.class-assignment-search', [
            'classAssignments' => $classAssignments,
        ]);
    }
}
