@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.learningsuboutcomeassignments.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Learning Suboutcome Assignments</a>
                            <a href="{{ route('admin.learningsuboutcomeassignments.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Learning Suboutcome Assignment Toevoegen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <div class="card mt-6">
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Learning Suboutcome Assignments</h1>
        </div>

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            @if(session('status'))
                <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="min-width: 240px">
                    {{ session('status') }}
                </div>
            @endif

            @if($learningSuboutcomeAssignments->isEmpty())
                <p class="text-gray-900">Geen Learning Suboutcome Assignments gevonden.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Learning Suboutcome</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assignment</th>
                            <th class="px-6 py-3 bg-gray-50"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($learningSuboutcomeAssignments as $learningSuboutcomeAssignment)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $learningSuboutcomeAssignment->learningSuboutcome->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $learningSuboutcomeAssignment->assignment->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.learningsuboutcomeassignments.show', ['learningsuboutcomeassignment' => $learningSuboutcomeAssignment->id]) }}" class="text-indigo-600 hover:text-indigo-900">Details</a>
                                    <a href="{{ route('admin.learningsuboutcomeassignments.edit', ['learningsuboutcomeassignment' => $learningSuboutcomeAssignment->id]) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">Wijzigen</a>
                                    <a href="{{ route('admin.learningsuboutcomeassignments.delete', ['learningsuboutcomeassignment' => $learningSuboutcomeAssignment->id]) }}" class="ml-4 text-red-600 hover:text-red-900" onclick="return confirm('Weet je zeker dat je deze learning suboutcome assignment wilt verwijderen?')">Verwijderen</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $learningSuboutcomeAssignments->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
