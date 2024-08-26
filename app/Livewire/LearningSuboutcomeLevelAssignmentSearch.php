<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LearningSuboutcomeLevelAssignment;

class LearningSuboutcomeLevelAssignmentSearch extends Component
{
    use WithPagination;

    public $searchSuboutcomeName = '';
    public $searchAssignmentName = '';
    public $searchLevelName = '';  // Zoekveld voor Learning Level
    public $sortField = 'learning_suboutcome_level_id'; // Standaard sorteerveld
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchSuboutcomeName()
    {
        $this->resetPage();
    }

    public function updatingSearchAssignmentName()
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
        $learningSuboutcomeLevelAssignments = LearningSuboutcomeLevelAssignment::query()
            ->when($this->searchSuboutcomeName, function ($query) {
                $query->whereHas('learningSuboutcomeLevel.learningSuboutcome', function ($query) {
                    $query->where('name', 'like', '%'.$this->searchSuboutcomeName.'%');
                });
            })
            ->when($this->searchAssignmentName, function ($query) {
                $query->whereHas('assignment', function ($query) {
                    $query->where('name', 'like', '%'.$this->searchAssignmentName.'%');
                });
            })
            ->when($this->searchLevelName, function ($query) {
                $query->whereHas('learningSuboutcomeLevel.learningLevel', function ($query) {
                    $query->where('name', 'like', '%'.$this->searchLevelName.'%');
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.learning-suboutcome-level-assignment-search', [
            'lSuboutcomeLevelAssignments' => $learningSuboutcomeLevelAssignments,
        ]);
    }

}
