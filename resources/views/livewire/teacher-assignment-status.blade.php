<div>
    <div class="p-4 space-y-4">
        <!-- Klassen Dropdown -->
        <div>
            <label for="classYearId">Klas:</label>
            <select wire:model.live="classYearId" id="classYearId" class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200">
                <option value="">Selecteer een klas</option>
                @foreach($classYears as $classYear)
                    <option value="{{ $classYear->id }}">{{ $classYear->schoolClass->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Vakken Dropdown -->
        @if(!empty($courses))
            <div>
                <label for="courseId">Vak:</label>
                <select wire:model.live="courseId" id="courseId" class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200">
                    <option value="">Selecteer een vak</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <!-- Modules Dropdown -->
        @if(!empty($modules))
            <div>
                <label for="moduleId">Module:</label>
                <select wire:model.live="moduleId" id="moduleId" class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200">
                    <option value="">Selecteer een module</option>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <!-- Opdrachten Dropdown -->
        @if(!empty($assignments))
            <div>
                <label for="assignmentId">Opdracht:</label>
                <select wire:model.live="assignmentId" id="assignmentId" class="form-control mb-3 w-full px-3 py-2 border rounded-md bg-gray-200">
                    <option value="">Selecteer een opdracht</option>
                    @foreach($assignments as $assignment)
                        <option value="{{ $assignment->id }}">{{ $assignment->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <!-- Gekozen Opdracht Naam -->
        @if($assignmentId)
            <div class="my-4">
                <h3 class="text-lg font-semibold">
                    Resultaten van opdracht - {{ $assignments->where('id', $assignmentId)->first()->name }}
                </h3>
            </div>
        @endif

        <!-- Studenten Tabel -->
        @if(!empty($students))
            <div>
                <h3>Studenten en Opdracht Status</h3>
                <table class="table-auto w-full mb-3">
                    <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Wijzig Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        @foreach($student->enrolments as $enrolment)
                            @foreach($enrolment->enrolmentClasses as $enrolmentClass)
                                @foreach($enrolmentClass->studentAssignments as $assignment)
                                    <tr class="
                                        @if($assignment->assignmentStatus->name === 'Goedgekeurd') bg-green-200
                                        @elseif($assignment->assignmentStatus->name === 'Afgewezen') bg-red-200
                                        @elseif($assignment->assignmentStatus->name === 'Ingediend') bg-blue-200
                                        @elseif($assignment->assignmentStatus->name === 'Niet gestart') bg-orange-200
                                        @endif
                                    ">
                                        <td class="border px-4 py-2">{{ $student->user->name }}</td>
                                        <td class="border px-4 py-2">
                                            <select wire:change="updateStatus({{ $assignment->id }}, $event.target.value)" class="form-control">
                                                @foreach($statusOptions as $status)
                                                    <option value="{{ $status->id }}" {{ $assignment->assignment_status_id == $status->id ? 'selected' : '' }}>
                                                        {{ $status->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>
</div>

