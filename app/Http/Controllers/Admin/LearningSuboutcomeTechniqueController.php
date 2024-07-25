<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningSuboutcomeTechnique;
use App\Models\LearningSuboutcome;
use App\Models\LearningRelatedTechnique;
use Illuminate\Http\Request;
use App\Http\Requests\LearningSuboutcomeTechniqueStoreRequest;
use App\Http\Requests\LearningSuboutcomeTechniqueUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Throwable;

class LearningSuboutcomeTechniqueController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index learningsuboutcometechnique'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show learningsuboutcometechnique'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create learningsuboutcometechnique'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit learningsuboutcometechnique'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete learningsuboutcometechnique'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $learningSuboutcomeTechniques = LearningSuboutcomeTechnique::with(['learningSuboutcome', 'learningRelatedTechnique'])->paginate(15);
        return view('admin.learningsuboutcometechniques.index', ['learningSuboutcomeTechniques' => $learningSuboutcomeTechniques]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $learningSuboutcomes = LearningSuboutcome::all();
        $learningRelatedTechniques = LearningRelatedTechnique::all();
        return view('admin.learningsuboutcometechniques.create', [
            'learningSuboutcomes' => $learningSuboutcomes,
            'learningRelatedTechniques' => $learningRelatedTechniques
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  LearningSuboutcomeTechniqueStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(LearningSuboutcomeTechniqueStoreRequest $request): RedirectResponse
    {
        $learningSuboutcomeTechnique = new LearningSuboutcomeTechnique();
        $learningSuboutcomeTechnique->learning_suboutcome_id = $request->learning_suboutcome_id;
        $learningSuboutcomeTechnique->learning_related_technique_id = $request->learning_related_technique_id;
        $learningSuboutcomeTechnique->save();

        return to_route('admin.learningsuboutcometechniques.index')->with('status', 'Learning Suboutcome Technique created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  LearningSuboutcomeTechnique  $learningsuboutcometechnique
     * @return View
     */
    public function show(LearningSuboutcomeTechnique $learningsuboutcometechnique): View
    {
        return view('admin.learningsuboutcometechniques.show', ['learningSuboutcomeTechnique' => $learningsuboutcometechnique]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  LearningSuboutcomeTechnique  $learningsuboutcometechnique
     * @return View
     */
    public function edit(LearningSuboutcomeTechnique $learningsuboutcometechnique): View
    {
        $learningSuboutcomes = LearningSuboutcome::all();
        $learningRelatedTechniques = LearningRelatedTechnique::all();
        return view('admin.learningsuboutcometechniques.edit', [
            'learningSuboutcomeTechnique' => $learningsuboutcometechnique,
            'learningSuboutcomes' => $learningSuboutcomes,
            'learningRelatedTechniques' => $learningRelatedTechniques
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  LearningSuboutcomeTechniqueUpdateRequest  $request
     * @param  LearningSuboutcomeTechnique  $learningsuboutcometechnique
     * @return RedirectResponse
     */
    public function update(LearningSuboutcomeTechniqueUpdateRequest $request, LearningSuboutcomeTechnique $learningsuboutcometechnique): RedirectResponse
    {
        $learningsuboutcometechnique->learning_suboutcome_id = $request->learning_suboutcome_id;
        $learningsuboutcometechnique->learning_related_technique_id = $request->learning_related_technique_id;
        $learningsuboutcometechnique->save();

        return to_route('admin.learningsuboutcometechniques.index')->with('status', 'Learning Suboutcome Technique updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  LearningSuboutcomeTechnique  $learningsuboutcometechnique
     * @return View
     */
    public function delete(LearningSuboutcomeTechnique $learningsuboutcometechnique): View
    {
        return view('admin.learningsuboutcometechniques.delete', ['learningSuboutcomeTechnique' => $learningsuboutcometechnique]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  LearningSuboutcomeTechnique  $learningsuboutcometechnique
     * @return RedirectResponse
     */
    public function destroy(LearningSuboutcomeTechnique $learningsuboutcometechnique): RedirectResponse
    {
        try {
            $learningsuboutcometechnique->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.learningsuboutcometechniques.index')->with('status-wrong', 'Learning Suboutcome Technique cannot be deleted.');
        }
        return to_route('admin.learningsuboutcometechniques.index')->with('status', "Learning Suboutcome Technique deleted successfully.");
    }
}
