<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassYear;
use App\Models\Period;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf; // Als je Dompdf gebruikt

class PDFController extends Controller
{
    public function showClassResultsForm()
    {
        $classYears = ClassYear::all();
        $periods = Period::all();

        return view('admin.class-results-form', compact('classYears', 'periods'));
    }

    public function generateClassResultsPDF(Request $request)
    {
        $request->validate([
            'class_year_id' => 'required|exists:class_years,id',
            'period_id' => 'required|exists:periods,id',
        ]);

        $classYear = ClassYear::findOrFail($request->class_year_id);
        $period = Period::findOrFail($request->period_id);

        // Haal alle studenten van deze klas op via EnrolmentClasses
        $students = Student::whereHas('enrolments.enrolmentClasses', function($query) use ($classYear) {
            $query->where('class_year_id', $classYear->id);
        })->get();

        $pdfs = [];
        foreach ($students as $student) {
            $pdf = $this->generateStudentPDF($student, $period);
            $pdfs[] = $pdf;
        }

        // Download een voorbeeld-PDF
        return $pdfs[0]->download("class_results_{$classYear->schoolClass->name}_period_{$period->period}.pdf");
    }


    protected function generateStudentPDF($student, $period)
    {
        $studentResults = $this->getStudentResultsForPeriod($student, $period);

        $pdf = PDF::loadView('pdf.student-results', compact('student', 'period', 'studentResults'));

        return $pdf;
    }

    protected function getStudentResultsForPeriod($student, $period)
    {
        return $student->enrolments()
            ->with(['enrolmentClasses.studentAssignments' => function ($query) use ($period) {
                $query->whereHas('classAssignment.assignment.module', function ($q) use ($period) {
                    $q->where('period_id', $period->id);
                })->orWhereHas('individualAssignment.module', function ($q) use ($period) {
                    $q->where('period_id', $period->id);
                });
            }])
            ->get();
    }
}
