<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LearningOutcome;

class LearningOutcomeSearch extends Component
{
    use WithPagination;

    public $searchNumber = '';
    public $searchName = '';
    public $searchDescription = '';
    public $sortField = 'number';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchNumber()
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
        $learningOutcomes = LearningOutcome::query()
            ->when($this->searchNumber, function ($query) {
                $query->where('number', 'like', '%'.$this->searchNumber.'%');
            })
            ->when($this->searchName, function ($query) {
                $query->where('name', 'like', '%'.$this->searchName.'%');
            })
            ->when($this->searchDescription, function ($query) {
                $query->where('description', 'like', '%'.$this->searchDescription.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.learning-outcome-search', [
            'learningOutcomes' => $learningOutcomes,
        ]);
    }
}
