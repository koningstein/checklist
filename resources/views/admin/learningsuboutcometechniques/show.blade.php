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
            <h1 class="h6">Details van Learning Suboutcome Technique</h1>
        </div>

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <div class="mb-4">
                    <h2 class="font-semibold text-xl">Learning Suboutcome</h2>
                    <p class="text-gray-900">{{ $learningSuboutcomeTechnique->learningSuboutcome->name }}</p>
                </div>

                <div class="mb-4">
                    <h2 class="font-semibold text-xl">Related Technique</h2>
                    <p class="text-gray-900">{{ $learningSuboutcomeTechnique->learningRelatedTechnique->name }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
