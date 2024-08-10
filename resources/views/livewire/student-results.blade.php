<div>
    <h2 class="text-2xl font-semibold mb-4">Voortgang van {{ $student->user->name }}</h2>

    <!-- Periode Filter -->
    <div class="mb-4 space-y-2">
        @foreach([1, 2, 3, 4] as $year)
            <div class="flex items-center space-x-4">
                <span class="text-sm font-medium text-gray-700">Leerjaar {{ $year }}</span>
                <div class="grid grid-cols-4 gap-2 flex-1">
                    @foreach($periods->slice(($year - 1) * 4, 4) as $period)
                        <button wire:click="setPeriod({{ $period->id }})" class="px-4 py-2 rounded-md text-sm
                            @if($selectedPeriodId === $period->id) bg-gray-600 text-white @else bg-gray-200 text-gray-700 @endif">
                            {{ $period->period }}
                        </button>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <!-- Filteren op course -->
    <div class="mb-6">
        <label for="courseSearch" class="block text-sm font-medium text-gray-700">Filter op Vak:</label>
        <input type="text" id="courseSearch" wire:model.live="searchCourseName" placeholder="Typ vak naam..." class="mt-1 block w-full pl-3 pr-10 py-2 border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
    </div>

    @foreach($student->enrolments as $enrolment)
        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">Inschrijving bij {{ $enrolment->crebo->name }} - Cohort: {{ $enrolment->cohort->name }}</h3>

            @foreach($enrolment->enrolmentClasses as $enrolmentClass)
                @php
                    // Groepeer opdrachten per course en pas filters toe
                    $courses = $enrolmentClass->studentAssignments->groupBy(function($assignment) {
                        return $assignment->classAssignment
                            ? $assignment->classAssignment->assignment->module->course->name
                            : ($assignment->individualAssignment
                                ? $assignment->individualAssignment->module->course->name
                                : 'Overig');
                    })->filter(function($assignments, $courseName) {
                        // Pas course name filter toe
                        $passesCourseFilter = empty($this->searchCourseName) || stripos($courseName, $this->searchCourseName) !== false;

                        // Pas periode filter toe als een periode is geselecteerd
                        $passesPeriodFilter = empty($this->selectedPeriodId) || $assignments->contains(function($assignment) {
                            $modulePeriodId = $assignment->classAssignment
                                ? $assignment->classAssignment->assignment->module->period_id
                                : ($assignment->individualAssignment
                                    ? $assignment->individualAssignment->module->period_id
                                    : null);
                            return $modulePeriodId == $this->selectedPeriodId;
                        });

                        return $passesCourseFilter && $passesPeriodFilter;
                    });
                @endphp

                @foreach($courses as $courseName => $assignmentsPerCourse)
                    <div class="mb-4 ml-4">
                        <h4 class="text-lg font-semibold mb-1">{{ $courseName }}</h4>

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
                            @php
                                // Filter de opdrachten op basis van de geselecteerde periode
                                $filteredAssignments = $assignments->filter(function($assignment) {
                                    if (empty($this->selectedPeriodId)) {
                                        return true; // Toon alles als er geen periode is geselecteerd
                                    }

                                    $modulePeriodId = $assignment->classAssignment
                                        ? $assignment->classAssignment->assignment->module->period_id
                                        : ($assignment->individualAssignment
                                            ? $assignment->individualAssignment->module->period_id
                                            : null);

                                    return $modulePeriodId == $this->selectedPeriodId;
                                });
                            @endphp

                            @if($filteredAssignments->isNotEmpty())
                                <table class="min-w-full bg-white table-fixed mb-4">
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
                                    <tr>
                                        <td class="w-1/3 px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                            <div class="text-sm leading-5 font-semibold text-gray-900">{{ $moduleName }}</div>
                                        </td>
                                        <td class="w-2/3 px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                            <div class="flex space-x-1 overflow-x-auto">
                                                @foreach($filteredAssignments as $assignment)
                                                    <div class="flex-shrink-0 w-4 h-4
                                                            @if($assignment->assignmentStatus->name === 'Goedgekeurd') bg-green-500
                                                            @elseif($assignment->assignmentStatus->name === 'Afgewezen') bg-red-500
                                                            @elseif($assignment->assignmentStatus->name === 'Ingediend') bg-blue-500
                                                            @elseif($assignment->assignmentStatus->name === 'Niet gestart') bg-orange-500
                                                            @endif">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <p class="text-sm mt-1">{{ $filteredAssignments->where('assignmentStatus.name', 'Goedgekeurd')->count() }}/{{ $filteredAssignments->count() }} opdrachten voltooid</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            @endforeach
        </div>
    @endforeach
</div>
