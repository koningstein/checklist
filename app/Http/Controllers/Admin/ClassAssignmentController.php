<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassAssignment;
use App\Models\ClassYear;
use App\Models\Assignment;
use App\Models\StudentAssignment;
use Illuminate\Http\Request;
use App\Http\Requests\ClassAssignmentStoreRequest;
use App\Http\Requests\ClassAssignmentUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;

class ClassAssignmentController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index classassignment'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show classassignment'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create classassignment'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit classassignment'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete classassignment'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $classAssignments = ClassAssignment::with(['classYear.schoolClass', 'assignment'])->paginate(15);
        return view('admin.classassignments.index', ['classAssignments' => $classAssignments]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $classes = ClassYear::with('schoolClass', 'schoolYear')->get();
        $assignments = Assignment::all();
        return view('admin.classassignments.create', ['classes' => $classes, 'assignments' => $assignments]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  ClassAssignmentStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(ClassAssignmentStoreRequest $request): RedirectResponse
    {

        $classAssignment = ClassAssignment::create([
            'class_year_id' => $request->class_year_id,
            'assignment_id' => $request->assignment_id,
            'duedate' => $request->duedate,
        ]);

        // huidige klas gebruiken (ClassYear), en daar de student inschrijvingen krijgen
        $enrolmentClasses = $classAssignment->classYear->enrolmentClasses;
        // Voor elke student in de class, maak een StudentAssignment aan
        foreach ($enrolmentClasses as $enrolmentClass) {
            StudentAssignment::create([
                'enrolment_class_id' => $enrolmentClass->id,
                'class_assignment_id' => $classAssignment->id,
                'duedate' => $classAssignment->duedate,
                'assignment_status_id' => 1, // Zorg ervoor dat dit een geldige status_id is
                'marked_by_id' => null,
                'completed' => false,
                'marked_at' => null,
            ]);
        }

        return to_route('admin.classassignments.index')->with('status', 'Class Assignment created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  ClassAssignment  $classAssignment
     * @return View
     */
    public function show(ClassAssignment $classassignment): View
    {
        $classassignment->load([
            'classYear.schoolClass',
            'classYear.schoolYear',
            'classYear.enrolmentClasses.enrolment.student.user',
            'studentAssignments.assignmentStatus',
            'studentAssignments.markedBy'
        ]);

        return view('admin.classassignments.show', [
            'classAssignment' => $classassignment,
            'enrolmentClasses' => $classassignment->classYear->enrolmentClasses,
            'studentAssignments' => $classassignment->studentAssignments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  ClassAssignment  $classassignment
     * @return View
     */
    public function edit(ClassAssignment $classassignment): View
    {
        $classes = ClassYear::with('schoolClass', 'schoolYear')->get();
        $assignments = Assignment::all();
        return view('admin.classassignments.edit', ['classAssignment' => $classassignment, 'classes' => $classes, 'assignments' => $assignments]);
    }

    /**
     * Update the specified resource in storage.
     * @param  ClassAssignmentUpdateRequest  $request
     * @param  ClassAssignment  $classassignment
     * @return RedirectResponse
     */
    public function update(ClassAssignmentUpdateRequest $request, ClassAssignment $classassignment): RedirectResponse
    {
        $classassignment->update([
            'class_year_id' => $request->class_year_id,
            'assignment_id' => $request->assignment_id,
            'duedate' => $request->duedate,
        ]);

        // Check if the assignment_id has changed
        if ($request->assignment_id != $classassignment->getOriginal('assignment_id')) {
            // Verwijder oude student assignments
            StudentAssignment::where('class_assignment_id', $classassignment->id)->delete();

            // Voor elke student in de class, maak een nieuwe StudentAssignment aan
            foreach ($classassignment->classYear->enrolmentClasses as $enrolmentClass) {
                StudentAssignment::create([
                    'enrolment_class_id' => $enrolmentClass->id,
                    'class_assignment_id' => $classassignment->id,
                    'duedate' => $classassignment->duedate,
                    'assignment_status_id' => 1, // Zorg ervoor dat dit een geldige status_id is
                    'marked_by_id' => null,
                    'completed' => false,
                    'marked_at' => null,
                ]);
            }
        }

        return to_route('admin.classassignments.index')->with('status', 'Class Assignment updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  ClassAssignment  $classassignment
     * @return View
     */
    public function delete(ClassAssignment $classassignment): View
    {
        return view('admin.classassignments.delete', ['classAssignment' => $classassignment]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  ClassAssignment  $classassignment
     * @return RedirectResponse
     */
    public function destroy(ClassAssignment $classassignment): RedirectResponse
    {
        try {
            // Verwijder eerst de student assignments
            foreach ($classassignment->studentAssignments as $studentAssignment) {
                $studentAssignment->delete();
            }
            // Verwijder daarna de class assignment zelf
            $classassignment->delete();
        } catch (\Throwable $error) {
            report($error);
            return to_route('admin.classassignments.index')->with('status-wrong', 'Class Assignment cannot be deleted.');
        }
        return to_route('admin.classassignments.index')->with('status', "Class Assignment deleted successfully.");
    }

}
