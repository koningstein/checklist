<?php

namespace App\Http\Controllers\Open;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuardianController extends Controller
{
    /**
     * Toon de studenten die gekoppeld zijn aan de ingelogde guardian.
     */
    public function index(Request $request)
    {
        // Haal de ingelogde gebruiker op
        $user = Auth::user();

        // Zorg ervoor dat de gebruiker een guardian is
        $guardian = $user->guardian;

        // Haal alle studenten op die aan deze guardian gekoppeld zijn
        $students = $guardian->studentGuardians()->with('student.user')->get()->map(function ($studentGuardian) {
            return $studentGuardian->student;
        });

        // Haal de geselecteerde student op, standaard de eerste in de lijst
        $selectedStudent = $students->firstWhere('id', $request->student_id) ?? $students->first();

        // Retourneer de view met de studentenlijst en de geselecteerde student
        return view('guardian.dashboard', compact('students', 'selectedStudent'));
    }
}
