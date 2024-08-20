@extends('layouts.layoutpublic')

@section('content')
    <div class="w-full px-6 py-12 text-left bg-gray-100 text-gray-700 leading-normal">
        <div class="container max-w-screen-xl mx-auto">
            <h3 class="text-3xl mb-8 text-black leading-tight">Nieuws</h3>

            @foreach ($newsItems as $news)
                <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                    <h4 class="text-2xl mb-2 font-semibold">
                        <!-- Zwarte kleur voor de link met grijs hover-effect -->
                        <a href="{{ route('news.show', $news) }}" class="text-black hover:text-gray-600 transition-colors duration-200">{{ $news->title }}</a>
                    </h4>
                    <p class="mb-4 text-gray-700">{{ $news->content }}</p> <!-- Volledige content van het nieuwsbericht -->
                    <p class="text-sm text-gray-500">{{ $news->created_at->diffForHumans() }} &middot; {{ $news->comments_count }} reacties</p>
                </div>
            @endforeach

            <div class="mt-6">
                {{ $newsItems->links() }} <!-- Paginering met 5 berichten per pagina -->
            </div>
        </div>
    </div>
@endsection
