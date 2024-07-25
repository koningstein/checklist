@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.learningoutcomes.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Learning Outcomes</a>
                            <a href="{{ route('admin.learningoutcomes.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Learning Outcome Toevoegen</a>
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
            <h1 class="h6">Learning Outcome Details</h1>
            <a href="{{ route('admin.learningoutcomes.edit', $learningOutcome->id) }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Wijzigen</a>
        </div>

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <div class="mb-4">
                    <h2 class="font-semibold text-lg">Nummer</h2>
                    <p class="text-gray-700">{{ $learningOutcome->number }}</p>
                </div>
                <div class="mb-4">
                    <h2 class="font-semibold text-lg">Naam</h2>
                    <p class="text-gray-700">{{ $learningOutcome->name }}</p>
                </div>
                <div class="mb-4">
                    <h2 class="font-semibold text-lg">Beschrijving</h2>
                    <p class="text-gray-700">{{ $learningOutcome->description }}</p>
                </div>
                <div class="mb-4">
                    <h2 class="font-semibold text-lg">Subleerdoelen</h2>
                    @if($learningOutcome->learningSuboutcomes->isEmpty())
                        <p class="text-gray-700">Geen subleerdoelen toegevoegd.</p>
                    @else
                        <ul class="list-disc list-inside text-gray-700">
                            @foreach($learningOutcome->learningSuboutcomes as $suboutcome)
                                <li>{{ $suboutcome->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
