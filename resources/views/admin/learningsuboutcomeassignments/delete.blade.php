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
            <h1 class="h6">Learning Suboutcome Assignment Verwijderen</h1>
        </div>

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <p class="text-gray-900">Weet je zeker dat je de volgende Learning Suboutcome Assignment wilt verwijderen?</p>
                <ul class="list-disc list-inside text-gray-900">
                    <li>Learning Suboutcome: {{ $learningSuboutcomeAssignment->learningSuboutcome->name }}</li>
                    <li>Assignment: {{ $learningSuboutcomeAssignment->assignment->name }}</li>
                </ul>
                <form id="form" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4" action="{{ route('admin.learningsuboutcomeassignments.destroy', ['learningsuboutcomeassignment' => $learningSuboutcomeAssignment->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">Verwijderen</button>
                    <a href="{{ route('admin.learningsuboutcomeassignments.index') }}" class="ml-4 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-200 border border-transparent rounded-lg active:bg-gray-200 hover:bg-gray-300 focus:outline-none focus:shadow-outline-gray">Annuleren</a>
                </form>
            </div>
        </div>
    </div>
@endsection
