@extends('layouts.layoutpublic')

@section('content')
    <!-- Hero Section -->
    <section class="w-full bg-cover bg-center py-12" style="background-image: url('{{ asset('img/ict1.webp') }}');">
        <div class="container mx-auto max-w-screen-xl text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Welkom bij de Studenten Voortgang Checklist</h1>
            <p class="text-xl md:text-2xl text-white mb-8">Houd de voortgang eenvoudig en overzichtelijk bij</p>
            @guest
                <a href="{{ route('register') }}" class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-6 rounded">Begin Nu</a>
            @else
                <a href="{{ route('admin.periods.index') }}" class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-6 rounded">Dashboard</a>
            @endguest
        </div>
    </section>

    <!-- Features Section -->
    <section class="w-full py-16 bg-gray-100">
        <div class="container mx-auto max-w-screen-xl text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-12">Waarom deze Checklist?</h2>
            <div class="flex flex-wrap justify-center items-stretch">
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-white shadow-md rounded-lg p-6 flex flex-col justify-between h-full">
                        <div>
                            <i class="fa-solid fa-chart-line fa-3x text-teal-500 mb-4"></i>
                            <h3 class="text-xl font-bold mb-2">Inzichtelijke Rapportages</h3>
                            <p>Ontvang gedetailleerde rapportages over de voortgang van elke student, gegroepeerd per vak en module.</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-white shadow-md rounded-lg p-6 flex flex-col justify-between h-full">
                        <div>
                            <i class="fa-solid fa-check fa-3x text-teal-500 mb-4"></i>
                            <h3 class="text-xl font-bold mb-2">Snelle Updates</h3>
                            <p>Alle voortgangsinformatie is up-to-date en altijd beschikbaar, waar je ook bent.</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-white shadow-md rounded-lg p-6 flex flex-col justify-between h-full">
                        <div>
                            <i class="fa-solid fa-user-friends fa-3x text-teal-500 mb-4"></i>
                            <h3 class="text-xl font-bold mb-2">Gebruiksvriendelijk</h3>
                            <p>Eenvoudig te gebruiken interface, ontworpen om je snel de informatie te geven die je nodig hebt.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="w-full bg-teal-500 py-16">
        <div class="container mx-auto max-w-screen-xl text-center text-white">
            <h2 class="text-3xl font-bold mb-4">Begin Nu met het Bijhouden van Voortgang</h2>
            <p class="text-xl mb-8">Meld je vandaag nog aan en krijg direct toegang tot je persoonlijke dashboard.</p>
            @guest
                <a href="{{ route('register') }}" class="bg-white hover:bg-gray-200 text-teal-500 font-bold py-3 px-6 rounded">Registreer Nu</a>
            @else
                <a href="{{ route('admin.periods.index') }}" class="bg-white hover:bg-gray-200 text-teal-500 font-bold py-3 px-6 rounded">Ga naar Dashboard</a>
            @endguest
        </div>
    </section>
@endsection
