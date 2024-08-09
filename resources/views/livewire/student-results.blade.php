<div>
    <h2 class="text-2xl font-semibold mb-4">Resultaten van {{ $student->user->name }}</h2>

    @foreach($student->enrolments as $enrolment)
        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">Inschrijving bij {{ $enrolment->crebo->name }} - Cohort: {{ $enrolment->cohort->name }}</h3>

            @foreach($enrolment->enrolmentClasses as $enrolmentClass)
                <div class="mb-4 ml-4">
                    <h4 class="text-lg font-semibold mb-1">Klas: {{ $enrolmentClass->classYear->schoolClass->name }}</h4>

                    @foreach($enrolmentClass->studentAssignments as $studentAssignment)
                        <div class="p-2 border rounded mb-2
                            @if($studentAssignment->assignmentStatus->name === 'Goedgekeurd') bg-green-100
                            @elseif($studentAssignment->assignmentStatus->name === 'Afgewezen') bg-red-100
                            @elseif($studentAssignment->assignmentStatus->name === 'Ingediend') bg-blue-100
                            @elseif($studentAssignment->assignmentStatus->name === 'Niet gestart') bg-orange-100
                            @endif">

                             Toon de opdrachtnaam afhankelijk van of het een classAssignment of individualAssignment is
                            @if($studentAssignment->classAssignment && $studentAssignment->classAssignment->assignment)
                                <p><strong>Opdracht:</strong> {{ $studentAssignment->classAssignment->assignment->name }}</p>
                            @elseif($studentAssignment->individualAssignment)
                                <p><strong>Opdracht:</strong> {{ $studentAssignment->individualAssignment->name }}</p>
                            @else
                                <p><strong>Opdracht:</strong> Geen opdracht gekoppeld</p>
                            @endif

                            <p><strong>Status:</strong> {{ $studentAssignment->assignmentStatus->name }}</p>
                            <p><strong>Deadline:</strong> {{ $studentAssignment->duedate }}</p>

                            @if($studentAssignment->marked_by_id)
                                <p><strong>Beoordeeld door:</strong> {{ $studentAssignment->markedBy->name }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endforeach
</div>
