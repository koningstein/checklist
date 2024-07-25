<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningRelatedTechnique;
use Illuminate\Http\Request;
use App\Http\Requests\LearningRelatedTechniqueStoreRequest;
use App\Http\Requests\LearningRelatedTechniqueUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Throwable;

class LearningRelatedTechniqueController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index learningrelatedtechnique'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show learningrelatedtechnique'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create learningrelatedtechnique'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit learningrelatedtechnique'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete learningrelatedtechnique'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $learningRelatedTechniques = LearningRelatedTechnique::paginate(15);
        return view('admin.learningrelatedtechniques.index', ['learningRelatedTechniques' => $learningRelatedTechniques]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin.learningrelatedtechniques.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  LearningRelatedTechniqueStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(LearningRelatedTechniqueStoreRequest $request): RedirectResponse
    {
        $learningRelatedTechnique = new LearningRelatedTechnique();
        $learningRelatedTechnique->name = $request->name;
        $learningRelatedTechnique->save();

        return to_route('admin.learningrelatedtechniques.index')->with('status', 'Learning Related Technique created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  LearningRelatedTechnique  $learningrelatedtechnique
     * @return View
     */
    public function show(LearningRelatedTechnique $learningrelatedtechnique): View
    {
        return view('admin.learningrelatedtechniques.show', ['learningRelatedTechnique' => $learningrelatedtechnique]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  LearningRelatedTechnique  $learningrelatedtechnique
     * @return View
     */
    public function edit(LearningRelatedTechnique $learningrelatedtechnique): View
    {
        return view('admin.learningrelatedtechniques.edit', ['learningRelatedTechnique' => $learningrelatedtechnique]);
    }

    /**
     * Update the specified resource in storage.
     * @param  LearningRelatedTechniqueUpdateRequest  $request
     * @param  LearningRelatedTechnique  $learningrelatedtechnique
     * @return RedirectResponse
     */
    public function update(LearningRelatedTechniqueUpdateRequest $request, LearningRelatedTechnique $learningrelatedtechnique): RedirectResponse
    {
        $learningrelatedtechnique->name = $request->name;
        $learningrelatedtechnique->save();

        return to_route('admin.learningrelatedtechniques.index')->with('status', 'Learning Related Technique updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  LearningRelatedTechnique  $learningrelatedtechnique
     * @return View
     */
    public function delete(LearningRelatedTechnique $learningrelatedtechnique): View
    {
        return view('admin.learningrelatedtechniques.delete', ['learningRelatedTechnique' => $learningrelatedtechnique]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  LearningRelatedTechnique  $learningrelatedtechnique
     * @return RedirectResponse
     */
    public function destroy(LearningRelatedTechnique $learningrelatedtechnique): RedirectResponse
    {
        try {
            $learningrelatedtechnique->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.learningrelatedtechniques.index')->with('status-wrong', 'Learning Related Technique cannot be deleted.');
        }
        return to_route('admin.learningrelatedtechniques.index')->with('status', "Learning Related Technique deleted successfully.");
    }
}
