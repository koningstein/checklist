<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Assignment;
use App\Models\LearningSuboutcomeLevel;
use App\Models\LearningSuboutcomeLevelAssignment;

class LearningSuboutcomeAssignmentForm extends Component
{
    use WithPagination;

    public $searchAssignment = '';
    public $searchSuboutcome = '';
    public $searchLevel = '';
    public $selectedAssignment = null;
    public $selectedSuboutcomeLevels = []; // Array voor meerdere geselecteerde suboutcome levels

    protected $paginationTheme = 'tailwind';

    public function updatingSearchAssignment()
    {
        $this->resetPage('assignmentsPage');
    }

    public function updatingSearchSuboutcome()
    {
        $this->resetPage('learningSuboutcomeLevelsPage');
    }

    public function updatingSearchLevel()
    {
        $this->resetPage('learningSuboutcomeLevelsPage');
    }

    public function selectAssignment($assignmentId)
    {
        $this->selectedAssignment = Assignment::find($assignmentId);
        $this->searchAssignment = ''; // Reset search after selection
    }

    public function deselectAssignment()
    {
        $this->selectedAssignment = null;
    }

    public function selectSuboutcomeLevel($suboutcomeLevelId)
    {
        $suboutcomeLevel = LearningSuboutcomeLevel::find($suboutcomeLevelId);

        // Check if it's already selected
        if (!in_array($suboutcomeLevel, $this->selectedSuboutcomeLevels)) {
            $this->selectedSuboutcomeLevels[] = $suboutcomeLevel;
        }

        // Reset search fields
        $this->searchSuboutcome = '';
        $this->searchLevel = '';
    }

    public function removeSuboutcomeLevel($suboutcomeLevelId)
    {
        // Filter out the selected suboutcome level by its ID
        $this->selectedSuboutcomeLevels = array_filter($this->selectedSuboutcomeLevels, function ($level) use ($suboutcomeLevelId) {
            return $level->id != $suboutcomeLevelId;
        });
    }

    public function submit()
    {
        $this->validate([
            'selectedAssignment' => 'required',
            'selectedSuboutcomeLevels' => 'required|array|min:1',
        ]);

        foreach ($this->selectedSuboutcomeLevels as $suboutcomeLevel) {
            LearningSuboutcomeLevelAssignment::create([
                'learning_suboutcome_level_id' => $suboutcomeLevel->id,
                'assignment_id' => $this->selectedAssignment->id,
            ]);
        }

        // Gebruik een Livewire redirect om terug te keren naar de index-pagina
        return redirect()->route('admin.lsuboutcomelevelassignments.index')
            ->with('status', 'Learning Suboutcome Level Assignment(s) created successfully.');

    }

    public function render()
    {
        $assignments = [];

        // Only fetch assignments if none is selected
        if (!$this->selectedAssignment) {
            $assignments = Assignment::where('name', 'like', '%' . $this->searchAssignment . '%')
                ->paginate(10, ['*'], 'assignmentsPage');
        }

        $learningSuboutcomeLevels = LearningSuboutcomeLevel::with('learningSuboutcome', 'learningLevel')
            ->when($this->searchSuboutcome, function ($query) {
                $query->whereHas('learningSuboutcome', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchSuboutcome . '%');
                });
            })
            ->when($this->searchLevel, function ($query) {
                $query->whereHas('learningLevel', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchLevel . '%');
                });
            })
            ->paginate(10, ['*'], 'learningSuboutcomeLevelsPage');

        return view('livewire.learning-suboutcome-assignment-form', [
            'assignments' => $assignments,
            'learningSuboutcomeLevels' => $learningSuboutcomeLevels,
        ]);
    }
}
