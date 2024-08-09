<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LearningSuboutcomeTechnique;

class LearningSuboutcomeTechniqueSearch extends Component
{
    use WithPagination;

    public $searchSuboutcomeName = '';
    public $searchTechniqueName = '';
    public $sortField = 'learning_suboutcome_id';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchSuboutcomeName()
    {
        $this->resetPage();
    }

    public function updatingSearchTechniqueName()
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
        $learningSuboutcomeTechniques = LearningSuboutcomeTechnique::query()
            ->when($this->searchSuboutcomeName, function ($query) {
                $query->whereHas('learningSuboutcome', function ($query) {
                    $query->where('name', 'like', '%'.$this->searchSuboutcomeName.'%');
                });
            })
            ->when($this->searchTechniqueName, function ($query) {
                $query->whereHas('learningRelatedTechnique', function ($query) {
                    $query->where('name', 'like', '%'.$this->searchTechniqueName.'%');
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.learning-suboutcome-technique-search', [
            'learningSuboutcomeTechniques' => $learningSuboutcomeTechniques,
        ]);
    }
}

