<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Module;

class ModuleSearch extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchDescription = '';
    public $searchPeriod = '';
    public $searchCourseName = '';
    public $sortField = 'modules.name';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchName()
    {
        $this->resetPage();
    }

    public function updatingSearchDescription()
    {
        $this->resetPage();
    }

    public function updatingSearchPeriod()
    {
        $this->resetPage();
    }

    public function updatingSearchCourseName()
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
        $modules = Module::query()
            ->join('periods', 'modules.period_id', '=', 'periods.id')
            ->join('courses', 'modules.course_id', '=', 'courses.id')
            ->select('modules.*', 'periods.period as period_period', 'courses.name as course_name')
            ->when($this->searchName, function ($query) {
                $query->where('modules.name', 'like', '%'.$this->searchName.'%');
            })
            ->when($this->searchDescription, function ($query) {
                $query->where('modules.description', 'like', '%'.$this->searchDescription.'%');
            })
            ->when($this->searchPeriod, function ($query) {
                $query->where('periods.period', 'like', '%'.$this->searchPeriod.'%');
            })
            ->when($this->searchCourseName, function ($query) {
                $query->where('courses.name', 'like', '%'.$this->searchCourseName.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.module-search', [
            'modules' => $modules,
        ]);
    }
}
