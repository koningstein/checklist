<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Results PDF</title>
    <style>
        body { font-family: sans-serif; }
        .student-info { margin-bottom: 20px; }
        .results-table, .module-table, .legend-table { width: 100%; border-collapse: collapse; }
        .results-table th, .results-table td, .module-table th, .module-table td, .legend-table th, .legend-table td { border: 1px solid #ddd; padding: 8px; }
        .results-table th, .module-table th, .legend-table th { background-color: #f2f2f2; }
        .module-table td { text-align: left; } /* Linkslijn de module namen */
        .legend-table td { text-align: left; }
        .page-break { page-break-before: always; }
        .bg-red { background-color: #f87171; }       /* Rood: 0-40% */
        .bg-orange { background-color: #fb923c; }    /* Oranje: 40-55% */
        .bg-yellow { background-color: #facc15; }    /* Geel: 55-75% */
        .bg-light-green { background-color: #a3e635; } /* Lichtgroen: 75-99% */
        .bg-green { background-color: #16a34a; }     /* Donkergroen: 100% */
        .assignment-green { background-color: #38a169; }  /* Opdracht groen */
        .assignment-red { background-color: #e53e3e; }    /* Opdracht rood */
        .assignment-blue { background-color: #4299e1; }   /* Opdracht blauw */
        .assignment-orange { background-color: #ed8936; } /* Opdracht oranje */
    </style>
</head>
<body>
<div class="header">
    <img src="{{ public_path('img/Logo_Techniekcollege_RGB_150_dpi.png') }}" alt="Techniek College Rotterdam" style="width: 150px;" >
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

<!-- Module Overzicht -->
<h2>Module Overzicht</h2>
<table class="module-table">
    <thead>
    <tr>
        <th>Module</th>
        <th>Percentage Goedgekeurd</th>
    </tr>
    </thead>
    <tbody>
    @foreach($studentResults as $enrolment)
        @foreach($enrolment->enrolmentClasses as $enrolmentClass)
            @foreach($enrolmentClass->studentAssignments->groupBy(function($assignment) {
                return $assignment->classAssignment->assignment->module->name ?? $assignment->individualAssignment->module->name;
            }) as $moduleName => $assignments)
                @php
                    $totalAssignments = $assignments->count();
                    $approvedAssignments = $assignments->where('assignmentStatus.name', 'Goedgekeurd')->count();
                    $percentageApproved = ($totalAssignments > 0) ? ($approvedAssignments / $totalAssignments) * 100 : 0;

                    // Bepaal de kleur op basis van het percentage
                    if ($percentageApproved <= 40) {
                        $colorClass = 'bg-red';
                    } elseif ($percentageApproved <= 55) {
                        $colorClass = 'bg-orange';
                    } elseif ($percentageApproved <= 75) {
                        $colorClass = 'bg-yellow';
                    } elseif ($percentageApproved < 100) {
                        $colorClass = 'bg-light-green';
                    } else {
                        $colorClass = 'bg-green';
                    }
                @endphp
                <tr>
                    <td>{{ $moduleName }}</td>
                    <td class="{{ $colorClass }}">{{ number_format($percentageApproved, 2) }}%</td>
                </tr>
            @endforeach
        @endforeach
    @endforeach
    </tbody>
</table>

<!-- Legenda -->
<h3>Kleuren Legenda:</h3>
<table class="legend-table">
    <tbody>
    <tr>
        <td class="bg-red"></td>
        <td>0-40% Goedgekeurd</td>
    </tr>
    <tr>
        <td class="bg-orange"></td>
        <td>40-55% Goedgekeurd</td>
    </tr>
    <tr>
        <td class="bg-yellow"></td>
        <td>55-75% Goedgekeurd</td>
    </tr>
    <tr>
        <td class="bg-light-green"></td>
        <td>75-99% Goedgekeurd</td>
    </tr>
    <tr>
        <td class="bg-green"></td>
        <td>100% Goedgekeurd</td>
    </tr>
    </tbody>
</table>

<!-- Resultaten Tabel op een nieuwe pagina -->
<div class="page-break"></div>

<h2>Details per Module</h2>
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
                @php
                    // Kleurcode op basis van de status van de opdracht
                    $statusColorClass = '';
                    switch($assignment->assignmentStatus->name) {
                        case 'Goedgekeurd':
                            $statusColorClass = 'assignment-green';
                            break;
                        case 'Afgewezen':
                            $statusColorClass = 'assignment-red';
                            break;
                        case 'Ingediend':
                            $statusColorClass = 'assignment-blue';
                            break;
                        case 'Niet gestart':
                            $statusColorClass = 'assignment-orange';
                            break;
                    }
                @endphp
                <tr>
                    <td>{{ $assignment->classAssignment->assignment->module->name ?? $assignment->individualAssignment->module->name }}</td>
                    <td>{{ $assignment->classAssignment->assignment->name ?? $assignment->individualAssignment->name }}</td>
                    <td class="{{ $statusColorClass }}">{{ $assignment->assignmentStatus->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($assignment->duedate)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        @endforeach
    @endforeach
    </tbody>
</table>
</body>
</html>
