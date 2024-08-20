@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('guardians.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Guardians</a>
                            <a href="{{ route('guardians.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Guardian Toevoegen</a>
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
            <h1 class="h6">Guardian Details</h1>
        </div>
        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <h2 class="text-lg font-semibold">Naam: {{ $guardian->user->name }}</h2>
                <h3 class="text-md font-semibold">E-mail: {{ $guardian->user->email }}</h3>

                <h3 class="text-md font-semibold mt-4">Gekoppelde Studenten:</h3>
                <ul class="list-disc list-inside">
                    @foreach($students as $student)
                        <li>{{ $student->user->name }} ({{ $student->studentNr }})</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
