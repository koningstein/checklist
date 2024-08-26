<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LearningSuboutcomeLevelAssignment;

class LearningSuboutcomeAssignmentSearch extends Component
{
    use WithPagination;

    public $searchSuboutcomeName = '';
    public $searchAssignmentName = '';
    public $sortField = 'learning_suboutcome_id';
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
        $learningSuboutcomeAssignments = LearningSuboutcomeLevelAssignment::query()
            ->when($this->searchSuboutcomeName, function ($query) {
                $query->whereHas('learningSuboutcome', function ($query) {
                    $query->where('name', 'like', '%'.$this->searchSuboutcomeName.'%');
                });
            })
            ->when($this->searchAssignmentName, function ($query) {
                $query->whereHas('assignment', function ($query) {
                    $query->where('name', 'like', '%'.$this->searchAssignmentName.'%');
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.learning-suboutcome-assignment-search', [
            'learningSuboutcomeAssignments' => $learningSuboutcomeAssignments,
        ]);
    }
}
