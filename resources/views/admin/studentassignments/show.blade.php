@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.studentassignments.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Student Assignments</a>
                            <a href="{{ route('admin.studentassignments.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Student Assignment Toevoegen</a>
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
            <h1 class="h6">Student Assignment Details</h1>
        </div>

        <div class="card-body">
            <div class="mb-4">
                <h2 class="font-semibold text-xl">Student</h2>
                <p class="text-gray-900">{{ $studentAssignment->enrolmentClass->enrolment->student->user->name }}</p>
            </div>
            <div class="mb-4">
                <h2 class="font-semibold text-xl">Klas</h2>
                <p class="text-gray-900">{{ $studentAssignment->enrolmentClass->classYear->schoolClass->name }}</p>
            </div>
            <div class="mb-4">
                <h2 class="font-semibold text-xl">Opdracht</h2>
                <p class="text-gray-900">{{ $studentAssignment->individualAssignment ? $studentAssignment->individualAssignment->name : $studentAssignment->classAssignment->assignment->name }}</p>
            </div>
            <div class="mb-4">
                <h2 class="font-semibold text-xl">Inleverdatum</h2>
                <p class="text-gray-900">{{ $studentAssignment->duedate ? $studentAssignment->duedate : 'Geen datum' }}</p>
            </div>
            <div class="mb-4">
                <h2 class="font-semibold text-xl">Status</h2>
                <p class="text-gray-900">{{ $studentAssignment->assignmentStatus->name }}</p>
            </div>
            <div class="mb-4">
                <h2 class="font-semibold text-xl">Beoordeeld door</h2>
                <p class="text-gray-900">{{ $studentAssignment->markedBy ? $studentAssignment->markedBy->name : 'Nog niet beoordeeld' }}</p>
            </div>
            <div class="mb-4">
                <h2 class="font-semibold text-xl">Beoordelingsdatum</h2>
                <p class="text-gray-900">{{ $studentAssignment->marked_at ? $studentAssignment->marked_at->format('d-m-Y H:i') : 'Nog niet beoordeeld' }}</p>
            </div>
        </div>
    </div>
@endsection
