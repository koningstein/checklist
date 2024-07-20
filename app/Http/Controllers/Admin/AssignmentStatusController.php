<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssignmentStatus;
use Illuminate\Http\Request;
use App\Http\Requests\AssignmentStatusStoreRequest;
use App\Http\Requests\AssignmentStatusUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;

class AssignmentStatusController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index assignmentstatus'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show assignmentstatus'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create assignmentstatus'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit assignmentstatus'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete assignmentstatus'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $assignmentStatuses = AssignmentStatus::paginate(15);
        return view('admin.assignmentstatuses.index', ['assignmentStatuses' => $assignmentStatuses]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('admin.assignmentstatuses.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param AssignmentStatusStoreRequest $request
     * @return RedirectResponse
     */
    public function store(AssignmentStatusStoreRequest $request): RedirectResponse
    {
        $assignmentStatus = new AssignmentStatus();
        $assignmentStatus->name = $request->name;
        $assignmentStatus->save();

        return to_route('admin.assignmentstatuses.index')->with('status', 'Assignment Status created successfully.');
    }

    /**
     * Display the specified resource.
     * @param AssignmentStatus $assignmentstatus
     * @return View
     */
    public function show(AssignmentStatus $assignmentstatus): View
    {
        return view('admin.assignmentstatuses.show', ['assignmentStatus' => $assignmentstatus]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param AssignmentStatus $assignmentstatus
     * @return View
     */
    public function edit(AssignmentStatus $assignmentstatus): View
    {
        return view('admin.assignmentstatuses.edit', ['assignmentStatus' => $assignmentstatus]);
    }

    /**
     * Update the specified resource in storage.
     * @param AssignmentStatusUpdateRequest $request
     * @param AssignmentStatus $assignmentstatus
     * @return RedirectResponse
     */
    public function update(AssignmentStatusUpdateRequest $request, AssignmentStatus $assignmentstatus): RedirectResponse
    {
        $assignmentstatus->name = $request->name;
        $assignmentstatus->save();
        return to_route('admin.assignmentstatuses.index')->with('status', 'Assignment Status updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param AssignmentStatus $assignmentstatus
     * @return View
     */
    public function delete(AssignmentStatus $assignmentstatus): View
    {
        return view('admin.assignmentstatuses.delete', ['assignmentstatus' => $assignmentstatus]);
    }

    /**
     * Remove the specified resource from storage.
     * @param AssignmentStatus $assignmentstatus
     * @return RedirectResponse
     */
    public function destroy(AssignmentStatus $assignmentstatus): RedirectResponse
    {
        try {
            $assignmentstatus->delete();
        } catch (Throwable $error) {
            report($error);
            return to_route('admin.assignmentstatuses.index')->with('status-wrong', 'Assignment Status cannot be deleted.');
        }
        return to_route('admin.assignmentstatuses.index')->with('status', "Assignment Status $assignmentstatus->name deleted successfully.");
    }
}
