<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningSuboutcomeLevel;
use App\Models\LearningSuboutcome;
use App\Models\LearningLevel;
use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Requests\LearningSuboutcomeLevelStoreRequest;
use App\Http\Requests\LearningSuboutcomeLevelUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Throwable;

class LearningSuboutcomeLevelController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index learningsuboutcomelevel'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show learningsuboutcomelevel'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create learningsuboutcomelevel'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit learningsuboutcomelevel'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete learningsuboutcomelevel'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $learningsuboutcomelevels = LearningSuboutcomeLevel::with(['learningSuboutcome', 'learningLevel'])->paginate(15);
        return view('admin.learningsuboutcomelevels.index', ['learningsuboutcomelevels' => $learningsuboutcomelevels]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $learningsuboutcomes = LearningSuboutcome::all();
        $learninglevels = LearningLevel::all();
        return view('admin.learningsuboutcomelevels.create', ['learningsuboutcomes' => $learningsuboutcomes, 'learninglevels' => $learninglevels]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  LearningSuboutcomeLevelStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(LearningSuboutcomeLevelStoreRequest $request): RedirectResponse
    {
        $learningsuboutcomelevel = new LearningSuboutcomeLevel();
        $learningsuboutcomelevel->learning_suboutcome_id = $request->learning_suboutcome_id;
        $learningsuboutcomelevel->learning_level_id = $request->learning_level_id;
        $learningsuboutcomelevel->description = $request->description;
        $learningsuboutcomelevel->save();

        return to_route('admin.learningsuboutcomelevels.index')->with('status', 'Learning Suboutcome Level created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  LearningSuboutcomeLevel  $learningsuboutcomelevel
     * @return View
     */
    public function show(LearningSuboutcomeLevel $learningsuboutcomelevel): View
    {
        return view('admin.learningsuboutcomelevels.show', ['learningSuboutcomeLevel' => $learningsuboutcomelevel]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  LearningSuboutcomeLevel  $learningsuboutcomelevel
     * @return View
     */
    public function edit(LearningSuboutcomeLevel $learningsuboutcomelevel): View
    {
        $learningsuboutcomes = LearningSuboutcome::all();
        $learninglevels = LearningLevel::all();
        return view('admin.learningsuboutcomelevels.edit', [
            'learningSuboutcomeLevel' => $learningsuboutcomelevel,
            'learningSuboutcomes' => $learningsuboutcomes,
            'learningLevels' => $learninglevels,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  LearningSuboutcomeLevelUpdateRequest  $request
     * @param  LearningSuboutcomeLevel  $learningsuboutcomelevel
     * @return RedirectResponse
     */
    public function update(LearningSuboutcomeLevelUpdateRequest $request, LearningSuboutcomeLevel $learningsuboutcomelevel): RedirectResponse
    {
        $learningsuboutcomelevel->learning_suboutcome_id = $request->learning_suboutcome_id;
        $learningsuboutcomelevel->learning_level_id = $request->learning_level_id;
        $learningsuboutcomelevel->description = $request->description;
        $learningsuboutcomelevel->save();

        return to_route('admin.learningsuboutcomelevels.index')->with('status', 'Learning Suboutcome Level updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  LearningSuboutcomeLevel  $learningsuboutcomelevel
     * @return View
     */
    public function delete(LearningSuboutcomeLevel $learningsuboutcomelevel): View
    {
        return view('admin.learningsuboutcomelevels.delete', ['learningSuboutcomeLevel' => $learningsuboutcomelevel]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  LearningSuboutcomeLevel  $learningsuboutcomelevel
     * @return RedirectResponse
     */
    public function destroy(LearningSuboutcomeLevel $learningsuboutcomelevel): RedirectResponse
    {
        try {
            $learningsuboutcomelevel->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.learningsuboutcomelevels.index')->with('status-wrong', 'Learning Suboutcome Level cannot be deleted.');
        }
        return to_route('admin.learningsuboutcomelevels.index')->with('status', "Learning Suboutcome Level deleted successfully.");
    }
}
