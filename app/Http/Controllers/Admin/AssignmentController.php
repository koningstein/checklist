<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Requests\AssignmentStoreRequest;
use App\Http\Requests\AssignmentUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Throwable;

class AssignmentController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index assignment'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show assignment'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create assignment'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit assignment'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete assignment'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $assignments = Assignment::with('module')->paginate(15);
        return view('admin.assignments.index', ['assignments' => $assignments]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $modules = Module::all();
        return view('admin.assignments.create', ['modules' => $modules]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  AssignmentStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(AssignmentStoreRequest $request): RedirectResponse
    {
        $assignment = new Assignment();
        $assignment->name = $request->name;
        $assignment->description = $request->description;
        $assignment->duedate = $request->duedate;
        $assignment->module_id = $request->module_id;
        $assignment->save();

        return to_route('admin.assignments.index')->with('status', 'Assignment created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  Assignment  $assignment
     * @return View
     */
    public function show(Assignment $assignment): View
    {
        return view('admin.assignments.show', ['assignment' => $assignment]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Assignment  $assignment
     * @return View
     */
    public function edit(Assignment $assignment): View
    {
        $modules = Module::all();
        return view('admin.assignments.edit', ['assignment' => $assignment, 'modules' => $modules]);
    }

    /**
     * Update the specified resource in storage.
     * @param  AssignmentUpdateRequest  $request
     * @param  Assignment  $assignment
     * @return RedirectResponse
     */
    public function update(AssignmentUpdateRequest $request, Assignment $assignment): RedirectResponse
    {
        $assignment->name = $request->name;
        $assignment->description = $request->description;
        $assignment->duedate = $request->duedate;
        $assignment->module_id = $request->module_id;
        $assignment->save();
        return to_route('admin.assignments.index')->with('status', 'Assignment updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  Assignment  $assignment
     * @return View
     */
    public function delete(Assignment $assignment): View
    {
        return view('admin.assignments.delete', ['assignment' => $assignment]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Assignment  $assignment
     * @return RedirectResponse
     */
    public function destroy(Assignment $assignment): RedirectResponse
    {
        try {
            $assignment->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.assignments.index')->with('status-wrong', 'Assignment cannot be deleted.');
        }
        return to_route('admin.assignments.index')->with('status', "Assignment $assignment->name deleted successfully.");
    }
}
