<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentAssignment;
use App\Models\EnrolmentClass;
use App\Models\AssignmentStatus;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Http\Requests\StudentAssignmentStoreRequest;
use App\Http\Requests\StudentAssignmentUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;

class StudentAssignmentController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index studentassignment'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show studentassignment'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create studentassignment'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit studentassignment'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete studentassignment'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
//        $studentAssignments = StudentAssignment::with(['enrolmentClass', 'assignmentStatus', 'markedBy'])->paginate(15);
        $studentAssignments = StudentAssignment::with([
            'enrolmentClass.enrolment.student.user',
            'assignmentStatus',
            'markedBy',
            'individualAssignment',
            'classAssignment.assignment'
        ])
            ->get()
            ->sortBy(function ($studentAssignment) {
                return $studentAssignment->enrolmentClass->enrolment->student->user->name;
            })
            ->paginate(15);
        return view('admin.studentassignments.index', ['studentAssignments' => $studentAssignments]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $enrolmentClasses = EnrolmentClass::all();
        $assignmentStatuses = AssignmentStatus::all();
        $assignments = Assignment::all();
        return view('admin.studentassignments.create', [
            'enrolmentClasses' => $enrolmentClasses,
            'assignmentStatuses' => $assignmentStatuses,
            'assignments' => $assignments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  StudentAssignmentStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(StudentAssignmentStoreRequest $request): RedirectResponse
    {
        $studentAssignment = new StudentAssignment();
        $studentAssignment->enrolment_class_id = $request->enrolment_class_id;
        $studentAssignment->assignment_status_id = 1;
        $studentAssignment->marked_by_id = null;
        $studentAssignment->completed = false;
        $studentAssignment->marked_at = null;
        $studentAssignment->class_assignment_id = null;
        $studentAssignment->individual_assignment_id = $request->individual_assignment_id;
        $studentAssignment->duedate = $request->duedate;
        $studentAssignment->save();

        return to_route('admin.studentassignments.index')->with('status', 'Student Assignment created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  StudentAssignment  $studentassignment
     * @return View
     */
    public function show(StudentAssignment $studentassignment): View
    {
        return view('admin.studentassignments.show', ['studentAssignment' => $studentassignment]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  StudentAssignment  $studentassignment
     * @return View
     */
    public function edit(StudentAssignment $studentassignment): View
    {
        $enrolmentClasses = EnrolmentClass::all();
        $assignmentStatuses = AssignmentStatus::all();
        $assignments = Assignment::all();
        return view('admin.studentassignments.edit', [
            'studentAssignment' => $studentassignment,
            'enrolmentClasses' => $enrolmentClasses,
            'assignmentStatuses' => $assignmentStatuses,
            'assignments' => $assignments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  StudentAssignmentUpdateRequest  $request
     * @param  StudentAssignment  $studentassignment
     * @return RedirectResponse
     */
    public function update(StudentAssignmentUpdateRequest $request, StudentAssignment $studentassignment): RedirectResponse
    {
        $studentassignment->enrolment_class_id = $request->enrolment_class_id;
        $studentassignment->assignment_status_id = $request->assignment_status_id;
        $studentassignment->marked_by_id = $request->marked_by_id;
        $studentassignment->completed = $request->completed;
        $studentassignment->marked_at = $request->marked_at;
        $studentassignment->class_assignment_id = $request->class_assignment_id;
        $studentassignment->individual_assignment_id = $request->individual_assignment_id;
        $studentassignment->duedate = $request->duedate;
        $studentassignment->save();

        return to_route('admin.studentassignments.index')->with('status', 'Student Assignment updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  StudentAssignment  $studentassignment
     * @return View
     */
    public function delete(StudentAssignment $studentassignment): View
    {
        return view('admin.studentassignments.delete', ['studentAssignment' => $studentassignment]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  StudentAssignment  $studentassignment
     * @return RedirectResponse
     */
    public function destroy(StudentAssignment $studentassignment): RedirectResponse
    {
        try {
            $studentassignment->delete();
        } catch (\Throwable $error) {
            report($error);
            return to_route('admin.studentassignments.index')->with('status-wrong', 'Student Assignment cannot be deleted.');
        }
        return to_route('admin.studentassignments.index')->with('status', "Student Assignment deleted successfully.");
    }
}
