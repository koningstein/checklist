@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.studentassignments.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Student Assignments</a>
                            <a href="{{ route('admin.studentassignments.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Student Assignment Toevoegen</a>
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
            <h1 class="h6">Student Assignment Wijzigen</h1>
        </div>

        @if($errors->any())
            <div class="bg-red-200 text-red-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="min-width: 240px">
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <form id="form" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4" action="{{ route('admin.studentassignments.update', ['studentassignment' => $studentAssignment->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <label class="block text-sm">
                        <span class="text-gray-700">Klas</span>
                        <select name="enrolment_class_id" class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-select" required>
                            @foreach($enrolmentClasses as $class)
                                <option value="{{ $class->id }}" {{ $studentAssignment->enrolment_class_id == $class->id ? 'selected' : '' }}>
                                    {{ $class->classYear->schoolClass->name }} - {{ $class->enrolment->student->user->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">Opdracht</span>
                        <select name="individual_assignment_id" class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-select" required>
                            @foreach($assignments as $assignment)
                                <option value="{{ $assignment->id }}" {{ $studentAssignment->individual_assignment_id == $assignment->id ? 'selected' : '' }}>
                                    {{ $assignment->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">Inleverdatum</span>
                        <input type="date" name="duedate" class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input" value="{{ old('duedate', $studentAssignment->duedate ? \Carbon\Carbon::parse($studentAssignment->duedate)->toDateString() : '') }}" />
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">Status</span>
                        <select name="assignment_status_id" class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-select" required>
                            @foreach($assignmentStatuses as $status)
                                <option value="{{ $status->id }}" {{ $studentAssignment->assignment_status_id == $status->id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">Voltooid</span>
                        <input type="checkbox" name="completed" class="form-checkbox" {{ $studentAssignment->completed ? 'checked' : '' }}>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">Gemarkeerd door</span>
                        <input type="text" name="marked_by_id" class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input" value="{{ old('marked_by_id', $studentAssignment->marked_by_id) }}" />
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">Gemarkeerd op</span>
                        <input type="datetime-local" name="marked_at" class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input" value="{{ old('marked_at', $studentAssignment->marked_at ? \Carbon\Carbon::parse($studentAssignment->marked_at)->format('Y-m-d\TH:i') : '') }}" />
                    </label>

                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Wijzigen</button>
                </form>
            </div>
        </div>
    </div>
@endsection
