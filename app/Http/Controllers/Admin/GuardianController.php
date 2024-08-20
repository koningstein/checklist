<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardianStoreNewRequest;
use App\Http\Requests\GuardianStoreRequest;
use App\Models\Guardian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\StudentGuardian;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Haal alle guardians op, inclusief de gebruikersgegevens en studentkoppelingen
        $guardians = Guardian::with('user', 'studentGuardians.student.user')->get();

        return view('admin.guardians.index', compact('guardians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereDoesntHave('student')->get();
        $students = Student::with('user')->get();
        return view('admin.guardians.create', compact('users', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  GuardianStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(GuardianStoreRequest $request)
    {
        $guardian = Guardian::create([
            'user_id' => $request->selected_user_id,
        ]);

        StudentGuardian::create([
            'student_id' => $request->student_id,
            'guardian_id' => $guardian->id,
        ]);

        return to_route('admin.guardians.index')->with('status', 'Guardian succesvol toegewezen aan student.');
    }

    public function storeNew(GuardianStoreNewRequest $request)
    {
        $user = User::create([
            'name' => $request->new_user_name,
            'email' => $request->new_user_email,
            'password' => Hash::make($request->new_user_password),
        ]);

        $user->assignRole('guardian');

        $guardian = Guardian::create([
            'user_id' => $user->id,
        ]);

        StudentGuardian::create([
            'student_id' => $request->student_id,
            'guardian_id' => $guardian->id,
        ]);
        return to_route('admin.guardians.index')->with('status', 'Nieuwe Guardian succesvol aangemaakt en gekoppeld aan student.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Guardian $guardian)
    {
        // Toon details van een specifieke guardian
        $students = $guardian->studentGuardians()->with('student.user')->get();

        return view('admin.guardians.show', compact('guardian', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guardian $guardian)
    {
        $students = Student::with('user')->get();
        $users = User::doesntHave('guardian')->orWhere('id', $guardian->user_id)->get(); // Voeg huidige gebruiker toe aan lijst

        return view('admin.guardians.edit', compact('guardian', 'students', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuardianStoreRequest $request, Guardian $guardian)
    {
        $user = $guardian->user;

        if ($request->filled('user_id')) {
            // Bestaande gebruiker toewijzen
            $user = User::findOrFail($request->user_id);
            $guardian->update(['user_id' => $user->id]);

        } else {
            // Guardian gegevens updaten
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
            ]);
        }

        // Update student-guardian koppeling
        $guardian->studentGuardians()->updateOrCreate(
            ['student_id' => $request->student_id],
            ['guardian_id' => $guardian->id]
        );

        return to_route('admin.guardians.index')->with('status', 'Guardian succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guardian $guardian)
    {
        //
    }
}
