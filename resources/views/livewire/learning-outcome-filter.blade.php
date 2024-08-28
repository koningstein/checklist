<div>
    <h2 class="text-2xl font-semibold mb-4">Voortgang van {{ $student->user->name }}</h2>

    <!-- Periode Filter per leerjaar -->
    <div class="mb-4 space-y-2">
        @foreach([1, 2, 3, 4] as $year)
            <div class="flex items-center space-x-4">
                <span class="text-sm font-medium text-gray-700">Leerjaar {{ $year }}</span>
                <div class="grid grid-cols-4 gap-2 flex-1">
                    @foreach($periods->slice(($year - 1) * 4, 4) as $period)
                        <button wire:click="setPeriod({{ $period->id }})" class="px-4 py-2 rounded-md text-sm
                            @if($selectedPeriodId === $period->id) bg-gray-600 text-white
                            @else bg-gray-200 text-gray-700 @endif">
                            {{ $period->period }}
                        </button>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <!-- Module Filter per rij -->
    @if (!empty($modules))
        <div class="mb-4 space-y-2">
            <label class="block text-sm font-medium text-gray-700">Kies een Module:</label>
            @foreach($modules->chunk(4) as $moduleChunk)
                <div class="grid grid-cols-4 gap-2">
                    @foreach($moduleChunk as $module)
                        <button wire:click="setModule({{ $module->id }})" class="px-4 py-2 rounded-md text-sm
                            @if($selectedModuleId === $module->id) bg-gray-600 text-white
                            @else bg-gray-200 text-gray-700 @endif">
                            {{ $module->name }}
                        </button>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endif

    <!-- Learning Outcomes Weergave -->
    @if (!empty($learningOutcomes))
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-xl font-semibold mb-4">Learning Outcomes</h3>
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr class="w-full bg-gray-100 border-b">
                    <th class="text-left py-2 px-4">Learning Outcome</th>
                    <th class="text-left py-2 px-4">Suboutcome</th>
                    <th class="text-left py-2 px-4">Level</th>
                    <th class="text-left py-2 px-4">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($learningOutcomes as $outcome)
                    @php
                        $statusClass = '';
                        switch ($outcome->assignment_status_id) {
                            case 1:
                                $statusClass = 'bg-orange-200';
                                break;
                            case 2:
                                $statusClass = 'bg-blue-200';
                                break;
                            case 3:
                                $statusClass = 'bg-green-200';
                                break;
                            case 4:
                                $statusClass = 'bg-red-200';
                                break;
                        }
                    @endphp
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $outcome->learning_outcome_name }}</td>
                        <td class="py-2 px-4">{{ $outcome->learning_suboutcome_name }}</td>
                        <td class="py-2 px-4">{{ $outcome->learning_level_name }}</td>
                        <td class="py-2 px-4 {{ $statusClass }}">
                            @switch($outcome->assignment_status_id)
                                @case(1)
                                    Niet gestart
                                    @break
                                @case(2)
                                    Ingediend
                                    @break
                                @case(3)
                                    Goedgekeurd
                                    @break
                                @case(4)
                                    Afgewezen
                                    @break
                            @endswitch
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
