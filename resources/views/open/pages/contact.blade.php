@extends('layouts.layoutpublic')

@section('content')
    <section class="w-full py-12 bg-gray-100 text-gray-700 leading-normal">
        <div class="container mx-auto max-w-screen-xl">
            <!-- Heading -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800">Neem Contact Met Ons Op</h2>
                <p class="text-lg text-gray-600 mt-4">We staan klaar om je te helpen met vragen over onze opleidingen en diensten.</p>
            </div>

            <!-- Contactgegevens en formulier -->
            <div class="lg:flex lg:justify-between lg:space-x-12">
                <!-- Contactgegevens -->
                <div class="lg:w-1/2 mb-12 lg:mb-0">
                    <h3 class="text-2xl font-semibold mb-6">Contactgegevens</h3>
                    <p class="mb-4"><i class="fa-solid fa-location-dot text-teal-500 mr-2"></i><strong>Adres:</strong> Schiedamseweg 245, 3118 JB Schiedam</p>
                    <p class="mb-4"><i class="fa-solid fa-phone text-teal-500 mr-2"></i><strong>Telefoon:</strong> +31 88 9454500</p>
{{--                    <p class="mb-4"><i class="fa-solid fa-envelope text-teal-500 mr-2"></i><strong>E-mail:</strong> m.koningstein@tcrmbo.nl</p>--}}

                    <!-- Google Maps -->
                    <div class="mt-8">
                        <iframe class="w-full h-64 rounded-lg shadow-md" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2926.0938820305596!2d4.379273792600261!3d51.924069336984715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c4355c7dc5b3cb%3A0x6658c91aee1bf9c2!2sSchiedamseweg%20245%2C%203118%20JB%20Schiedam!5e0!3m2!1snl!2snl!4v1724059845596!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <!-- Contactformulier -->
                <div class="lg:w-1/2 bg-white shadow-md rounded-lg p-6">
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

                    <h3 class="text-2xl font-semibold mb-6">Stuur Ons Een Bericht</h3>
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
                            <input type="text" name="name" id="name" required
                                   class="mt-1 bg-gray-200 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                            <input type="email" name="email" id="email" required
                                   class="mt-1 bg-gray-200 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Bericht</label>
                            <textarea name="message" id="message" rows="4" required
                                      class="mt-1 bg-gray-200 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:border-teal-500 focus:ring focus:ring-teal-500 focus:ring-opacity-50"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-green-800 hover:bg-green-900 text-white font-bold py-3 px-6 rounded-lg transition ease-in-out duration-300">
                            Verstuur Bericht
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
