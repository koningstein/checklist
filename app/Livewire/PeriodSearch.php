<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Period;

class PeriodSearch extends Component
{
    use WithPagination;

    public $searchPeriod = '';
    public $sortField = 'period';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchPeriod()
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
        $periods = Period::query()
            ->when($this->searchPeriod, function ($query) {
                $query->where('period', 'like', '%'.$this->searchPeriod.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.period-search', [
            'periods' => $periods,
        ]);
    }
}
