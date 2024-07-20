<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnrolmentClass;
use App\Models\ClassYear;
use App\Models\Enrolment;
use App\Models\StudentAssignment;
use App\Models\ClassAssignment;
use Illuminate\Http\Request;
use App\Http\Requests\EnrolmentClassStoreRequest;
use App\Http\Requests\EnrolmentClassUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;

class EnrolmentClassController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index enrolmentclass'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show enrolmentclass'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create enrolmentclass'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit enrolmentclass'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete enrolmentclass'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $enrolmentClasses = EnrolmentClass::with(['classYear.schoolClass', 'enrolment.student.user'])->paginate(15);
        return view('admin.enrolmentclasses.index', ['enrolmentClasses' => $enrolmentClasses]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $classes = ClassYear::with('schoolClass', 'schoolYear')->get();
        $enrolments = Enrolment::with('student.user')->get();
        return view('admin.enrolmentclasses.create', ['classes' => $classes, 'enrolments' => $enrolments]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  EnrolmentClassStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(EnrolmentClassStoreRequest $request): RedirectResponse
    {
        $enrolmentClass = EnrolmentClass::create([
            'class_year_id' => $request->class_year_id,
            'enrolment_id' => $request->enrolment_id,
        ]);

        // Voeg opdrachten toe aan student indien geselecteerd
        if ($request->has('assignments') && $request->assignments) {
            $classAssignments = ClassAssignment::where('class_year_id', $request->class_year_id)->get();
            foreach ($classAssignments as $classAssignment) {
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
        }

        return to_route('admin.enrolmentclasses.index')->with('status', 'Enrolment Class created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  EnrolmentClass  $enrolmentclass
     * @return View
     */
    public function show(EnrolmentClass $enrolmentclass): View
    {
        $enrolmentclass->load([
            'enrolment.student.user',
            'classYear.schoolClass',
            'classYear.schoolYear',
            'studentAssignments.classAssignment.assignment',
            'studentAssignments.assignmentStatus',
            'studentAssignments.markedBy'
        ]);

        return view('admin.enrolmentclasses.show', [
            'enrolmentClass' => $enrolmentclass,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  EnrolmentClass  $enrolmentclass
     * @return View
     */
    public function edit(EnrolmentClass $enrolmentclass): View
    {
        $enrolmentclass->load([
            'enrolment.student.user',
            'classYear.schoolClass',
            'classYear.schoolYear',
        ]);
        $classes = ClassYear::with('schoolClass', 'schoolYear')->get();
        $enrolments = Enrolment::with('student.user')->get();
        return view('admin.enrolmentclasses.edit', ['enrolmentClass' => $enrolmentclass, 'classes' => $classes, 'enrolments' => $enrolments]);
    }

    /**
     * Update the specified resource in storage.
     * @param  EnrolmentClassUpdateRequest  $request
     * @param  EnrolmentClass  $enrolmentclass
     * @return RedirectResponse
     */
    public function update(EnrolmentClassUpdateRequest $request, EnrolmentClass $enrolmentclass): RedirectResponse
    {
        // Check if class year has changed
        $classYearChanged = $enrolmentclass->class_year_id !== $request->class_year_id;

        // Update enrolment class details
        $enrolmentclass->update([
            'enrolment_id' => $request->enrolment_id,
            'class_year_id' => $request->class_year_id,
        ]);

        // Verwijder de bestaande studentopdrachten die de status 'niet gestart' hebben als de klas veranderd is
        if ($classYearChanged) {
            $enrolmentclass->studentAssignments()
                ->whereHas('assignmentStatus', function ($query) {
                    $query->where('name', 'niet gestart');
                })
                ->delete();
        }

        // Check if assignments should be added
        if ($request->assignments) {
            $classAssignments = ClassAssignment::where('class_year_id', $request->class_year_id)->get();

            foreach ($classAssignments as $classAssignment) {
                // Controleer of de opdracht al aan de student is gekoppeld
                $existingAssignment = StudentAssignment::where('enrolment_class_id', $enrolmentclass->id)
                    ->where('class_assignment_id', $classAssignment->id)
                    ->exists();

                if (!$existingAssignment) {
                    StudentAssignment::create([
                        'enrolment_class_id' => $enrolmentclass->id,
                        'class_assignment_id' => $classAssignment->id,
                        'duedate' => $classAssignment->duedate,
                        'assignment_status_id' => 1, // Zorg ervoor dat dit een geldige status_id is
                        'marked_by_id' => null,
                        'completed' => false,
                        'marked_at' => null,
                    ]);
                }
            }
        }

        return to_route('admin.enrolmentclasses.index')->with('status', 'Enrolment Class updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  EnrolmentClass  $enrolmentclass
     * @return View
     */
    public function delete(EnrolmentClass $enrolmentclass): View
    {
        $enrolmentclass->load([
            'enrolment.student.user',
            'studentAssignments.assignmentStatus',
            'studentAssignments.classAssignment.assignment',
            'classYear.schoolClass',  // Zorg ervoor dat de schoolClass relatie wordt geladen
            'classYear.schoolYear'    // Zorg ervoor dat de schoolYear relatie wordt geladen
        ]);

        // Filter de studentopdrachten die de status 'niet gestart' hebben
        $studentAssignmentsToDelete = $enrolmentclass->studentAssignments->filter(function($assignment) {
            return $assignment->assignmentStatus->name === 'Niet gestart';
        });

        return view('admin.enrolmentclasses.delete', [
            'enrolmentClass' => $enrolmentclass,
            'studentAssignments' => $studentAssignmentsToDelete,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  EnrolmentClass  $enrolmentclass
     * @return RedirectResponse
     */
    public function destroy(EnrolmentClass $enrolmentclass): RedirectResponse
    {
        try {
            // Verwijder opdrachten die nog niet zijn gestart
            StudentAssignment::where('enrolment_class_id', $enrolmentclass->id)
                ->where('assignment_status_id', 1) // 1 staat voor 'niet gestart'
                ->delete();

            $enrolmentclass->delete();
        } catch (\Throwable $error) {
            report($error);
            return to_route('admin.enrolmentclasses.index')->with('status-wrong', 'Enrolment Class cannot be deleted.');
        }
        return to_route('admin.enrolmentclasses.index')->with('status', "Enrolment Class deleted successfully.");
    }
}
