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
                            <a href="{{ route('admin.students.import') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Import Studenten</a>
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
                <form action="{{ route('admin.students.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label class="block text-sm">
                            <span class="text-gray-700">Kies de excel file:</span>
                            <input class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                                   name="file" type="file" id="file" required/>
                        </label>
                    </div>

                    <div>
                        <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                    focus:outline-none focus:shadow-outline-purple" type="submit">Import studenten</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
