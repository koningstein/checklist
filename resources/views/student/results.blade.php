@extends('layouts.layoutpublic')

@section('content')
    <div class="container mx-auto px-4 ">
        <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg">
            <div class="p-6">
                @livewire('student-results', ['studentId' => $student->id])
            </div>
        </div>
    </div>
@endsection

