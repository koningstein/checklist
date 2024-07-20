<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Crebo;

class CreboSearch extends Component
{
    use WithPagination;

    public $search = '';

    #[On('searchUpdated')]
    public function updatingSearch()
    {
//        dd('Search is being updated'); // Voeg deze regel toe voor debugging
        $this->resetPage();
    }

    public function render()
    {
        $crebos = Crebo::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('crebonr', 'like', '%'.$this->search.'%')
            ->paginate(10);
//        $crebos = Crebo::search($this->search)->paginate(10);

        return view('livewire.crebo-search', [
            'crebos' => $crebos,
        ]);
    }
}
