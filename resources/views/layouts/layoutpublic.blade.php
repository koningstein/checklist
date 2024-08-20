<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v6.1.2/css/pro.min.css">

    @livewireStyles
    <title>Checklist</title>
    <style>
        .bg-orange-500 {
            background-color: #f59e0b; /* Dit is de hex-kleur voor Tailwind's bg-orange-500 */
        }
    </style>
</head>
<body>
<!-- header -->
<header class="w-full px-6 bg-white">
    <div class="container mx-auto max-w-screen-xl md:flex justify-between items-center">
        <a href="#" class="block py-6 w-full text-center md:text-left md:w-auto text-gray-600 no-underline flex justify-center items-center">
            <img src="{{ asset('img/Logo_Techniekcollege_RGB_150_dpi.png') }}" alt="Techniekcollege Rotterdam" class="h-16 mr-4">
            <span class="font-bold text-xl text-gray-800">Checklist</span>
        </a>
        <div class="w-full md:w-auto mb-6 md:mb-0 text-center md:text-right">
            @guest
                @if(Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-block no-underline bg-black text-white text-sm py-2 px-3">Sign Up</a>
                @endif
                <a href="{{ route('login') }}" class="inline-block no-underline bg-black text-white text-sm py-2 px-3">Login</a>
            @else
                <div class="w-full text-gray-700 bg-white ">
                    <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                    <div class="w-8 h-8 overflow-hidden rounded-full inline-block">
                                        <img class="w-full h-full object-cover" src="{{ asset('img/user.svg') }}" >
                                    </div>
                                    <span class="text-center align-text-bottom w-16 h-8 overflow-hidden inline-block">{{ Auth::user()->name }}</span>
                                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline-block w-4 h-4 mt-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48 z-10">
                                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800 ">
{{--                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">edit my profile</a>--}}
{{--                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">my inbox</a>--}}
{{--                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">tasks</a>--}}
{{--                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">chats</a>--}}

                                        @hasanyrole('keyteacher|admin')
                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900
                                        focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('admin.periods.index') }}">Admin</a>
                                        @endhasanyrole
                                        @hasanyrole('teacher')
                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900
                                        focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('admin.students.index') }}">Admin</a>
                                        @endhasanyrole
                                        <hr>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                           class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900
                                           transition-all duration-300 ease-in-out" >
                                            <i class="fad fa-user-times text-xs mr-1"></i>
                                            log out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</header>
<!-- /header -->

<!-- nav -->
<nav class="w-full bg-white md:pt-0 px-6 relative border-t border-b border-gray-300">
    <div class="container mx-auto max-w-screen-xl md:flex justify-between items-center text-sm md:text-md md:justify-start">
        <div class="w-full md:w-3/4 text-center md:text-left py-4 flex flex-wrap justify-center items-stretch md:justify-start md:items-start">
            <a href="{{ route('page.home') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Home</a>
            <a href="{{ route('page.aboutus') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Over ons</a>
            <a href="{{ route('page.working-system') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Hoe werkt het?</a>
            <a href="{{ route('news.index') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Nieuws</a>
            <a href="{{ route('page.contact') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Contact</a>
            @hasanyrole('student')
                <a href="{{ route('student.results') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Studie voortgang</a>
            @endhasanyrole
            @hasanyrole('guardian')
            <a href="{{ route('guardian.dashboard') }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Dashboard</a>
            @endhasanyrole
        </div>
        <div class="w-full md:w-1/4 text-center md:text-right pb-4 md:p-0">
{{--            <input type="search" placeholder="Search..." class="bg-gray-200 border text-sm p-1" />--}}
        </div>
    </div>
</nav>
<!-- /nav -->

@yield('content')

<!-- about -->
<div class="w-full px-6 py-12 text-left bg-gray-300 text-gray-700 leading-normal">
    <div class="container max-w-screen-xl mx-auto flex justify-center flex-wrap md:flex-no-wrap">
        <div class="w-full md:w-1/2">
            <h3 class="text-3xl mb-8 text-black leading-tight">Over de Studenten Voortgang Checklist</h3>
            <p class="mb-5">De Studenten Voortgang Checklist is ontworpen om studenten, ouders en docenten te helpen bij het nauwkeurig volgen van de studie voortgang. Ons platform biedt een gestroomlijnde manier om prestaties te monitoren, deadlines bij te houden en de voortgang van elke student te evalueren.</p>
            <p class="mb-5">Door inzichtelijke rapportages en eenvoudige tools aan te bieden, willen we het voor docenten gemakkelijker maken om individuele ondersteuning te bieden en studenten te helpen hun leerdoelen te bereiken. Studenten kunnen op elk moment hun eigen voortgang bekijken en direct zien waar ze staan.</p>
            <p>Onze missie is om een positieve impact te hebben op het leerproces door zowel studenten als docenten de middelen te geven om te slagen. We geloven in de kracht van onderwijs en streven ernaar om een tool te bieden die dat onderwijs naar een hoger niveau tilt.</p>
        </div>
        <div class="w-full md:w-1/2 flex justify-center items-center">
            <img src="{{ asset('img/Logo_Techniekcollege_RGB_150_dpi.png') }}" alt="Techniek College Rotterdam" class="w-2/3 h-auto">
        </div>
    </div>
</div>

<!-- /about -->
<!-- footer -->
<footer class="w-full bg-white px-6 border-t">
    <div class="container mx-auto max-w-screen-xl py-6 flex flex-wrap md:flex-no-wrap justify-between items-center text-sm">
        &copy;2024 Marcel Koningstein. All rights reserved.
        <div class="pt-4 md:p-0 text-center md:text-right text-xs">
            <a href="#" class="text-black no-underline hover:underline">Privacy Policy</a>
            <a href="#" class="text-black no-underline hover:underline ml-4">Terms &amp; Conditions</a>
            <a href="#" class="text-black no-underline hover:underline ml-4">Contact Us</a>
        </div>
    </div>
</footer>
<!-- /footer -->

@livewireScripts
</body>
</html>
