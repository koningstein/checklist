@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.contactmessages.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Berichten</a>
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
            <h1 class="h6">Bericht Bewerken</h1>
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
                <form id="form" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
                      action="{{ route('admin.contactmessages.update', ['contactmessage' => $contactmessage->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <label class="block text-sm">
                        <span class="text-gray-700">Naam</span>
                        <input class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="name" value="{{ old('name', $contactmessage->name) }}" type="text" disabled/>
                    </label>

                    <label class="block text-sm">
                        <span class="text-gray-700">E-mail</span>
                        <input class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="email" value="{{ old('email', $contactmessage->email) }}" type="email" disabled/>
                    </label>

                    <label class="block text-sm">
                        <span class="text-gray-700">Bericht</span>
                        <textarea
                            class="bg-gray-200 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                            focus:outline-none focus:shadow-outline" name="message" rows="7" disabled>{{ old('message', $contactmessage->message) }}</textarea>
                    </label>

                    <label class="block text-sm">
                        <span class="text-gray-700">Status</span>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                            focus:outline-none focus:shadow-outline" name="status" id="status">
                            <option value="ongelezen" @selected($contactmessage->status == 'ongelezen')>Ongelezen</option>
                            <option value="beantwoord" @selected($contactmessage->status == 'beantwoord')>Beantwoord</option>
                            <option value="niet van toepassing" @selected($contactmessage->status == 'niet van toepassing')>Niet van Toepassing</option>
                            <option value="mee bezig" @selected($contactmessage->status == 'mee bezig')>Mee Bezig</option>
                        </select>
                    </label>

                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                    focus:outline-none focus:shadow-outline-purple">Bijwerken</button>
                </form>
            </div>
        </div>
    </div>
@endsection
