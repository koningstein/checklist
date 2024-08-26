<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

class LearningSuboutcomeAssignmentController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index learningsuboutcomeassignment'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show learningsuboutcomeassignment'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create learningsuboutcomeassignment'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit learningsuboutcomeassignment'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete learningsuboutcomeassignment'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $learningSuboutcomeAssignments = LearningSuboutcomeLevelAssignment::with(['learningSuboutcome', 'assignment'])->paginate(15);
        return view('admin.learningsuboutcomeassignments.index', ['learningSuboutcomeAssignments' => $learningSuboutcomeAssignments]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $learningSuboutcomes = LearningSuboutcome::all();
        $assignments = Assignment::all();
        return view('admin.learningsuboutcomeassignments.create', [
            'learningSuboutcomes' => $learningSuboutcomes,
            'assignments' => $assignments,
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
        $learningSuboutcomeAssignment->learning_suboutcome_id = $request->learning_suboutcome_id;
        $learningSuboutcomeAssignment->assignment_id = $request->assignment_id;
        $learningSuboutcomeAssignment->save();

        return to_route('admin.learningsuboutcomeassignments.index')->with('status', 'Learning Suboutcome Assignment created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  LearningSuboutcomeLevelAssignment  $learningsuboutcomeassignment
     * @return View
     */
    public function show(LearningSuboutcomeLevelAssignment $learningsuboutcomeassignment): View
    {
        return view('admin.learningsuboutcomeassignments.show', ['learningSuboutcomeAssignment' => $learningsuboutcomeassignment]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  LearningSuboutcomeLevelAssignment  $learningsuboutcomeassignment
     * @return View
     */
    public function edit(LearningSuboutcomeLevelAssignment $learningsuboutcomeassignment): View
    {
        $learningSuboutcomes = LearningSuboutcome::all();
        $assignments = Assignment::all();
        return view('admin.learningsuboutcomeassignments.edit', [
            'learningSuboutcomeAssignment' => $learningsuboutcomeassignment,
            'learningSuboutcomes' => $learningSuboutcomes,
            'assignments' => $assignments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  LearningSuboutcomeAssignmentUpdateRequest  $request
     * @param  LearningSuboutcomeLevelAssignment  $learningsuboutcomeassignment
     * @return RedirectResponse
     */
    public function update(LearningSuboutcomeAssignmentUpdateRequest $request, LearningSuboutcomeLevelAssignment $learningsuboutcomeassignment): RedirectResponse
    {
        $learningsuboutcomeassignment->learning_suboutcome_id = $request->learning_suboutcome_id;
        $learningsuboutcomeassignment->assignment_id = $request->assignment_id;
        $learningsuboutcomeassignment->save();

        return to_route('admin.learningsuboutcomeassignments.index')->with('status', 'Learning Suboutcome Assignment updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  LearningSuboutcomeLevelAssignment  $learningsuboutcomeassignment
     * @return View
     */
    public function delete(LearningSuboutcomeLevelAssignment $learningsuboutcomeassignment): View
    {
        return view('admin.learningsuboutcomeassignments.delete', ['learningSuboutcomeAssignment' => $learningsuboutcomeassignment]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  LearningSuboutcomeLevelAssignment  $learningsuboutcomeassignment
     * @return RedirectResponse
     */
    public function destroy(LearningSuboutcomeLevelAssignment $learningsuboutcomeassignment): RedirectResponse
    {
        try {
            $learningsuboutcomeassignment->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.learningsuboutcomeassignments.index')->with('status-wrong', 'Learning Suboutcome Assignment cannot be deleted.');
        }
        return to_route('admin.learningsuboutcomeassignments.index')->with('status', 'Learning Suboutcome Assignment deleted successfully.');
    }
}
