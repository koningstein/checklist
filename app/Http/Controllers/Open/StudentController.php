<?php

namespace App\Http\Controllers\Open;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function showOwnResults()
    {
        // Haal de ingelogde student op basis van de user ID
        $student = Student::where('user_id', Auth::id())->firstOrFail();

        // Geef de resultaten van de student door aan de view
        return view('student.results', ['student' => $student]);
    }
}
