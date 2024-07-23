@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            @can('index studentassignment')
                                <a href="{{ route('admin.studentassignments.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Student Assignments</a>
                            @endcan
                            @can('create studentassignment')
                                <a href="{{ route('admin.studentassignments.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Student Assignment Toevoegen</a>
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
            <h1 class="h6">Overzicht Student Assignments</h1>
        </div>
        @livewire('student-assignment-search')
{{--        @if($studentAssignments->isEmpty())--}}
{{--            <p class="text-gray-900 p-4">Geen student assignments gevonden.</p>--}}
{{--        @else--}}
{{--            <div class="table-responsive">--}}
{{--                <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">--}}
{{--                    <thead>--}}
{{--                    <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">--}}
{{--                        <th class="py-3 px-6 text-left">Student</th>--}}
{{--                        <th class="py-3 px-6 text-left">Klas</th>--}}
{{--                        <th class="py-3 px-6 text-left">Opdracht</th>--}}
{{--                        <th class="py-3 px-6 text-left">Status</th>--}}
{{--                        <th class="py-3 px-6 text-left">Inleverdatum</th>--}}
{{--                        <th class="py-3 px-6 text-left">Acties</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody class="text-gray-600 text-sm font-light">--}}
{{--                    @foreach($studentAssignments as $studentAssignment)--}}
{{--                        <tr class="border-b border-gray-200 hover:bg-gray-100">--}}
{{--                            <td class="py-3 px-6 text-left">{{ $studentAssignment->enrolmentClass->enrolment->student->user->name }}</td>--}}
{{--                            <td class="py-3 px-6 text-left">{{ $studentAssignment->enrolmentClass->classYear->schoolClass->name }}</td>--}}
{{--                            <td class="py-3 px-6 text-left">--}}
{{--                                @if($studentAssignment->classAssignment)--}}
{{--                                    {{ $studentAssignment->classAssignment->assignment->name }}--}}
{{--                                @elseif($studentAssignment->individualAssignment)--}}
{{--                                    {{ $studentAssignment->individualAssignment->name }}--}}
{{--                                @else--}}
{{--                                    N/A--}}
{{--                                @endif--}}
{{--                            </td>--}}
{{--                            <td class="py-3 px-6 text-left">{{ $studentAssignment->assignmentStatus->name }}</td>--}}
{{--                            <td class="py-3 px-6 text-left">{{ $studentAssignment->duedate }}</td>--}}
{{--                            <td class="py-3 px-6 text-left">--}}
{{--                                <div class="flex item-center justify-center">--}}
{{--                                    @can('show studentassignment')--}}
{{--                                        <a href="{{ route('admin.studentassignments.show', $studentAssignment->id) }}" class="w-4 mr-2 transform text-blue-500 hover:text-blue-700 hover:scale-110">--}}
{{--                                            <i class="fas fa-eye"></i>--}}
{{--                                        </a>--}}
{{--                                    @endcan--}}
{{--                                    @can('edit studentassignment')--}}
{{--                                        <a href="{{ route('admin.studentassignments.edit', $studentAssignment->id) }}" class="w-4 mr-2 transform text-yellow-500 hover:text-yellow-700 hover:scale-110">--}}
{{--                                            <i class="fas fa-edit"></i>--}}
{{--                                        </a>--}}
{{--                                    @endcan--}}
{{--                                    @can('delete studentassignment')--}}
{{--                                        <form action="{{ route('admin.studentassignments.delete', $studentAssignment->id) }}" method="GET" class="inline">--}}
{{--                                            @csrf--}}
{{--                                            <button type="submit" class="w-4 transform text-red-500 hover:text-red-700 hover:scale-110">--}}
{{--                                                <i class="fas fa-trash-alt"></i>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
{{--                                    @endcan--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--            <div class="p-4">--}}
{{--                {{ $studentAssignments->links() }}--}}
{{--            </div>--}}
{{--        @endif--}}
    </div>
@endsection
