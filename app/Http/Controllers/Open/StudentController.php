<?php

namespace App\Http\Controllers\Open;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showOwnResults()
    {
        // Haal de ingelogde student op basis van de user ID
        $student = Student::where('user_id', Auth::id())->firstOrFail();

        // Geef de resultaten van de student door aan de view
        return view('student.results', compact('student'));
    }

    public function showModuleDetails($moduleId)
    {
        $studentId = Student::where('user_id', Auth::id())->firstOrFail()->id;
        $student = Student::findOrFail($studentId);
        // Haal de module-informatie op
        $module = Module::findOrFail($moduleId);

        // SQL-query om de opdrachten voor een specifieke module en student op te halen
        $sql = "SELECT assignments.*,
                   student_assignments.duedate,
                   student_assignments.completed,
                   assignment_statuses.name as status
            FROM assignments
            JOIN student_assignments ON
                (student_assignments.class_assignment_id IS NOT NULL AND student_assignments.class_assignment_id IN (
                    SELECT class_assignments.id
                    FROM class_assignments
                    WHERE class_assignments.assignment_id = assignments.id
                ))
                OR (student_assignments.individual_assignment_id = assignments.id)
            JOIN assignment_statuses ON student_assignments.assignment_status_id = assignment_statuses.id
            WHERE assignments.module_id = :module_id
            AND student_assignments.enrolment_class_id IN (
                SELECT enrolment_classes.id
                FROM enrolment_classes
                JOIN enrolments ON enrolments.id = enrolment_classes.enrolment_id
                WHERE enrolments.student_id = :student_id
            )";

        $assignments = DB::select($sql, [
            'module_id' => $moduleId,
            'student_id' => $studentId,
        ]);

        return view('student.module-details', compact('module', 'assignments', 'student'));
    }

}
