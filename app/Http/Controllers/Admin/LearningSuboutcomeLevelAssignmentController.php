<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningSuboutcomeLevel;
use App\Models\LearningSuboutcomeLevelAssignment;
use App\Models\LearningSuboutcome;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Http\Requests\LearningSuboutcomeAssignmentStoreRequest;
use App\Http\Requests\LearningSuboutcomeAssignmentUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Throwable;

class LearningSuboutcomeLevelAssignmentController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index learningsuboutcomelevelassignment'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show learningsuboutcomelevelassignment'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create learningsuboutcomelevelassignment'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit learningsuboutcomelevelassignment'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete learningsuboutcomelevelassignment'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $learningSuboutcomeLevelAssignments = LearningSuboutcomeLevelAssignment::with(['learningSuboutcomeLevel', 'assignment'])->paginate(15);
        return view('admin.learningsuboutcomelevelassignments.index', ['lSuboutcomeLevelAssignments' => $learningSuboutcomeLevelAssignments]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $assignments = Assignment::all();
        $learningSuboutcomeLevels = LearningSuboutcomeLevel::with(['learningSuboutcome', 'learningLevel'])->get();

        return view('admin.learningsuboutcomelevelassignments.create', [
            'assignments' => $assignments,
            'learningSuboutcomeLevels' => $learningSuboutcomeLevels,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  LearningSuboutcomeAssignmentStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(LearningSuboutcomeAssignmentStoreRequest $request): RedirectResponse
    {
        $learningSuboutcomeAssignment = new LearningSuboutcomeLevelAssignment();
        $learningSuboutcomeAssignment->learning_suboutcome_level_id = $request->learning_suboutcome_level_id;
        $learningSuboutcomeAssignment->assignment_id = $request->assignment_id;
        $learningSuboutcomeAssignment->save();

        return to_route('admin.lsuboutcomelevelassignments.index')->with('status', 'Learning Suboutcome Assignment created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  LearningSuboutcomeLevelAssignment  $learningsuboutcomeassignment
     * @return View
     */
    public function show(LearningSuboutcomeLevelAssignment $lsuboutcomelevelassignment): View
    {
        // Laad de relaties op voor betere performance
        $lsuboutcomelevelassignment->load(['learningSuboutcomeLevel.learningSuboutcome', 'learningSuboutcomeLevel.learningLevel', 'assignment']);

        return view('admin.learningsuboutcomelevelassignments.show', [
            'learningSuboutcomeLevelAssignment' => $lsuboutcomelevelassignment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  LearningSuboutcomeLevelAssignment  $lsuboutcomelevelassignment
     * @return View
     */
    public function edit(LearningSuboutcomeLevelAssignment $lsuboutcomelevelassignment): View
    {
        $assignments = Assignment::all();
        $learningSuboutcomeLevels = LearningSuboutcomeLevel::with(['learningSuboutcome', 'learningLevel'])->get();

        return view('admin.learningsuboutcomelevelassignments.edit', [
            'learningSuboutcomeLevelAssignment' => $lsuboutcomelevelassignment,
            'assignments' => $assignments,
            'learningSuboutcomeLevels' => $learningSuboutcomeLevels,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  LearningSuboutcomeAssignmentUpdateRequest  $request
     * @param  LearningSuboutcomeLevelAssignment  $lsuboutcomeassiglevelnment
     * @return RedirectResponse
     */
    public function update(LearningSuboutcomeAssignmentUpdateRequest $request, LearningSuboutcomeLevelAssignment $lsuboutcomelevelassignment): RedirectResponse
    {
        $lsuboutcomelevelassignment->learning_suboutcome_level_id = $request->learning_suboutcome_level_id;
        $lsuboutcomelevelassignment->assignment_id = $request->assignment_id;
        $lsuboutcomelevelassignment->save();

        return to_route('admin.lsuboutcomelevelassignments.index')->with('status', 'Learning Suboutcome Level Assignment updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  LearningSuboutcomeLevelAssignment  $lsuboutcomelevelassignment
     * @return View
     */
    public function delete(LearningSuboutcomeLevelAssignment $lsuboutcomelevelassignment): View
    {
        return view('admin.learningsuboutcomelevelassignments.delete', ['learningSuboutcomeLevelAssignment' => $lsuboutcomelevelassignment]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  LearningSuboutcomeLevelAssignment  $lsuboutcomelevelassignment
     * @return RedirectResponse
     */
    public function destroy(LearningSuboutcomeLevelAssignment $lsuboutcomelevelassignment): RedirectResponse
    {
        try {
            $lsuboutcomelevelassignment->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.lsuboutcomelevelassignments.index')->with('status-wrong', 'Learning Suboutcome Level Assignment cannot be deleted.');
        }
        return to_route('admin.lsuboutcomelevelassignments.index')->with('status', 'Learning Suboutcome Level Assignment deleted successfully.');
    }
}
