<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Crebo;

class CreboSearch extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchCrebonr = '';

    #[On('searchUpdated')]
    public function updatingSearch()
    {
//        dd('Search is being updated'); // Voeg deze regel toe voor debugging
        $this->resetPage();
    }

    public function render()
    {
        $crebos = Crebo::query()
            ->when($this->searchName, function ($query) {
                $query->where('name', 'like', '%'.$this->searchName.'%');
            })
            ->when($this->searchCrebonr, function ($query) {
                $query->where('crebonr', 'like', '%'.$this->searchCrebonr.'%');
            })
            ->paginate(10);
//        $crebos = Crebo::search($this->search)->paginate(10);

        return view('livewire.crebo-search', [
            'crebos' => $crebos,
        ]);
    }
}
