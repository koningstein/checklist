<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LearningLevel;

class LearningLevelSearch extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchDescription = '';
    public $sortField = 'name';
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
        $learningLevels = LearningLevel::query()
            ->when($this->searchName, function ($query) {
                $query->where('name', 'like', '%'.$this->searchName.'%');
            })
            ->when($this->searchDescription, function ($query) {
                $query->where('description', 'like', '%'.$this->searchDescription.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.learning-level-search', [
            'learningLevels' => $learningLevels,
        ]);
    }
}
