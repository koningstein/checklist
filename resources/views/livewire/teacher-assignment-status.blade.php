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

        <!-- Studenten Tabel -->
        @if (!empty($students) && $students->count() > 0)
            <div>
                <h3>Studenten en Opdracht Status</h3>
                <table class="table-auto w-full mb-3">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">Naam</th>
                        <th class="px-4 py-2">Acties</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td class="border px-4 py-2">{{ $student->user->name }}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="updateStatus({{ $student->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded flex items-center justify-center text-xs">
                                    Update Status
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>Geen studenten gevonden voor de geselecteerde opdracht.</p>
        @endif

    </div>
</div>

