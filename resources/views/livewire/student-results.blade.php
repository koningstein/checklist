<div>
    <h2 class="text-2xl font-semibold mb-4">Resultaten van {{ $student->user->name }}</h2>

    @foreach($student->enrolments as $enrolment)
        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">Inschrijving bij {{ $enrolment->crebo->name }} - Cohort: {{ $enrolment->cohort->name }}</h3>

            @foreach($enrolment->enrolmentClasses as $enrolmentClass)
                @php
                    // Groepeer opdrachten per course
                    $courses = $enrolmentClass->studentAssignments->groupBy(function($assignment) {
                        return $assignment->classAssignment
                            ? $assignment->classAssignment->assignment->module->course->name
                            : ($assignment->individualAssignment
                                ? $assignment->individualAssignment->module->course->name
                                : 'Overig');
                    });
                @endphp

                @foreach($courses as $courseName => $assignmentsPerCourse)
                    <div class="mb-4 ml-4">
                        <h4 class="text-lg font-semibold mb-1">{{ $courseName }}</h4>

                        <table class="min-w-full bg-white table-fixed">
                            <thead>
                            <tr>
                                <th class="w-1/3 px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Module
                                </th>
                                <th class="w-2/3 px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Voortgang
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                // Groepeer opdrachten per module
                                $modules = $assignmentsPerCourse->groupBy(function($assignment) {
                                    return $assignment->classAssignment
                                        ? $assignment->classAssignment->assignment->module->name
                                        : ($assignment->individualAssignment
                                            ? $assignment->individualAssignment->module->name
                                            : 'Overig');
                                });
                            @endphp

                            @foreach($modules as $moduleName => $assignments)
                                <tr>
                                    <td class="w-1/3 px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                        <div class="text-sm leading-5 font-semibold text-gray-900">{{ $moduleName }}</div>
                                    </td>
                                    <td class="w-2/3 px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                        <div class="flex space-x-1 overflow-x-auto">
                                            @foreach($assignments as $assignment)
                                                <div class="flex-shrink-0 w-4 h-4
                                                        @if($assignment->assignmentStatus->name === 'Goedgekeurd') bg-green-500
                                                        @elseif($assignment->assignmentStatus->name === 'Afgewezen') bg-red-500
                                                        @elseif($assignment->assignmentStatus->name === 'Ingediend') bg-blue-500
                                                        @elseif($assignment->assignmentStatus->name === 'Niet gestart') bg-orange-500
                                                        @endif">
                                                </div>
                                            @endforeach
                                        </div>
                                        <p class="text-sm mt-1">{{ $assignments->where('assignmentStatus.name', 'Goedgekeurd')->count() }}/{{ $assignments->count() }} opdrachten voltooid</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            @endforeach
        </div>
    @endforeach
</div>
