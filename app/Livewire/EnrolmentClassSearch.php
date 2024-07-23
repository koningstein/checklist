<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EnrolmentClass;

class EnrolmentClassSearch extends Component
{
    use WithPagination;

    public $searchSchoolClassName = '';
    public $searchStudentName = '';
    public $searchSchoolYearName = '';
    public $sortField = 'school_classes.name';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchSchoolClassName()
    {
        $this->resetPage();
    }

    public function updatingSearchStudentName()
    {
        $this->resetPage();
    }

    public function updatingSearchSchoolYearName()
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
        $enrolmentClasses = EnrolmentClass::query()
            ->join('class_years', 'enrolment_classes.class_year_id', '=', 'class_years.id')
            ->join('school_classes', 'class_years.school_class_id', '=', 'school_classes.id')
            ->join('school_years', 'class_years.school_year_id', '=', 'school_years.id')
            ->join('enrolments', 'enrolment_classes.enrolment_id', '=', 'enrolments.id')
            ->join('students', 'enrolments.student_id', '=', 'students.id')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->select('enrolment_classes.*', 'school_classes.name as school_class_name', 'users.name as student_name', 'school_years.name as school_year_name')
            ->when($this->searchSchoolClassName, function ($query) {
                $query->where('school_classes.name', 'like', '%'.$this->searchSchoolClassName.'%');
            })
            ->when($this->searchStudentName, function ($query) {
                $query->where('users.name', 'like', '%'.$this->searchStudentName.'%');
            })
            ->when($this->searchSchoolYearName, function ($query) {
                $query->where('school_years.name', 'like', '%'.$this->searchSchoolYearName.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.enrolment-class-search', [
            'enrolmentClasses' => $enrolmentClasses,
        ]);
    }
}
