@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.classassignments.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Class Assignments</a>
                            <a href="{{ route('admin.classassignments.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Class Assignment Toevoegen</a>
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
            <h1 class="h6">Class Assignment Details</h1>
        </div>
        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <h2 class="text-lg font-semibold">Class: {{ $classAssignment->classYear->schoolClass->name }} - {{ $classAssignment->classYear->schoolYear->name }}</h2>
                <h3 class="text-md font-semibold">Opdracht: {{ $classAssignment->assignment->name }}</h3>
{{--                <p class="text-sm">Inleverdatum: {{ optional($classAssignment->duedate) }}</p>--}}

                <h3 class="text-md font-semibold mt-4">Studenten in de klas:</h3>
                <ul class="list-disc list-inside">
                    @foreach($enrolmentClasses as $enrolmentClass)
                        <li>{{ $enrolmentClass->enrolment->student->user->name }}</li>
                    @endforeach
                </ul>

                <h3 class="text-md font-semibold mt-4">Student Assignments:</h3>
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                        <th class="px-4 py-3">Student</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Inleverdatum</th>
                        <th class="px-4 py-3">Beoordeeld door</th>
                        <th class="px-4 py-3">Beoordeeld op</th>
                        <th class="px-4 py-3">Voltooid</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($studentAssignments as $studentAssignment)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{ $studentAssignment->enrolmentClass->enrolment->student->user->name }}</td>
                            <td class="px-4 py-3 text-sm">{{ $studentAssignment->assignmentStatus->name }}</td>
                            <td class="px-4 py-3 text-sm">{{ $studentAssignment->duedate }}</td>
                            <td class="px-4 py-3 text-sm">{{ optional($studentAssignment->markedBy)->name }}</td>
                            <td class="px-4 py-3 text-sm">{{ optional($studentAssignment->marked_at)->format('d-m-Y') }}</td>
                            <td class="px-4 py-3 text-sm">{{ $studentAssignment->completed ? 'Ja' : 'Nee' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
