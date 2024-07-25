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
            <h1 class="h6">Overzicht Leer Niveaus</h1>
        </div>

        @if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8">
                {{ session('status') }}
            </div>
        @endif

        @if(session('status-wrong'))
            <div class="bg-red-200 text-red-900 rounded-lg shadow-md p-6 pr-10 mb-8">
                {{ session('status-wrong') }}
            </div>
        @endif

        <div class="card-body">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Beschrijving</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acties</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($learningLevels as $learningLevel)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $learningLevel->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $learningLevel->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('admin.learninglevels.show', $learningLevel->id) }}" class="text-blue-600 hover:text-blue-900">Details</a>
                            <a href="{{ route('admin.learninglevels.edit', $learningLevel->id) }}" class="text-indigo-600 hover:text-indigo-900 ml-2">Bewerken</a>
                            <form action="{{ route('admin.learninglevels.delete', $learningLevel->id) }}" method="GET" class="inline">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $learningLevels->links() }}
            </div>
        </div>
    </div>
@endsection
