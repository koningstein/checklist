@extends('layouts.layoutpublic')  <!-- Verander naar de juiste naam van je masterpage als het anders is -->

@section('content')
    <div class="w-full px-6 py-12 text-left bg-gray-100 text-gray-700 leading-normal">
        <div class="container max-w-screen-xl mx-auto">
            <!-- Flexbox voor de eerste paragraaf en afbeelding naast elkaar -->
            <div class="w-full lg:flex lg:justify-between lg:items-start mb-8">
                <!-- Tekstgedeelte -->
                <div class="lg:w-1/2 mb-8 lg:mb-0">
                    <h3 class="text-3xl mb-8 text-black leading-tight">Over ons</h3>
                    <p>
                        Welkom bij de ICT-opleidingen van het Techniek College Rotterdam, locatie Schiedamseweg. Hier leiden we toekomstige IT-professionals op die klaar zijn om de snel veranderende technologische wereld aan te gaan. Ons onderwijs is praktijkgericht en nauw verbonden met het bedrijfsleven, zodat onze studenten de vaardigheden ontwikkelen die in de moderne arbeidsmarkt worden gevraagd.
                    </p>
                </div>

                <!-- Afbeeldingsgedeelte -->
                <div class="lg:w-1/2 flex justify-center">
                    <img src="{{ asset('img/ict2.webp') }}" class="h-64 w-[1000px] object-cover" alt="ICT-afbeelding">
                </div>
            </div>

            <!-- De rest van de tekst op volledige breedte -->
            <div class="w-full">
                <h4 class="text-2xl mb-4 text-black">Onze opleidingen</h4>
                <ul class="list-disc list-inside mb-5">
                    <li>
                        <strong>Allround medewerker IT systems and devices (niveau 3):</strong> Werkplekken klaarmaken en 100 nieuwe computers installeren bij een bedrijf? Laat dat maar aan jou over. Je bent creatief. En je vindt het leuk om gebruikers verder te helpen bij bijvoorbeeld een supportdesk.
                    </li>
                    <li>
                        <strong>Expert IT systems and devices (niveau 4):</strong> Jij zorgt ervoor dat de IT-infrastructuur en de bijbehorende apparaten, zoals printers en smartboards goed werken. Je bent geduldig en voelt goed aan wat er eerst moet gebeuren.
                    </li>
                    <li>
                        <strong>Medewerker ICT (niveau 2):</strong> Je bent helemaal weg van computers, laptops en mobiele telefoons. En je vindt het leuk om te weten wat je er allemaal mee kunt doen.
                    </li>
                    <li>
                        <strong>Software developer (niveau 4):</strong> Jij bedenkt, ontwerpt én bouwt computerprogramma’s en websites. Je kunt zelfstandig werken, maar vindt het ook leuk om samen te werken met developers en designers.
                    </li>
                    <li>
                        <strong>Software developer - creative media technology (niveau 4):</strong> Jij bedenkt, ontwerpt én bouwt websites en apps. Je kunt zelfstandig werken en bent een creatieve duizendpoot.
                    </li>
                </ul>
                <h4 class="text-2xl mb-4 text-black">Onze locatie en visie</h4>
                <div class="w-full lg:flex lg:justify-between lg:items-start mb-8">


                    <!-- Afbeeldingsgedeelte -->
                    <div class="lg:w-1/2 flex justify-left">
                        <img src="{{ asset('img/Schiedamseweg245.jpg') }}" class="h-64 w-[1000px] object-cover" alt="Locatie Schiedamseweg 245">
                    </div>
                    <!-- Tekstgedeelte -->
                    <div class="lg:w-1/2 mb-8 lg:mb-0" >
                        <p>
                            Het Techniek College Rotterdam (TCR) is gevestigd in de levendige stad Rotterdam. Onze locatie aan de Schiedamseweg 245 in Schiedam is één van de tien locaties van TCR, waar we ICT en Bouw opleidingen hebben. We hebben een sterke focus op techniek en technologie, met als doel studenten op te leiden tot veelzijdige professionals die klaar zijn voor de toekomst.
                        </p>
                    </div>
                </div>

                <h4 class="text-2xl mb-4 text-black">Innovatief onderwijs</h4>
                <p class="mb-5">
                    Bij TCR staat innovatie centraal. We bieden studenten de mogelijkheid om te werken aan echte projecten uit het bedrijfsleven en voorzien hen van de nieuwste technische middelen om te leren en te groeien. Onze opleidingen zijn flexibel en ontwikkelingsgericht, zodat studenten hun opleiding kunnen aanpassen aan hun eigen behoeften en interesses.
                </p>
                <p class="mb-5">
                    Met een sterke nadruk op samenwerking, coaching en technologie, streven we ernaar om onze studenten niet alleen technisch vaardig, maar ook sociaal competent te maken. Ons doel is om beginnende vakmensen op te leiden die klaar zijn om multidisciplinair te werken en een positieve impact te maken in hun vakgebied.
                </p>
            </div>
        </div>
    </div>
@endsection
