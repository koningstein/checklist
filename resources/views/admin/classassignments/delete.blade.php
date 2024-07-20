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
            <h1 class="h6">Class Assignment Verwijderen</h1>
        </div>

        @if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="min-width: 240px">
                <ul class="mt-3 list-disc list-inside text-sm text-green-600">
                    <li>{{ session('status') }}</li>
                </ul>
            </div>
        @endif

        @if(session('status-wrong'))
            <div class="bg-red-200 text-red-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="min-width: 240px">
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    <li>{{ session('status-wrong') }}</li>
                </ul>
            </div>
        @endif

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <form id="form" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4" action="{{ route('admin.classassignments.destroy', ['classassignment' => $classAssignment->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <p class="text-gray-900">Weet je zeker dat je deze Class Assignment wilt verwijderen?</p>
                    <p class="text-gray-900"><strong>Klas:</strong> {{ $classAssignment->classYear->schoolClass->name }} - {{ $classAssignment->classYear->schoolYear->name }}</p>
                    <p class="text-gray-900"><strong>Opdracht:</strong> {{ $classAssignment->assignment->name }}</p>
                    <p class="text-gray-900"><strong>Inleverdatum:</strong> {{ $classAssignment->duedate ? $classAssignment->duedate->toDateString() : 'Geen' }}</p>

                    <h3 class="mt-4 text-lg font-semibold text-gray-900">Studenten:</h3>
                    <ul class="list-disc list-inside text-gray-900">
                        @foreach($classAssignment->studentAssignments as $studentAssignment)
                            <li>{{ $studentAssignment->enrolmentClass->enrolment->student->user->name }}</li>
                        @endforeach
                    </ul>

                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">Verwijderen</button>
                    <a href="{{ route('admin.classassignments.index') }}" class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-200 border border-transparent rounded-lg active:bg-gray-300 hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray">Annuleren</a>
                </form>
            </div>
        </div>
    </div>
@endsection
