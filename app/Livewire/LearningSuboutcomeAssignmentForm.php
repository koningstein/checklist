<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Assignment;
use App\Models\LearningSuboutcome;
use App\Models\LearningSuboutcomeAssignment;

class LearningSuboutcomeAssignmentForm extends Component
{
    public $searchAssignment = '';
    public $selectedAssignment = null;
    public $searchSuboutcome = '';
    public $selectedSuboutcomes = [];

    public function selectAssignment($assignmentId)
    {
        $this->selectedAssignment = Assignment::find($assignmentId);
    }

    public function selectSuboutcome($suboutcomeId)
    {
        $suboutcome = LearningSuboutcome::find($suboutcomeId);

        // Check if suboutcome is already selected
        if (!in_array($suboutcome, $this->selectedSuboutcomes)) {
            $this->selectedSuboutcomes[] = $suboutcome;
        }
    }

    public function removeSuboutcome($suboutcomeId)
    {
        // Filter out the suboutcome that should be removed
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
            LearningSuboutcomeAssignment::create([
                'learning_suboutcome_id' => $suboutcome->id,
                'assignment_id' => $this->selectedAssignment->id,
            ]);
        }

        session()->flash('message', 'Learning Suboutcome Assignment created successfully.');

        // Reset form
        $this->selectedAssignment = null;
        $this->selectedSuboutcomes = collect();
        $this->searchAssignment = '';
        $this->searchSuboutcome = '';
    }

    public function render()
    {
        $assignments = Assignment::where('name', 'like', '%'.$this->searchAssignment.'%')->get();
        $learningSuboutcomes = LearningSuboutcome::where('name', 'like', '%'.$this->searchSuboutcome.'%')->get();

        return view('livewire.learning-suboutcome-assignment-form', [
            'assignments' => $assignments,
            'learningSuboutcomes' => $learningSuboutcomes,
        ]);
    }
}
