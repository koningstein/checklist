@extends('layouts.layoutpublic')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg">
            <div class="bg-teal-500 text-gray-700 text-xl font-semibold p-4 rounded-t-lg">
                <h2 class="text-2xl font-semibold mb-4">Voortgang van {{ $student->user->name }}</h2>
            </div>
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-4">Opdrachten voor {{ $module->name }}</h2>

                @if(empty($assignments))
                    <p class="text-gray-700">Er zijn geen opdrachten voor deze module.</p>
                @else
                    <table class="min-w-full bg-white table-fixed mb-4">
                        <thead>
                        <tr>
                            <th class="w-1/3 px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Opdracht
                            </th>
                            <th class="w-1/3 px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="w-1/3 px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Deadline
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assignments as $assignment)
                            <tr>
                                <td class="w-1/3 px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                    <div class="text-sm leading-5 font-semibold text-gray-900">
                                        {{ $assignment->name }}
                                    </div>
                                </td>
                                <td class="w-1/3 px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 mr-2 rounded-full
                                            @if($assignment->status === 'Goedgekeurd') bg-green-500
                                            @elseif($assignment->status === 'Afgewezen') bg-red-500
                                            @elseif($assignment->status === 'Ingediend') bg-blue-500
                                            @elseif($assignment->status === 'Niet gestart') bg-orange-500
                                            @endif">
                                        </div>
                                        <span class="text-sm leading-5 text-gray-900">{{ $assignment->status }}</span>
                                    </div>
                                </td>
                                <td class="w-1/3 px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ \Carbon\Carbon::parse($assignment->duedate)->format('d-m-Y H:i') }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
