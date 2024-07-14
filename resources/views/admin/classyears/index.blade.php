@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.classyears.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Class Years</a>
                            <a href="{{ route('admin.classyears.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Class Year Toevoegen</a>
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
            <h1 class="h6">Class Year Admin</h1>
        </div>

        @if(session('status'))
            <div class="card-body">
                <div class="bg-green-400 text-green-800 rounded-lg shadow-md p-6 pr-10 mb-8" style="min-width: 240px">{{ session('status') }}</div>
            </div>
        @endif

        @if(session('status-wrong'))
            <div class="card-body">
                <div class="bg-red-400 text-red-800 rounded-lg shadow-md p-6 pr-10 mb-8" style="min-width: 240px">{{ session('status-wrong') }}</div>
            </div>
        @endif

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                        <th class="px-4 py-3">Class Name</th>
                        <th class="px-4 py-3">School Year</th>
                        <th class="px-4 py-3">Details</th>
                        <th class="px-4 py-3">Edit</th>
                        <th class="px-4 py-3">Delete</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($classYears as $classYear)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{ $classYear->schoolClass->name }}</td>
                            <td class="px-4 py-3 text-sm">{{ $classYear->schoolYear->name }}</td>
                            <td class="px-4 py-3 text-sm"><a href="{{ route('admin.classyears.show', ['classyear' => $classYear->id]) }}">Details</a></td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route('admin.classyears.edit', ['classyear' => $classYear->id]) }}">Wijzigen</a>
                                </div>
                            </td>
                            <td>
                                @can('delete classyear')
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ route('admin.classyears.delete', ['classyear' => $classYear->id]) }}">
                                            Verwijderen</a>
                                    </div>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="container max-w-4xl mx-auto pb-10 flex justify-between items-center px-3">
                <div class="text-xs">
                    {{ $classYears->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
