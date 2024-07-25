<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningSuboutcome;
use App\Models\LearningOutcome;
use Illuminate\Http\Request;
use App\Http\Requests\LearningSuboutcomeStoreRequest;
use App\Http\Requests\LearningSuboutcomeUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Throwable;

class LearningSuboutcomeController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index learningsuboutcome'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show learningsuboutcome'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create learningsuboutcome'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit learningsuboutcome'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete learningsuboutcome'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $learningSuboutcomes = LearningSuboutcome::with(['learningOutcome'])->paginate(15);
        return view('admin.learningsuboutcomes.index', ['learningSuboutcomes' => $learningSuboutcomes]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $learningOutcomes = LearningOutcome::all();
        return view('admin.learningsuboutcomes.create', ['learningOutcomes' => $learningOutcomes]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  LearningSuboutcomeStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(LearningSuboutcomeStoreRequest $request): RedirectResponse
    {
        $learningSuboutcome = new LearningSuboutcome();
        $learningSuboutcome->learning_outcome_id = $request->learning_outcome_id;
        $learningSuboutcome->name = $request->name;
        $learningSuboutcome->description = $request->description;
        $learningSuboutcome->save();

        return to_route('admin.learningsuboutcomes.index')->with('status', 'Learning Suboutcome created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  LearningSuboutcome  $learningsuboutcome
     * @return View
     */
    public function show(LearningSuboutcome $learningsuboutcome): View
    {
        return view('admin.learningsuboutcomes.show', ['learningSuboutcome' => $learningsuboutcome]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  LearningSuboutcome  $learningsuboutcome
     * @return View
     */
    public function edit(LearningSuboutcome $learningsuboutcome): View
    {
        $learningOutcomes = LearningOutcome::all();
        return view('admin.learningsuboutcomes.edit', ['learningSuboutcome' => $learningsuboutcome, 'learningOutcomes' => $learningOutcomes]);
    }

    /**
     * Update the specified resource in storage.
     * @param  LearningSuboutcomeUpdateRequest  $request
     * @param  LearningSuboutcome  $learningsuboutcome
     * @return RedirectResponse
     */
    public function update(LearningSuboutcomeUpdateRequest $request, LearningSuboutcome $learningsuboutcome): RedirectResponse
    {
        $learningsuboutcome->learning_outcome_id = $request->learning_outcome_id;
        $learningsuboutcome->name = $request->name;
        $learningsuboutcome->description = $request->description;
        $learningsuboutcome->save();

        return to_route('admin.learningsuboutcomes.index')->with('status', 'Learning Suboutcome updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  LearningSuboutcome  $learningsuboutcome
     * @return View
     */
    public function delete(LearningSuboutcome $learningsuboutcome): View
    {
        return view('admin.learningsuboutcomes.delete', ['learningSuboutcome' => $learningsuboutcome]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  LearningSuboutcome  $learningsuboutcome
     * @return RedirectResponse
     */
    public function destroy(LearningSuboutcome $learningsuboutcome): RedirectResponse
    {
        try {
            $learningsuboutcome->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.learningsuboutcomes.index')->with('status-wrong', 'Learning Suboutcome cannot be deleted.');
        }
        return to_route('admin.learningsuboutcomes.index')->with('status', "Learning Suboutcome $learningsuboutcome->name deleted successfully.");
    }
}
