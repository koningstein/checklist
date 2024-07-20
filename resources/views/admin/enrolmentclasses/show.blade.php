@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.enrolmentclasses.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Inschrijvingen</a>
                            <a href="{{ route('admin.enrolmentclasses.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Inschrijving Toevoegen</a>
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
            <h1 class="h6">Inschrijving Details</h1>
        </div>

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <div class="mb-4">
                    <h2 class="font-semibold text-xl">Student Informatie</h2>
                    <p class="text-gray-900"><strong>Naam:</strong> {{ $enrolmentClass->enrolment->student->user ? $enrolmentClass->enrolment->student->user->name : 'N/A' }}</p>
                    <p class="text-gray-900"><strong>Studentnummer:</strong> {{ $enrolmentClass->enrolment->student->studentNr }}</p>
                </div>

                <div class="mb-4">
                    <h2 class="font-semibold text-xl">Klas Informatie</h2>
                    <p class="text-gray-900"><strong>Klas:</strong> {{ $enrolmentClass->classYear->schoolClass->name }}</p>
                    <p class="text-gray-900"><strong>Schooljaar:</strong> {{ $enrolmentClass->classYear->schoolYear->name }}</p>
                </div>

                <div class="mb-4">
                    <h2 class="font-semibold text-xl">Opdrachten</h2>
                    @if($enrolmentClass->studentAssignments->isEmpty())
                        <p class="text-gray-900">Geen opdrachten toegewezen.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Opdracht
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($enrolmentClass->studentAssignments as $assignment)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $assignment->classAssignment->assignment->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $assignment->assignmentStatus->name }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
