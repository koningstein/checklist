@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.learninglevels.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Leer Niveaus</a>
                            <a href="{{ route('admin.learninglevels.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Leer Niveau Toevoegen</a>
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
            <h1 class="h6">Leer Niveau Verwijderen</h1>
        </div>

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <form id="form" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4" action="{{ route('admin.learninglevels.destroy', ['learninglevel' => $learningLevel->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <p class="text-gray-700">Weet je zeker dat je het leer niveau <strong>{{ $learningLevel->name }}</strong> wilt verwijderen?</p>
                    <div class="mt-4">
                        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                            Verwijderen
                        </button>
                        <a href="{{ route('admin.learninglevels.index') }}" class="px-4 py-2 ml-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:shadow-outline-gray">
                            Annuleren
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
