<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;

class CommentController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index comment'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show comment'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create comment'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit comment'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete comment'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with(['news', 'user'])->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Haal alle nieuwsberichten op
        $news = News::all();

        // Haal alle gebruikers op
        $users = User::all();
        return view('admin.comments.create', ['news' => $news, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentStoreRequest $request)
    {
        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = auth()->id();
        $comment->comment = $request->comment;
        $comment->save();

        return to_route('admin.comments.index')->with('status', 'Comment succesvol toegevoegd.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('admin.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentUpdateRequest $request, Comment $comment)
    {
        $comment->comment = $request->comment;
        $comment->save();

        return to_route('admin.comments.index')->with('status', 'Comment succesvol bijgewerkt.');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  Comment  $comment
     * @return View
     */
    public function delete(Comment $comment): View
    {
        return view('admin.comments.delete', ['comment' => $comment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comment  $comment
     * @return RedirectResponse
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        try {
            $comment->delete();
        } catch (\Throwable $error) {
            report($error);
            return to_route('admin.comments.index')->with('status-wrong', 'Comment kan niet worden verwijderd.');
        }

        return to_route('admin.comments.index')->with('status', 'Comment succesvol verwijderd.');
    }
}
