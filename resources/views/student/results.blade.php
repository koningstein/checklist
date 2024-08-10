@extends('layouts.layoutpublic')

@section('content')
    <div class="container mx-auto px-4 ">
        <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg">
            <div class="bg-teal-500 text-white text-xl font-bold p-4 rounded-t-lg">
                Voortgang van {{ $student->user->name }}
            </div>
            <div class="p-6">
                @livewire('student-results', ['studentId' => $student->id])
            </div>
        </div>
    </div>
@endsection

