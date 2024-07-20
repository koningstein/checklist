<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Period;

class PeriodSearch extends Component
{
    use WithPagination;

    public $searchPeriod = '';

    #[On('searchUpdated')]
    public function updatingSearchPeriod()
    {
        $this->resetPage();
    }

    public function render()
    {
        $periods = Period::where('period', 'like', '%' . $this->searchPeriod . '%')
            ->paginate(10);

        return view('livewire.period-search', [
            'periods' => $periods,
        ]);
    }
}
