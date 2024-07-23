<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Assignment;

class AssignmentSearch extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchModuleName = '';
    public $searchDuedate = '';
    public $sortField = 'assignments.name';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchName()
    {
        $this->resetPage();
    }

    public function updatingSearchModuleName()
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
        $assignments = Assignment::query()
            ->join('modules', 'assignments.module_id', '=', 'modules.id')
            ->select('assignments.*', 'modules.name as module_name')
            ->when($this->searchName, function ($query) {
                $query->where('assignments.name', 'like', '%'.$this->searchName.'%');
            })
            ->when($this->searchModuleName, function ($query) {
                $query->where('modules.name', 'like', '%'.$this->searchModuleName.'%');
            })
            ->when($this->searchDuedate, function ($query) {
                $query->where('assignments.duedate', 'like', '%'.$this->searchDuedate.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.assignment-search', [
            'assignments' => $assignments,
        ]);
    }
}
