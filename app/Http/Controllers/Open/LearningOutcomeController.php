<?php

namespace App\Http\Controllers\Open;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\LearningOutcome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LearningOutcomeController extends Controller
{
    public function index(): View
    {
        // Haal de ingelogde student op basis van de user ID
        $student = Student::where('user_id', auth()->id())->firstOrFail();

        return view('student.learningoutcome.index', compact('student'));
    }

//    public function index(): View
//    {
//        // Haal de ingelogde student op basis van de user ID
//        $studentId = Student::where('user_id', Auth::id())->firstOrFail()->id;
//
//        $sql = "SELECT lo.name as learning_outcome_name,
//               los.name as learning_suboutcome_name,
//               ll.name as learning_level_name,
//               a.name as assignment_name,
//               sa.completed,
//               sa.marked_at,
//               s.id as student_id,
//               sa.assignment_status_id, -- Voeg deze regel toe om de status op te halen
//               u.name as student_name
//        FROM learning_outcomes lo
//        JOIN learning_suboutcomes los ON los.learning_outcome_id = lo.id
//        JOIN learning_suboutcome_levels lsl ON lsl.learning_suboutcome_id = los.id
//        JOIN learning_levels ll ON ll.id = lsl.learning_level_id
//        JOIN learning_suboutcome_level_assignments lslas ON lslas.learning_suboutcome_level_id = lsl.id
//        JOIN assignments a ON a.id = lslas.assignment_id
//        JOIN student_assignments sa ON
//            (sa.individual_assignment_id = a.id OR sa.class_assignment_id IN
//                (SELECT class_assignments.id
//                 FROM class_assignments
//                 WHERE class_assignments.assignment_id = a.id))
//        JOIN enrolment_classes ec ON ec.id = sa.enrolment_class_id
//        JOIN enrolments e ON e.id = ec.enrolment_id AND e.student_id = :student_id
//        JOIN students s ON s.id = e.student_id
//        JOIN users u ON u.id = s.user_id
//        ORDER BY lo.name, los.name, ll.name";
//
//
//        // Voer de query uit en vervang :student_id door de ID van de ingelogde student
//        $learningOutcomes = DB::select($sql, ['student_id' => $studentId]);
//
//
//
//        return view('student.learningoutcome.index', compact('learningOutcomes'));
//    }
}
