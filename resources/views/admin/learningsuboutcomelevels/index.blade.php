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
            <h1 class="h6">Learning Suboutcome Levels</h1>
        </div>

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            @if(session('status'))
                <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="min-width: 240px">
                    {{ session('status') }}
                </div>
            @endif

            @if($learningsuboutcomelevels->isEmpty())
                <p class="text-gray-900">Geen Learning Suboutcome Levels gevonden.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Leeruitkomst</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Niveau</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Periode</th>
                            <th class="px-6 py-3 bg-gray-50"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($learningsuboutcomelevels as $learningsuboutcomelevel)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $learningsuboutcomelevel->learningSuboutcome->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $learningsuboutcomelevel->learningLevel->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $learningsuboutcomelevel->period ? $learningsuboutcomelevel->period->period : 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.learningsuboutcomelevels.show', ['learningsuboutcomelevel' => $learningsuboutcomelevel->id]) }}" class="text-indigo-600 hover:text-indigo-900">Details</a>
                                    <a href="{{ route('admin.learningsuboutcomelevels.edit', ['learningsuboutcomelevel' => $learningsuboutcomelevel->id]) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">Wijzigen</a>
                                    <a href="{{ route('admin.learningsuboutcomelevels.delete', ['learningsuboutcomelevel' => $learningsuboutcomelevel->id]) }}" class="ml-4 text-red-600 hover:text-red-900">Verwijderen</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $learningsuboutcomelevels->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
