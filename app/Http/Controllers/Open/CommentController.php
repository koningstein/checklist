<?php

namespace App\Http\Controllers\Open;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     */
    public function store(CommentStoreRequest $request, News $news)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->news_id = $news->id;
        $comment->user_id = Auth::id();
        $comment->save();

        return to_route('news.show', $news)->with('status', 'Comment succesvol toegevoegd.');
    }
}
