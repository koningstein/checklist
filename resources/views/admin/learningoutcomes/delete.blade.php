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
            <h1 class="h6">Learning Outcome Verwijderen</h1>
        </div>

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <form id="form" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4" action="{{ route('admin.learningoutcomes.destroy', ['learningoutcome' => $learningoutcome->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <p>Weet je zeker dat je deze Learning Outcome wilt verwijderen?</p>
                    <ul>
                        <li>Nummer: {{ $learningoutcome->number }}</li>
                        <li>Naam: {{ $learningoutcome->name }}</li>
                        <li>Beschrijving: {{ $learningoutcome->description }}</li>
                    </ul>
                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">Verwijderen</button>
                    <a href="{{ route('admin.learningoutcomes.index') }}" class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg active:bg-gray-600 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray">Annuleren</a>
                </form>
            </div>
        </div>
    </div>
@endsection
