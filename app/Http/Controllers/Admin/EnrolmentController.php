<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrolment;
use App\Models\Student;
use App\Models\Crebo;
use App\Models\Cohort;
use App\Models\EnrolmentStatus;
use Illuminate\Http\Request;
use App\Http\Requests\EnrolmentStoreRequest;
use App\Http\Requests\EnrolmentUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;

class EnrolmentController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index enrolment'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show enrolment'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create enrolment'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit enrolment'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete enrolment'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $enrolments = Enrolment::with('student.user', 'crebo', 'cohort', 'enrolmentStatus')->paginate(15);
        return view('admin.enrolments.index', ['enrolments' => $enrolments]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $students = Student::with('user')->get();
        $crebos = Crebo::all();
        $cohorts = Cohort::all();
        $statuses = EnrolmentStatus::all();
        return view('admin.enrolments.create', [
            'students' => $students,
            'crebos' => $crebos,
            'cohorts' => $cohorts,
            'statuses' => $statuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  EnrolmentStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(EnrolmentStoreRequest $request): RedirectResponse
    {
        $enrolment = new Enrolment();
        $enrolment->student_id = $request->student_id;
        $enrolment->crebo_id = $request->crebo_id;
        $enrolment->cohort_id = $request->cohort_id;
        $enrolment->date = $request->date;
        $enrolment->enrolment_status_id = $request->enrolment_status_id;
        $enrolment->save();

        return to_route('admin.enrolments.index')->with('status', 'Enrolment created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  Enrolment  $enrolment
     * @return View
     */
    public function show(Enrolment $enrolment): View
    {
        $enrolment->load('enrolmentClasses');
        return view('admin.enrolments.show', ['enrolment' => $enrolment]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Enrolment  $enrolment
     * @return View
     */
    public function edit(Enrolment $enrolment): View
    {
        $students = Student::with('user')->get();
        $crebos = Crebo::all();
        $cohorts = Cohort::all();
        $statuses = EnrolmentStatus::all();
        return view('admin.enrolments.edit', [
            'enrolment' => $enrolment,
            'students' => $students,
            'crebos' => $crebos,
            'cohorts' => $cohorts,
            'statuses' => $statuses
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  EnrolmentUpdateRequest  $request
     * @param  Enrolment  $enrolment
     * @return RedirectResponse
     */
    public function update(EnrolmentUpdateRequest $request, Enrolment $enrolment): RedirectResponse
    {
        $enrolment->student_id = $request->student_id;
        $enrolment->crebo_id = $request->crebo_id;
        $enrolment->cohort_id = $request->cohort_id;
        $enrolment->date = $request->date;
        $enrolment->enrolment_status_id = $request->enrolment_status_id;
        $enrolment->save();

        return to_route('admin.enrolments.index')->with('status', 'Enrolment updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  Enrolment  $enrolment
     * @return View
     */
    public function delete(Enrolment $enrolment): View
    {
        return view('admin.enrolments.delete', ['enrolment' => $enrolment]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Enrolment  $enrolment
     * @return RedirectResponse
     */
    public function destroy(Enrolment $enrolment): RedirectResponse
    {
        try {
            $enrolment->delete();
        } catch (\Throwable $error) {
            report($error);
            return to_route('admin.enrolments.index')->with('status-wrong', 'Enrolment cannot be deleted.');
        }
        return to_route('admin.enrolments.index')->with('status', "Enrolment deleted successfully.");
    }
}
