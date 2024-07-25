<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningLevel;
use Illuminate\Http\Request;
use App\Http\Requests\LearningLevelStoreRequest;
use App\Http\Requests\LearningLevelUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Throwable;

class LearningLevelController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index learninglevel'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show learninglevel'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create learninglevel'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit learninglevel'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete learninglevel'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $learningLevels = LearningLevel::paginate(15);
        return view('admin.learninglevels.index', ['learningLevels' => $learningLevels]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin.learninglevels.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  LearningLevelStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(LearningLevelStoreRequest $request): RedirectResponse
    {
        $learningLevel = new LearningLevel();
        $learningLevel->name = $request->name;
        $learningLevel->description = $request->description;
        $learningLevel->save();

        return to_route('admin.learninglevels.index')->with('status', 'Learning Level created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  LearningLevel  $learninglevel
     * @return View
     */
    public function show(LearningLevel $learninglevel): View
    {
        return view('admin.learninglevels.show', ['learningLevel' => $learninglevel]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  LearningLevel  $learninglevel
     * @return View
     */
    public function edit(LearningLevel $learninglevel): View
    {
        return view('admin.learninglevels.edit', ['learningLevel' => $learninglevel]);
    }

    /**
     * Update the specified resource in storage.
     * @param  LearningLevelUpdateRequest  $request
     * @param  LearningLevel  $learninglevel
     * @return RedirectResponse
     */
    public function update(LearningLevelUpdateRequest $request, LearningLevel $learninglevel): RedirectResponse
    {
        $learninglevel->name = $request->name;
        $learninglevel->description = $request->description;
        $learninglevel->save();

        return to_route('admin.learninglevels.index')->with('status', 'Learning Level updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  LearningLevel  $learninglevel
     * @return View
     */
    public function delete(LearningLevel $learninglevel): View
    {
        return view('admin.learninglevels.delete', ['learningLevel' => $learninglevel]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  LearningLevel  $learninglevel
     * @return RedirectResponse
     */
    public function destroy(LearningLevel $learninglevel): RedirectResponse
    {
        try {
            $learninglevel->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.learninglevels.index')->with('status-wrong', 'Learning Level cannot be deleted.');
        }
        return to_route('admin.learninglevels.index')->with('status', "Learning Level $learninglevel->name deleted successfully.");
    }
}
