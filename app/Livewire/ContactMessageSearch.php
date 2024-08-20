<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ContactMessage;

class ContactMessageSearch extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchEmail = '';
    public $searchMessage = '';
    public $sortField = 'contact_messages.created_at';
    public $sortDirection = 'desc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchName()
    {
        $this->resetPage();
    }

    public function updatingSearchEmail()
    {
        $this->resetPage();
    }

    public function updatingSearchMessage()
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
        $messages = ContactMessage::query()
            ->when($this->searchName, function ($query) {
                $query->where('name', 'like', '%'.$this->searchName.'%');
            })
            ->when($this->searchEmail, function ($query) {
                $query->where('email', 'like', '%'.$this->searchEmail.'%');
            })
            ->when($this->searchMessage, function ($query) {
                $query->where('message', 'like', '%'.$this->searchMessage.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.contact-message-search', [
            'messages' => $messages,
        ]);
    }
}

