<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;

class StudentController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('index student'), only: ['index']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('show student'), only: ['show']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create student'), only: ['create', 'store']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit student'), only: ['edit', 'update']),
            new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete student'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $students = Student::paginate(15);
        return view('admin.students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $users = User::all();
        return view('admin.students.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  StudentStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(StudentStoreRequest $request): RedirectResponse
    {
        $student = new Student();
        $student->user_id = $request->user_id;
        $student->studentNr = $request->studentNr;
        $student->save();

        return to_route('admin.students.index')->with('status', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  Student  $student
     * @return View
     */
    public function show(Student $student): View
    {
        return view('admin.students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Student  $student
     * @return View
     */
    public function edit(Student $student): View
    {
        $users = User::all();
        return view('admin.students.edit', ['student' => $student, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     * @param  StudentUpdateRequest  $request
     * @param  Student  $student
     * @return RedirectResponse
     */
    public function update(StudentUpdateRequest $request, Student $student): RedirectResponse
    {
        $student->user_id = $request->user_id;
        $student->studentNr = $request->studentNr;
        $student->save();

        return to_route('admin.students.index')->with('status', 'Student updated successfully.');
    }

    /**
     * Show the form for deleting the specified resource.
     * @param  Student  $student
     * @return View
     */
    public function delete(Student $student): View
    {
        return view('admin.students.delete', ['student' => $student]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Student  $student
     * @return RedirectResponse
     */
    public function destroy(Student $student): RedirectResponse
    {
        try {
            $student->delete();
        } catch (\Throwable $error) {
            report($error);
            return to_route('admin.students.index')->with('status-wrong', 'Student could not be deleted.');
        }

        return to_route('admin.students.index')->with('status', 'Student deleted successfully.');
    }
}
