@extends('layouts.layoutpublic')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Learning Outcome Overzicht</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg">
            <div class="p-6">
                @livewire('learning-outcome-filter', ['studentId' => $student->id])
            </div>
        </div>
    </div>
@endsection

{{--@section('content')--}}
{{--    <div class="container mx-auto px-4 py-8">--}}
{{--        <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg">--}}
{{--            <div class="bg-teal-500 text-gray-700 text-xl font-semibold p-4 rounded-t-lg">--}}
{{--                <h1 class="text-2xl font-semibold mb-4">Learning Outcome Overzicht</h1>--}}
{{--            </div>--}}

{{--            <div class="p-6">--}}
{{--                <table class="min-w-full bg-white border border-gray-300">--}}
{{--                    <thead>--}}
{{--                    <tr class="w-full bg-gray-100 border-b">--}}
{{--                        <th class="text-left py-2 px-4">Learning Outcome</th>--}}
{{--                        <th class="text-left py-2 px-4">Suboutcome</th>--}}
{{--                        <th class="text-left py-2 px-4">Level</th>--}}
{{--                        <th class="text-left py-2 px-4">Status</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @php--}}
{{--                        $uniqueLevels = []; // Array om unieke suboutcome levels bij te houden--}}
{{--                    @endphp--}}
{{--                    @foreach ($learningOutcomes as $outcome)--}}
{{--                        @php--}}
{{--                            // Genereer de unieke sleutel voor suboutcome level--}}
{{--                            $levelKey = $outcome->learning_suboutcome_name . '_' . $outcome->learning_level_name;--}}

{{--                            // Controleer of we al een status hebben voor deze suboutcome level--}}
{{--                            if (!isset($uniqueLevels[$levelKey])) {--}}
{{--                                $uniqueLevels[$levelKey] = [--}}
{{--                                    'learning_outcome_name' => $outcome->learning_outcome_name,--}}
{{--                                    'learning_suboutcome_name' => $outcome->learning_suboutcome_name,--}}
{{--                                    'learning_level_name' => $outcome->learning_level_name,--}}
{{--                                    'assignment_status_id' => $outcome->assignment_status_id,--}}
{{--                                ];--}}
{{--                            } else {--}}
{{--                                // Update de status op basis van prioriteit: Goedgekeurd > Ingediend > Afgewezen > Niet gestart--}}
{{--                                if ($outcome->assignment_status_id == 3) {--}}
{{--                                    $uniqueLevels[$levelKey]['assignment_status_id'] = 3; // Goedgekeurd heeft hoogste prioriteit--}}
{{--                                } elseif ($outcome->assignment_status_id == 2 && $uniqueLevels[$levelKey]['assignment_status_id'] != 3) {--}}
{{--                                    $uniqueLevels[$levelKey]['assignment_status_id'] = 2; // Ingediend heeft tweede prioriteit--}}
{{--                                } elseif ($outcome->assignment_status_id == 4 && $uniqueLevels[$levelKey]['assignment_status_id'] != 3 && $uniqueLevels[$levelKey]['assignment_status_id'] != 2) {--}}
{{--                                    $uniqueLevels[$levelKey]['assignment_status_id'] = 4; // Afgewezen heeft derde prioriteit--}}
{{--                                }--}}
{{--                                // Als geen van bovenstaande, blijft het 'Niet gestart' (1)--}}
{{--                            }--}}
{{--                        @endphp--}}
{{--                    @endforeach--}}

{{--                    @foreach ($uniqueLevels as $level)--}}
{{--                        @php--}}
{{--                            // Bepaal de status kleur op basis van assignment_status_id--}}
{{--                            $statusClass = '';--}}
{{--                            switch ($level['assignment_status_id']) {--}}
{{--                                case 1:--}}
{{--                                    $statusClass = 'bg-orange-200';--}}
{{--                                    break;--}}
{{--                                case 2:--}}
{{--                                    $statusClass = 'bg-blue-200';--}}
{{--                                    break;--}}
{{--                                case 3:--}}
{{--                                    $statusClass = 'bg-green-200';--}}
{{--                                    break;--}}
{{--                                case 4:--}}
{{--                                    $statusClass = 'bg-red-200';--}}
{{--                                    break;--}}
{{--                            }--}}
{{--                        @endphp--}}
{{--                        <tr class="border-b">--}}
{{--                            <td class="py-2 px-4">{{ $level['learning_outcome_name'] }}</td>--}}
{{--                            <td class="py-2 px-4">{{ $level['learning_suboutcome_name'] }}</td>--}}
{{--                            <td class="py-2 px-4">{{ $level['learning_level_name'] }}</td>--}}
{{--                            <td class="py-2 px-4 {{ $statusClass }}">--}}
{{--                                @switch($level['assignment_status_id'])--}}
{{--                                    @case(1)--}}
{{--                                        Niet gestart--}}
{{--                                        @break--}}
{{--                                    @case(2)--}}
{{--                                        Ingediend--}}
{{--                                        @break--}}
{{--                                    @case(3)--}}
{{--                                        Goedgekeurd--}}
{{--                                        @break--}}
{{--                                    @case(4)--}}
{{--                                        Afgewezen--}}
{{--                                        @break--}}
{{--                                @endswitch--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}

{{--                    @if (empty($uniqueLevels))--}}
{{--                        <tr>--}}
{{--                            <td colspan="4" class="py-4 px-4 text-center">Geen resultaten gevonden voor deze student.</td>--}}
{{--                        </tr>--}}
{{--                    @endif--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
