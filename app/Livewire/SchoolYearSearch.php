<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SchoolYear;

class SchoolYearSearch extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchStartdate = '';
    public $searchEnddate = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchName()
    {
        $this->resetPage();
    }

    public function updatingSearchStartdate()
    {
        $this->resetPage();
    }

    public function updatingSearchEnddate()
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
        $schoolYears = SchoolYear::query()
            ->when($this->searchName, function ($query) {
                $query->where('name', 'like', '%'.$this->searchName.'%');
            })
            ->when($this->searchStartdate, function ($query) {
                $query->where('startdate', 'like', '%'.$this->searchStartdate.'%');
            })
            ->when($this->searchEnddate, function ($query) {
                $query->where('enddate', 'like', '%'.$this->searchEnddate.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.school-year-search', [
            'schoolYears' => $schoolYears,
        ]);
    }
}
