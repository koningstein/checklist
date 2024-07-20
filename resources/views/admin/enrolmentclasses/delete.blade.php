@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.enrolmentclasses.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Enrolment Classes</a>
                            <a href="{{ route('admin.enrolmentclasses.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Enrolment Class Toevoegen</a>
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
            <h1 class="h6">Enrolment Class Verwijderen</h1>
        </div>

        <div class="card-body">
            <p>Weet je zeker dat je deze Enrolment Class wilt verwijderen?</p>
            <p>Klas: {{ $enrolmentClass->classYear->schoolClass->name }} - Jaar: {{ $enrolmentClass->classYear->schoolYear->name }}</p>
            <p>Student: {{ $enrolmentClass->enrolment->student->user->name }}</p>
            <h2 class="font-semibold text-xl mt-4">Opdrachten die worden verwijderd:</h2>
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
                @foreach($studentAssignments as $assignment)
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
            <form action="{{ route('admin.enrolmentclasses.destroy', ['enrolmentclass' => $enrolmentClass->id]) }}" method="POST" class="mt-4">
                @method('DELETE')
                @csrf
                <button type="submit" class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">Verwijderen</button>
                <a href="{{ route('admin.enrolmentclasses.index') }}" class="mt-2 ml-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg active:bg-gray-600 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray">Annuleren</a>
            </form>
        </div>
    </div>
@endsection
