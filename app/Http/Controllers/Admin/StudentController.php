<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\StudentImport;
use App\Models\Cohort;
use App\Models\Crebo;
use App\Models\Enrolment;
use App\Models\EnrolmentStatus;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

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

    public function importForm()
    {
        return view('admin.students.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        Excel::import(new StudentImport, $request->file('file'));

        return redirect()->route('admin.students.confirmImport');
    }

    public function confirmImport()
    {
        $students = session('imported_students', []);
        $cohorts = Cohort::orderBy('name', 'desc')->get();
        $highestCohort = Cohort::orderBy('name', 'desc')->first();
        $enrolmentStatuses = EnrolmentStatus::all();
        $defaultStatus = EnrolmentStatus::where('name', 'definitief')->first();

        return view('admin.students.confirmImport', compact('students', 'cohorts', 'enrolmentStatuses', 'highestCohort', 'defaultStatus'));
    }

    public function storeImportedStudents(Request $request)
    {
        $students = $request->input('students');

        foreach ($students as $studentData) {
            $user = User::create([
                'name' => $studentData['name'],
                'email' => $studentData['email'],
                'password' => Hash::make('default_password'), // Gebruik een geschikt standaard wachtwoord
            ]);

            $student = Student::create([
                'user_id' => $user->id,
                'studentNr' => $studentData['nummer'],
            ]);

            $cohort = Cohort::find($studentData['cohort_id']);
            $startYear = intval(substr($cohort->name, 0, 4));
            $startDate = Carbon::create($startYear, 8, 1);

            $crebo = Crebo::firstOrCreate([
                'crebonr' => $studentData['opleiding'],
            ], [
                'name' => 'Default Name', // Vervang dit met relevante gegevens
                'description' => 'Default Description',
            ]);

            Enrolment::create([
                'student_id' => $student->id,
                'crebo_id' => $crebo->id,
                'cohort_id' => $studentData['cohort_id'],
                'date' => $startDate,
                'enrolment_status_id' => $studentData['enrolment_status_id'],
            ]);
        }

        session()->forget('imported_students');

        return redirect()->route('admin.students.index')->with('status', 'Students Imported Successfully.');
    }

    public function showResults($studentId)
    {
        $student = Student::findOrFail($studentId);

        return view('admin.students.student-results', compact('student'));
    }
}
