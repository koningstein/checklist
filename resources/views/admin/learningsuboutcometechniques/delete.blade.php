@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.learningsuboutcometechniques.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Learning Suboutcome Techniques</a>
                            <a href="{{ route('admin.learningsuboutcometechniques.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Learning Suboutcome Technique Toevoegen</a>
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
            <h1 class="h6">Learning Suboutcome Technique Verwijderen</h1>
        </div>

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <p class="text-gray-900">Weet je zeker dat je deze learning suboutcome technique wilt verwijderen?</p>
                <ul class="mt-3 list-disc list-inside text-sm text-gray-600">
                    <li>Learning Suboutcome: {{ $learningSuboutcomeTechnique->learningSuboutcome->name }}</li>
                    <li>Related Technique: {{ $learningSuboutcomeTechnique->learningRelatedTechnique->name }}</li>
                </ul>
                <form id="form" class="mt-4" action="{{ route('admin.learningsuboutcometechniques.destroy', ['learningsuboutcometechnique' => $learningSuboutcomeTechnique->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">Verwijderen</button>
                    <a href="{{ route('admin.learningsuboutcometechniques.index') }}" class="ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg active:bg-gray-600 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray">Annuleren</a>
                </form>
            </div>
        </div>
    </div>
@endsection
