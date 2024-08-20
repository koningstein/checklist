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
            <h1 class="h6">Comment Details</h1>
        </div>

        <div class="py-4 px-6">
            <h2 class="text-sm font-semibold text-gray-800">Comment details</h2>
            <p class="py-2 text-sm text-gray-700">Comment: {{ $comment->comment }}</p>
            <p class="py-2 text-sm text-gray-700">Auteur: {{ $comment->user->name }}</p>
            <p class="py-2 text-sm text-gray-700">Nieuwsbericht: {{ $comment->news->title }}</p>
            <p class="py-2 text-sm text-gray-700">Gemaakt op: {{ $comment->created_at }}</p>
            <p class="py-2 text-sm text-gray-700">Bijgewerkt op: {{ $comment->updated_at }}</p>
        </div>
    </div>
@endsection
