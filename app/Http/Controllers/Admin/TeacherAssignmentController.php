<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassYear;

class TeacherAssignmentController extends Controller
{
    //
    public function index()
    {
        // Geef de pagina weer met de component geïntegreerd
        return view('admin.teacherassignments.index');
    }
}
