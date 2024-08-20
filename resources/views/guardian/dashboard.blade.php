@extends('layouts.layoutpublic')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg">
            <div class="bg-teal-500 text-gray-700 text-xl font-semibold p-4 rounded-t-lg">
                <h2 class="text-2xl font-semibold mb-4">Mijn kinderen</h2>
            </div>
            <div class="p-6">
                @if($students->isEmpty())
                    <p class="text-gray-700">Je bent nog niet gekoppeld aan een student.</p>
                @else
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Selecteer een student:</h3>
                        <div class="flex space-x-4">
                            @foreach($students as $student)
                                <a href="{{ route('guardian.dashboard', ['student_id' => $student->id]) }}"
                                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300
                                   @if($selectedStudent && $selectedStudent->id === $student->id) bg-teal-500 text-white @endif">
                                    {{ $student->user->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    @if($selectedStudent)
                        <div class="mt-6">
                            <div class="overflow-hidden border border-gray-200 rounded-lg">
                                @livewire('student-results', ['studentId' => $selectedStudent->id])
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
