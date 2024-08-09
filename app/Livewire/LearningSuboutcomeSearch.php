<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LearningSuboutcome;

class LearningSuboutcomeSearch extends Component
{
    use WithPagination;

    public $searchOutcomeName = '';
    public $searchName = '';
    public $searchDescription = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchOutcomeName()
    {
        $this->resetPage();
    }

    public function updatingSearchName()
    {
        $this->resetPage();
    }

    public function updatingSearchDescription()
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
        $learningSuboutcomes = LearningSuboutcome::query()
            ->when($this->searchOutcomeName, function ($query) {
                $query->whereHas('learningOutcome', function ($query) {
                    $query->where('name', 'like', '%'.$this->searchOutcomeName.'%');
                });
            })
            ->when($this->searchName, function ($query) {
                $query->where('name', 'like', '%'.$this->searchName.'%');
            })
            ->when($this->searchDescription, function ($query) {
                $query->where('description', 'like', '%'.$this->searchDescription.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.learning-suboutcome-search', [
            'learningSuboutcomes' => $learningSuboutcomes,
        ]);
    }
}
