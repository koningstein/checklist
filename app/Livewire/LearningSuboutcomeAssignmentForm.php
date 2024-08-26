<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Assignment;
use App\Models\LearningSuboutcome;
use App\Models\LearningSuboutcomeLevelAssignment;

class LearningSuboutcomeAssignmentForm extends Component
{
    use WithPagination;

    public $searchAssignment = '';
    public $searchSuboutcome = '';
    public $selectedAssignment = null;
    public $selectedSuboutcomes = [];

    protected $paginationTheme = 'tailwind';

    public function updatingSearchAssignment()
    {
        $this->resetPage();
    }

    public function updatingSearchSuboutcome()
    {
        $this->resetPage();
    }

    public function selectAssignment($assignmentId)
    {
        $this->selectedAssignment = Assignment::find($assignmentId);
        $this->searchAssignment = '';  // Clear the search field after selection
    }

    public function selectSuboutcome($suboutcomeId)
    {
        $suboutcome = LearningSuboutcome::find($suboutcomeId);

        if (!in_array($suboutcome, $this->selectedSuboutcomes)) {
            $this->selectedSuboutcomes[] = $suboutcome;
        }
    }

    public function removeSuboutcome($suboutcomeId)
    {
        $this->selectedSuboutcomes = array_filter($this->selectedSuboutcomes, function($suboutcome) use ($suboutcomeId) {
            return $suboutcome->id != $suboutcomeId;
        });
    }

    public function submit()
    {
        $this->validate([
            'selectedAssignment' => 'required',
            'selectedSuboutcomes' => 'required|array|min:1',
        ]);

        foreach ($this->selectedSuboutcomes as $suboutcome) {
            LearningSuboutcomeLevelAssignment::create([
                'learning_suboutcome_id' => $suboutcome->id,
                'assignment_id' => $this->selectedAssignment->id,
            ]);
        }

        session()->flash('message', 'Learning Suboutcome Assignment created successfully.');

        // Reset form
        $this->selectedAssignment = null;
        $this->selectedSuboutcomes = [];
        $this->searchAssignment = '';
        $this->searchSuboutcome = '';
        $this->resetPage();
    }

    public function render()
    {
        $assignments = Assignment::where('name', 'like', '%'.$this->searchAssignment.'%')->get();
        $learningSuboutcomes = LearningSuboutcome::where('name', 'like', '%'.$this->searchSuboutcome.'%')
            ->paginate(10);

        return view('livewire.learning-suboutcome-assignment-form', [
            'assignments' => $assignments,
            'learningSuboutcomes' => $learningSuboutcomes,
        ]);
    }
}
