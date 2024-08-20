<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Student;

class UserSearch extends Component
{
    public $search = '';
    public $selectedUser = null;
    public $users = [];

    public function updatedSearch()
    {
        // Haal gebruikers op die nog geen student zijn
        $this->users = User::whereDoesntHave('student')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->limit(10)
            ->get();
    }

    public function selectUser($userId)
    {
        $this->selectedUser = User::find($userId);
        $this->search = $this->selectedUser->name;
        $this->users = [];

        $this->dispatch('user-selected', ['userId' => $userId]);
    }

    public function render()
    {
        return view('livewire.user-search');
    }
}
