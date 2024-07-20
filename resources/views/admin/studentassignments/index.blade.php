@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.studentassignments.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Student Assignments</a>
                            @can('create studentassignment')
                                <a href="{{ route('admin.studentassignments.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">
                                    <i class="fas fa-plus"></i> Student Assignment Toevoegen
                                </a>
                            @endcan
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
            <h1 class="h6">Student Assignment Admin</h1>
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
                        <th class="px-4 py-3">Student</th>
                        <th class="px-4 py-3">Opdracht</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Details</th>
                        <th class="px-4 py-3">Edit</th>
                        <th class="px-4 py-3">Delete</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($studentAssignments as $studentAssignment)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{ $studentAssignment->enrolmentClass->enrolment->student->user->name }}</td>
                            <td class="px-4 py-3 text-sm">
                                @if($studentAssignment->individualAssignment)
                                    {{ $studentAssignment->individualAssignment->name }}
                                @elseif($studentAssignment->classAssignment)
                                    {{ $studentAssignment->classAssignment->assignment->name }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $studentAssignment->assignmentStatus->name }}</td>
                            <td class="px-4 py-3 text-sm">
                                @can('show studentassignment')
                                    <a href="{{ route('admin.studentassignments.show', ['studentassignment' => $studentAssignment->id]) }}" class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-eye"></i> Details
                                    </a>
                                @endcan
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @can('edit studentassignment')
                                    <a href="{{ route('admin.studentassignments.edit', ['studentassignment' => $studentAssignment->id]) }}" class="text-yellow-600 hover:text-yellow-900">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                @endcan
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @can('delete studentassignment')
                                    <a href="{{ route('admin.studentassignments.delete', ['studentassignment' => $studentAssignment->id]) }}" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="container max-w-4xl mx-auto pb-10 flex justify-between items-center px-3">
                <div class="text-xs">
                    {{ $studentAssignments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
