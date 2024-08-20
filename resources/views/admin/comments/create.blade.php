@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.comments.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Comments</a>
                            <a href="{{ route('admin.comments.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Comment Toevoegen</a>
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
            <h1 class="h6">Comment Toevoegen</h1>
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
                      action="{{ route('admin.comments.store') }}" method="POST">
                    @csrf
                    <label class="block text-sm">
                        <span class="text-gray-700">Comment</span>
                        <textarea
                            class="bg-gray-200 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                            focus:outline-none focus:shadow-outline" name="comment"
                            id="comment" rows="7">{{ old('comment') }}</textarea>
                    </label>

                    <label class="block text-sm">
                        <span class="text-gray-700">Gekoppeld Nieuwsbericht</span>
                        <select class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input" name="news_id" required>
                            @foreach($news as $newsItem)
                                <option value="{{ $newsItem->id }}" @selected($newsItem->id == old('news_id'))>{{ $newsItem->title }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="block text-sm">
                        <span class="text-gray-700">Gekoppelde Gebruiker</span>
                        <select class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input" name="user_id" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" @selected($user->id == old('user_id'))>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </label>

                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                    focus:outline-none focus:shadow-outline-purple">Toevoegen</button>
                </form>
            </div>
        </div>
    </div>
@endsection
