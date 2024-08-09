@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.students.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Studenten</a>
                            <a href="{{ route('admin.students.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Student Toevoegen</a>
                            <a href="{{ route('admin.students.importForm') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Import Studenten</a>
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
            <h1 class="h6">Student Admin</h1>
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
                <form action="{{ route('admin.students.storeImport') }}" method="POST">
                    @csrf
                    @foreach ($students as $index => $student)
                        <div class="flex justify-between border p-4 mb-4 rounded-lg">
                            <div class="w-1/2">
                                <h3 class="font-bold text-sm">Student {{ $index + 1 }}</h3>
                                <p class="text-sm"><strong>Name:</strong> {{ $student['name'] }}</p>
                                <p class="text-sm"><strong>Email:</strong> {{ $student['email'] }}</p>
                            </div>
                            <div class="w-1/2 flex flex-col justify-between">
                                <div class="flex items-center mb-4">
                                    <label for="cohort_id_{{ $index }}" class="block text-xs font-medium text-gray-700 mr-2">Cohort:</label>
                                    <select name="students[{{ $index }}][cohort_id]" id="cohort_id_{{ $index }}" class="block w-32 py-1 px-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                                        @foreach ($cohorts as $cohort)
                                            <option value="{{ $cohort->id }}" {{ $highestCohort && $highestCohort->id == $cohort->id ? 'selected' : '' }}>{{ $cohort->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex items-center">
                                    <label for="enrolment_status_id_{{ $index }}" class="block text-xs font-medium text-gray-700 mr-2">Enrolment Status:</label>
                                    <select name="students[{{ $index }}][enrolment_status_id]" id="enrolment_status_id_{{ $index }}" class="block w-32 py-1 px-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" required>
                                        @foreach ($enrolmentStatuses as $status)
                                            <option value="{{ $status->id }}" {{ $defaultStatus && $defaultStatus->id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="students[{{ $index }}][nummer]" value="{{ $student['nummer'] }}">
                            <input type="hidden" name="students[{{ $index }}][name]" value="{{ $student['name'] }}">
                            <input type="hidden" name="students[{{ $index }}][email]" value="{{ $student['email'] }}">
                            <input type="hidden" name="students[{{ $index }}][opleiding]" value="{{ $student['opleiding'] }}">
                        </div>
                        <hr>
                    @endforeach
                    <div class="mt-4">
                        <button type="submit" class="px-4 py-2 text-xs text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">Save Students</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
