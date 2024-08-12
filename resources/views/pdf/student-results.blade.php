<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Results PDF</title>
    <style>
        body { font-family: sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .header img { max-width: 150px; }
        .student-info { margin-bottom: 20px; }
        .results-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .results-table th, .results-table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .results-table th { background-color: #f2f2f2; }
        .status-approved { background-color: #28a745; color: white; } /* Groen */
        .status-rejected { background-color: #dc3545; color: white; } /* Rood */
        .status-submitted { background-color: #007bff; color: white; } /* Blauw */
        .status-not-started { background-color: #fd7e14; color: white; } /* Oranje */
    </style>
</head>
<body>
<div class="header">
    <img src="{{ public_path('img/Logo_Techniekcollege_RGB_150_dpi.png') }}" alt="Techniek College Rotterdam">
</div>
<h1>Resultaten van {{ $student->user->name }}</h1>

{{-- Probeer de klas op te halen via de eerste enrolment en enrolmentClasses --}}
@php
    $firstClassYear = optional(optional($student->enrolments->first())->enrolmentClasses->first())->classYear;
@endphp

@if($firstClassYear)
    <p>Klas: {{ $firstClassYear->schoolClass->name }}</p>
@else
    <p>Klas: Niet beschikbaar</p>
@endif

<p>Periode: {{ $period->period }}</p>

<table class="results-table">
    <thead>
    <tr>
        <th>Module</th>
        <th>Opdracht</th>
        <th>Status</th>
        <th>Deadline</th>
    </tr>
    </thead>
    <tbody>
    @foreach($studentResults as $enrolment)
        @foreach($enrolment->enrolmentClasses as $enrolmentClass)
            @foreach($enrolmentClass->studentAssignments as $assignment)
                <tr>
                    <td>{{ $assignment->classAssignment->assignment->module->name ?? $assignment->individualAssignment->module->name }}</td>
                    <td>{{ $assignment->classAssignment->assignment->name ?? $assignment->individualAssignment->name }}</td>
                    <td class="
                        @if($assignment->assignmentStatus->name === 'Goedgekeurd') status-approved
                        @elseif($assignment->assignmentStatus->name === 'Afgewezen') status-rejected
                        @elseif($assignment->assignmentStatus->name === 'Ingediend') status-submitted
                        @elseif($assignment->assignmentStatus->name === 'Niet gestart') status-not-started
                        @endif">
                        {{ $assignment->assignmentStatus->name }}
                    </td>
                    <td>{{ $assignment->duedate ? \Carbon\Carbon::parse($assignment->duedate)->format('d-m-Y') : 'Geen deadline' }}</td>
                </tr>
            @endforeach
        @endforeach
    @endforeach
    </tbody>
</table>
</body>
</html>
