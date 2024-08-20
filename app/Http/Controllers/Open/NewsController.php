<?php

namespace App\Http\Controllers\Open;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the news for the public.
     */
    public function index()
    {
        $newsItems = News::withCount('comments')->orderBy('created_at', 'desc')->paginate(5);
        return view('open.news.index', compact('newsItems'));
    }

    /**
     * Display the specified news item with comments.
     */
    public function show(News $news)
    {
        $comments = $news->comments()->with('user')->latest()->get();
        return view('open.news.show', compact('news', 'comments'));
    }
}
