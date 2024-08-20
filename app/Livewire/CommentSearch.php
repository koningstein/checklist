<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comment;

class CommentSearch extends Component
{
    use WithPagination;

    public $searchComment = '';
    public $searchNewsTitle = '';
    public $sortField = 'comments.created_at';
    public $sortDirection = 'desc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function updatingSearchComment()
    {
        $this->resetPage();
    }

    public function updatingSearchNewsTitle()
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
        $comments = Comment::query()
            ->join('news', 'comments.news_id', '=', 'news.id')
            ->select('comments.*', 'news.title as news_title')
            ->when($this->searchComment, function ($query) {
                $query->where('comments.comment', 'like', '%' . $this->searchComment . '%');
            })
            ->when($this->searchNewsTitle, function ($query) {
                $query->where('news.title', 'like', '%' . $this->searchNewsTitle . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.comment-search', ['comments' => $comments]);
    }
}

