<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\News;

class NewsSearch extends Component
{
    use WithPagination;

    public $searchTitle = '';
    public $searchContent = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchTitle()
    {
        $this->resetPage();
    }

    public function updatingSearchContent()
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
        $newsItems = News::query()
            ->when($this->searchTitle, function ($query) {
                $query->where('title', 'like', '%'.$this->searchTitle.'%');
            })
            ->when($this->searchContent, function ($query) {
                $query->where('content', 'like', '%'.$this->searchContent.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.news-search', [
            'newsItems' => $newsItems,
        ]);
    }
}
