<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LearningSuboutcomeLevel;

class LearningSuboutcomeLevelSearch extends Component
{
    use WithPagination;

    public $searchSuboutcomeName = '';
    public $searchLevelName = '';

    public $sortField = 'learning_suboutcome_id';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchSuboutcomeName()
    {
        $this->resetPage();
    }

    public function updatingSearchLevelName()
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
        $learningSuboutcomeLevels = LearningSuboutcomeLevel::query()
            ->when($this->searchSuboutcomeName, function ($query) {
                $query->whereHas('learningSuboutcome', function ($query) {
                    $query->where('name', 'like', '%'.$this->searchSuboutcomeName.'%');
                });
            })
            ->when($this->searchLevelName, function ($query) {
                $query->whereHas('learningLevel', function ($query) {
                    $query->where('name', 'like', '%'.$this->searchLevelName.'%');
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.learning-suboutcome-level-search', [
            'learningSuboutcomeLevels' => $learningSuboutcomeLevels,
        ]);
    }
}

