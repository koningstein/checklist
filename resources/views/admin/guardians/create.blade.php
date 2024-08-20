@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.guardians.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Guardians</a>
                            <a href="{{ route('admin.guardians.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Guardian Toevoegen</a>
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
            <h1 class="h6">Guardian Admin</h1>
        </div>

        @if($errors->any())
            <div class="bg-red-200 text-red-900 rounded-lg shadow-md p-6 pr-10 mb-8"
                 style="min-width: 240px">
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body grid grid-cols-2 gap-6 lg:grid-cols-2">
            <!-- Formulier 1: Selecteer bestaande gebruiker en maak deze Guardian -->
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-4">Bestaande gebruiker als Guardian</h2>
                <form id="existing-user-form" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
                      action="{{ route('admin.guardians.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700">Selecteer bestaande gebruiker</span>
                        </label>
                        <select name="selected_user_id" class="w-full border rounded px-3 py-2 mb-2 bg-gray-200" required>
                            <option value="">-- Selecteer een gebruiker --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="block text-sm">
                        <span class="text-gray-700">Koppel aan Student</span>
                        <select name="student_id" class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input" required>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->user->name }} ({{ $student->studentNr }})</option>
                            @endforeach
                        </select>
                    </label>

                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                    focus:outline-none focus:shadow-outline-purple">Guardian Toewijzen</button>
                </form>
            </div>

            <!-- Formulier 2: Maak nieuwe gebruiker en stel deze in als Guardian -->
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-4">Nieuwe gebruiker als Guardian</h2>
                <form id="new-user-form" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
                      action="{{ route('admin.guardians.storeNew') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700">Naam</span>
                        </label>
                        <input type="text" name="new_user_name" placeholder="Naam" class="w-full border rounded px-3 py-2 mb-2 bg-gray-200" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700">E-mail</span>
                        </label>
                        <input type="email" name="new_user_email" placeholder="Email" class="w-full border rounded px-3 py-2 mb-2 bg-gray-200" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="text-gray-700">Wachtwoord</span>
                        </label>
                        <input type="password" name="new_user_password" placeholder="Wachtwoord" class="w-full border rounded px-3 py-2 bg-gray-200" required>
                    </div>

                    <label class="block text-sm">
                        <span class="text-gray-700">Koppel aan Student</span>
                        <select name="student_id" class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input" required>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->user->name }} ({{ $student->studentNr }})</option>
                            @endforeach
                        </select>
                    </label>

                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150
                    bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700
                    focus:outline-none focus:shadow-outline-purple">Nieuwe Guardian Aanmaken</button>
                </form>
            </div>
        </div>
    </div>
@endsection
