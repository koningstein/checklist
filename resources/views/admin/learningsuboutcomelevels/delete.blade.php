@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.learningsuboutcomelevels.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Learning Suboutcome Levels</a>
                            <a href="{{ route('admin.learningsuboutcomelevels.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Learning Suboutcome Level Toevoegen</a>
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
            <h1 class="h6">Learning Suboutcome Level Verwijderen</h1>
        </div>

        <div class="card-body">
            <p>Weet je zeker dat je dit learning suboutcome level wilt verwijderen?</p>
            <ul>
                <li><strong>Leeruitkomst:</strong> {{ $learningSuboutcomeLevel->learningSuboutcome->name }}</li>
                <li><strong>Niveau:</strong> {{ $learningSuboutcomeLevel->learningLevel->name }}</li>
                <li><strong>Beschrijving:</strong> {{ $learningSuboutcomeLevel->description }}</li>
            </ul>

            <form action="{{ route('admin.learningsuboutcomelevels.destroy', ['learningsuboutcomelevel' => $learningSuboutcomeLevel->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex justify-end">
                    <button type="submit" class="ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                        Verwijderen
                    </button>
                    <a href="{{ route('admin.learningsuboutcomelevels.index') }}" class="ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg active:bg-gray-600 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray">
                        Annuleren
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
