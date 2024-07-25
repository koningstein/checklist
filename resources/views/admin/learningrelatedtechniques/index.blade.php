@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.learningrelatedtechniques.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Learning Related Techniques</a>
                            <a href="{{ route('admin.learningrelatedtechniques.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Learning Related Technique Toevoegen</a>
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
            <h1 class="h6">Overzicht Learning Related Techniques</h1>
        </div>

        @if (session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-md p-6 pr-10 mb-8">
                {{ session('status') }}
            </div>
        @endif

        <div class="card-body">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($learningRelatedTechniques as $learningRelatedTechnique)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $learningRelatedTechnique->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $learningRelatedTechnique->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.learningrelatedtechniques.show', ['learningrelatedtechnique' => $learningRelatedTechnique->id]) }}" class="text-indigo-600 hover:text-indigo-900">Details</a>
                            <a href="{{ route('admin.learningrelatedtechniques.edit', ['learningrelatedtechnique' => $learningRelatedTechnique->id]) }}" class="text-indigo-600 hover:text-indigo-900 ml-4">Edit</a>
                            <a href="{{ route('admin.learningrelatedtechniques.delete', ['learningrelatedtechnique' => $learningRelatedTechnique->id]) }}" class="text-red-600 hover:text-red-900 ml-4">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $learningRelatedTechniques->links() }}
            </div>
        </div>
    </div>
@endsection
