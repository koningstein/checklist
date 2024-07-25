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
            <h1 class="h6">Leer Niveau Details</h1>
            <div class="flex">
                <a href="{{ route('admin.learninglevels.edit', ['learninglevel' => $learningLevel->id]) }}" class="text-blue-500 hover:text-blue-700 mr-4">Wijzigen</a>
                <form action="{{ route('admin.learninglevels.destroy', ['learninglevel' => $learningLevel->id]) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit leer niveau wilt verwijderen?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">Verwijderen</button>
                </form>
            </div>
        </div>

        <div class="card-body">
            <p><strong>Naam:</strong> {{ $learningLevel->name }}</p>
            <p><strong>Beschrijving:</strong> {{ $learningLevel->description }}</p>
            <p><strong>Aangemaakt op:</strong> {{ $learningLevel->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Bijgewerkt op:</strong> {{ $learningLevel->updated_at->format('d-m-Y H:i') }}</p>
        </div>
    </div>
@endsection
