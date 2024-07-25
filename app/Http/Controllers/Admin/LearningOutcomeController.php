<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningOutcome;
use Illuminate\Http\Request;
use App\Http\Requests\LearningOutcomeStoreRequest;
use App\Http\Requests\LearningOutcomeUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Throwable;

class LearningOutcomeController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index learningoutcome'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show learningoutcome'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create learningoutcome'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit learningoutcome'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete learningoutcome'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $learningOutcomes = LearningOutcome::paginate(15);
        return view('admin.learningoutcomes.index', ['learningOutcomes' => $learningOutcomes]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin.learningoutcomes.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  LearningOutcomeStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(LearningOutcomeStoreRequest $request): RedirectResponse
    {
        $learningoutcome = new LearningOutcome();
        $learningoutcome->number = $request->number;
        $learningoutcome->name = $request->name;
        $learningoutcome->description = $request->description;
        $learningoutcome->save();

        return to_route('admin.learningoutcomes.index')->with('status', 'Learning Outcome created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  LearningOutcome  $learningoutcome
     * @return View
     */
    public function show(LearningOutcome $learningoutcome): View
    {
        return view('admin.learningoutcomes.show', ['learningOutcome' => $learningoutcome]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  LearningOutcome  $learningoutcome
     * @return View
     */
    public function edit(LearningOutcome $learningoutcome): View
    {
        return view('admin.learningoutcomes.edit', ['learningOutcome' => $learningoutcome]);
    }

    /**
     * Update the specified resource in storage.
     * @param  LearningOutcomeUpdateRequest  $request
     * @param  LearningOutcome  $learningoutcome
     * @return RedirectResponse
     */
    public function update(LearningOutcomeUpdateRequest $request, LearningOutcome $learningoutcome): RedirectResponse
    {
        $learningoutcome->number = $request->number;
        $learningoutcome->name = $request->name;
        $learningoutcome->description = $request->description;
        $learningoutcome->save();

        return to_route('admin.learningoutcomes.index')->with('status', 'Learning Outcome updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  LearningOutcome  $learningoutcome
     * @return View
     */
    public function delete(LearningOutcome $learningoutcome): View
    {
        return view('admin.learningoutcomes.delete', ['learningOutcome' => $learningoutcome]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  LearningOutcome  $learningoutcome
     * @return RedirectResponse
     */
    public function destroy(LearningOutcome $learningoutcome): RedirectResponse
    {
        try {
            $learningoutcome->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.learningoutcomes.index')->with('status-wrong', 'Learning Outcome cannot be deleted.');
        }
        return to_route('admin.learningoutcomes.index')->with('status', "Learning Outcome $learningoutcome->name deleted successfully.");
    }
}
