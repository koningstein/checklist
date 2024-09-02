<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;

class NewsController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index news'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show news'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create news'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit news'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete news'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsStoreRequest $request)
    {
        $news = new News();
        $news->title = $request->title;
        $news->news = $request->news;
        $news->user_id = auth()->id();
        $news->save();

        return to_route('admin.news.index')->with('status', 'Nieuwsbericht toegevoegd.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsUpdateRequest $request, News $news)
    {
        $news->title = $request->title;
        $news->news = $request->news;
        $news->user_id = auth()->id();
        $news->save();

        return to_route('admin.news.index')->with('status', 'Nieuwsbericht bijgewerkt.');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  News  $news
     * @return View
     */
    public function delete(News $news): View
    {
        return view('admin.news.delete', ['news' => $news]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News  $news
     * @return RedirectResponse
     */
    public function destroy(News $news): RedirectResponse
    {
        try {
            $news->delete();
        } catch (\Throwable $error) {
            report($error);
            return to_route('admin.news.index')->with('status-wrong', 'Het nieuwsbericht kan niet worden verwijderd.');
        }

        return to_route('admin.news.index')->with('status', "Nieuwsbericht $news->title succesvol verwijderd.");
    }
}
