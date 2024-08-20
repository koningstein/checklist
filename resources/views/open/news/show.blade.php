@extends('layouts.layoutpublic')

@section('content')
    <div class="w-full px-6 py-12 text-left bg-gray-100 text-gray-700 leading-normal">
        <div class="container max-w-screen-xl mx-auto">
            <!-- Nieuwsbericht details -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h3 class="text-3xl mb-4 font-semibold">{{ $news->title }}</h3>
                <p class="text-gray-700 mb-4">{{ $news->content }}</p>
                <p class="text-sm text-gray-500">{{ $news->created_at->diffForHumans() }}</p>
            </div>

            <!-- Reacties -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h4 class="text-2xl mb-4 font-semibold">Reacties</h4>

                @foreach ($comments as $comment)
                    <div class="border-t border-gray-200 py-4">
                        <p class="text-gray-700">{{ $comment->comment }}</p>
                        <p class="text-sm text-gray-500">- {{ $comment->user->name }}, {{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Reactieformulier -->
            @auth
                <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                    <h4 class="text-2xl mb-4 font-semibold">Plaats een reactie</h4>
                    <form action="{{ route('comments.store',['news' => $news->id]) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm">
                                <textarea name="comment" rows="4" class="bg-gray-200 block rounded w-full p-2 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" placeholder="Schrijf je reactie hier..." required></textarea>
                            </label>
                        </div>
                        <button class="px-4 py-2 text-white bg-blue-600 rounded">Plaats reactie</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
@endsection
