@extends('layouts.layoutpublic')  <!-- Verander naar de juiste naam van je masterpage als het anders is -->

@section('content')
    <div class="w-full px-6 py-12 text-left bg-gray-100 text-gray-700 leading-normal">
        <div class="container max-w-screen-xl mx-auto">
            <!-- Flexbox voor de eerste paragraaf -->
            <div class="w-full lg:justify-between lg:items-start mb-8">
                <!-- Tekstgedeelte zonder afbeelding -->
                <div class="w-full mb-8">
                    <h3 class="text-3xl mb-8 text-black leading-tight">Hoe werkt de Voortgangschecklist?</h3>
                    <p>
                        De voortgang van een student wordt nauwgezet bijgehouden via de Voortgangschecklist, een essentieel hulpmiddel voor zowel studenten als ouders om inzicht te krijgen in het leerproces. Ons systeem is gebaseerd op de kwalificatiedossiers die door de overheid zijn opgesteld, waarin de leerdoelen en eindtermen voor de opleiding worden beschreven. Deze dossiers geven richtlijnen, maar laten genoeg ruimte over voor ons als school om het onderwijs flexibel en praktijkgericht in te richten.
                    </p>
                </div>
            </div>

            <!-- Leeruitkomsten en Niveau's met afbeelding rechts -->
            <h4 class="text-2xl mb-4 text-black">Leeruitkomsten en Niveau's</h4>
            <div class="lg:flex lg:justify-between lg:items-start mb-8">
                <!-- Tekstgedeelte -->
                <div class="lg:w-1/2 mb-8 lg:mb-0">
                    <p>
                        Op basis van het kwalificatiedossier hebben we de leeruitkomsten geformuleerd die tijdens de opleiding behaald moeten worden. Deze leeruitkomsten zijn verdeeld over verschillende niveaus. Afhankelijk van de leeruitkomst begin je soms met de basis in het eerste jaar en werk je door naar een hoger niveau in de volgende jaren, maar het kan ook voorkomen dat je direct op een gevorderd niveau begint. Dit zorgt ervoor dat het leerproces is afgestemd op de behoeften van de student en de specifieke leeruitkomst.
                    </p>
                </div>
                <!-- Afbeeldingsgedeelte rechts -->
                <div class="lg:w-1/2 flex justify-center">
                    <img src="{{ asset('img/voortgang3.PNG') }}" class="h-64 w-[1000px] object-cover" alt="Leeruitkomsten en Niveau's Afbeelding">
                </div>
            </div>

            <!-- Vakken en Modules met afbeelding links -->
            <h4 class="text-2xl mb-4 text-black">Vakken en Modules</h4>
            <div class="lg:flex lg:flex-row-reverse lg:justify-between lg:items-start mb-8">
                <!-- Tekstgedeelte -->
                <div class="lg:w-1/2 mb-8 lg:mb-0">
                    <p>
                        Alle leeruitkomsten zijn verdeeld over verschillende vakken, die op hun beurt zijn onderverdeeld in modules. In een periode worden verschillende vakken gegeven, en binnen elk vak worden verschillende modules behandeld. Elke module bestaat uit opdrachten die zijn gekoppeld aan een leeruitkomst op een specifiek niveau. Deze structuur zorgt ervoor dat studenten hun vaardigheden geleidelijk kunnen opbouwen en zich goed kunnen voorbereiden op de examens.
                    </p>
                </div>
                <!-- Afbeeldingsgedeelte links -->
                <div class="lg:w-1/2 flex justify-center">
                    <img src="{{ asset('img/voortgang2.PNG') }}" class="h-64 w-[1000px] object-cover" alt="Vakken en Modules Afbeelding">
                </div>
            </div>

            <!-- Perioden en Voortgang met afbeelding rechts -->
            <h4 class="text-2xl mb-4 text-black">Perioden en Voortgang</h4>
            <div class="lg:flex lg:justify-between lg:items-start mb-8">
                <!-- Tekstgedeelte -->
                <div class="lg:w-1/2 mb-8 lg:mb-0">
                    <p>
                        De opleiding is opgedeeld in verschillende periodes. In elke periode werk je aan vakken en modules met specifieke opdrachten. Als je alle opdrachten in een periode hebt afgerond en ze als voldoende zijn beoordeeld, wordt die periode gemarkeerd als 'groen'. Het is belangrijk om alle periodes succesvol af te ronden, zodat je goed voorbereid bent op de examens en uiteindelijk je diploma kunt behalen. De voortgangschecklist helpt je om precies te zien waar je staat en welke onderdelen nog aandacht nodig hebben.
                    </p>
                </div>
                <!-- Afbeeldingsgedeelte rechts -->
                <div class="lg:w-1/2 flex justify-center">
                    <img src="{{ asset('img/voortgang1.PNG') }}" class="h-64 w-[1000px] object-cover" alt="Perioden en Voortgang Afbeelding">
                </div>
            </div>

            <h4 class="text-2xl mb-4 text-black">Flexibel en Praktijkgericht Onderwijs</h4>
            <p class="mb-5">
                Ons doel is om het onderwijs zo flexibel en praktijkgericht mogelijk te maken. Dit biedt studenten de ruimte om hun eigen tempo te bepalen, afhankelijk van hun persoonlijke voortgang en leerbehoeften. Studenten kunnen op verschillende manieren aantonen dat ze bepaalde vaardigheden beheersen, waardoor leeruitkomsten per student kunnen verschillen. De voortgangschecklist wordt hierdoor afgestemd op de individuele prestaties. Onze nauwe samenwerking met het bedrijfsleven zorgt ervoor dat de opdrachten en modules goed aansluiten op de praktijk, zodat studenten direct relevante vaardigheden ontwikkelen die hen voorbereiden op hun toekomstige carrière.
            </p>

            <h4 class="text-2xl mb-4 text-black">Volg je Voortgang en Bereid je voor op Succes!</h4>
            <p class="mb-5">
                Met de Voortgangschecklist weet je altijd precies waar je staat. Werk stap voor stap aan je opdrachten, rond je periodes af en zorg ervoor dat je klaar bent voor de examens. Samen helpen we je om je doelen te bereiken en een succesvolle toekomst op te bouwen in de IT-wereld!
            </p>
        </div>
    </div>
@endsection
