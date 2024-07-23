<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ClassYear;

class ClassYearSearch extends Component
{
    use WithPagination;

    public $searchSchoolClassName = '';
    public $searchSchoolYearName = '';
    public $sortField = 'school_classes.name';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchSchoolClassName()
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
        $classYears = ClassYear::query()
            ->join('school_classes', 'class_years.school_class_id', '=', 'school_classes.id')
            ->join('school_years', 'class_years.school_year_id', '=', 'school_years.id')
            ->select('class_years.*', 'school_classes.name as school_class_name', 'school_years.name as school_year_name')
            ->when($this->searchSchoolClassName, function ($query) {
                $query->where('school_classes.name', 'like', '%'.$this->searchSchoolClassName.'%');
            })
            ->when($this->searchSchoolYearName, function ($query) {
                $query->where('school_years.name', 'like', '%'.$this->searchSchoolYearName.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.class-year-search', [
            'classYears' => $classYears,
        ]);
    }
}
