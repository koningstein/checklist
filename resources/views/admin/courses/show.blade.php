@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.courses.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Courses</a>
                            <a href="{{ route('admin.courses.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Course Toevoegen</a>
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
            <h1 class="h6">Course Details</h1>
        </div>
        <div class="py-4 px-6">
            <h2 class="text-sm font-semibold text-gray-800">Course details</h2>
            <p class="py-2 text-sm text-gray-700">Naam:  {{ $course->name }}</p>
            <p class="py-2 text-sm text-gray-700">Beschrijving:<br>  {{ $course->description }}</p>

            <h2 class="text-sm font-semibold text-gray-800 mt-4">Modules</h2>
            @if($course->modules->isEmpty())
                <p class="py-2 text-sm text-gray-700">Geen modules gevonden voor deze course.</p>
            @else
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                        <th class="px-4 py-3">Naam</th>
                        <th class="px-4 py-3">Beschrijving</th>
                        <th class="px-4 py-3">Periode</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($course->modules as $module)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{ $module->name }}</td>
                            <td class="px-4 py-3 text-sm">{{ Str::limit($module->description, 50) }}</td>
                            <td class="px-4 py-3 text-sm">{{ $module->period->period }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
