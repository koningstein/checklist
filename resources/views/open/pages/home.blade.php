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
                @hasanyrole('student')
                <a href="{{ route('student.results') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-white no-underline md:border-r border-gray-300">Studie voortgang</a>
                @endhasanyrole
                @hasanyrole('guardian')
                <a href="{{ route('guardian.dashboard') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-white no-underline md:border-r border-gray-300">Dashboard</a>
                @endhasanyrole
                @hasanyrole('keyteacher|admin')
                <a class="px-2 md:pl-0 md:mr-3 md:pr-3 text-white no-underline md:border-r border-gray-300" href="{{ route('admin.periods.index') }}">Admin</a>
                @endhasanyrole
                @hasanyrole('teacher')
                <a class="px-2 md:pl-0 md:mr-3 md:pr-3 text-white no-underline md:border-r border-gray-300" href="{{ route('admin.students.index') }}">Admin</a>
                @endhasanyrole
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
        <div class="container mx-auto max-w-screen-xl text-center text-gray-800">
            <h2 class="text-3xl font-bold mb-4">Samen de Voortgang Volgen</h2>
            <p class="text-xl mb-8">Voor toegang tot je persoonlijke dashboard of om studenten en ouders toe te voegen, neem contact op met je docent.</p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('page.contact') }}" class="bg-white hover:bg-gray-200 text-teal-500 font-bold py-3 px-6 rounded">Neem Contact Op</a>
            </div>
        </div>
    </section>
@endsection
