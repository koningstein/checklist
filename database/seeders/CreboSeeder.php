<?php

namespace Database\Seeders;

use App\Models\Crebo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Crebo::factory(5)->create();

        $crebos = [
            [
                'crebonr' => '25604',
                'name' => 'Software developer',
                'description' => "Software ontwikkeling is een specialistisch vak. Desondanks dient de Software developer zich heel breed te oriënteren als het gaat om kennis en vaardigheden (zoals werkmethodieken, programmeertalen en de diverse informatiesystemen en platformen waar de programmatuur werkend moet zijn). Bovendien moet hij/zij breed onderlegd zijn daar waar het gaat om de enorme diversiteit aan mogelijke software en devices waar hij/zij mee te maken krijgt. Denk hierbij bijvoorbeeld aan het ontwikkelen van webbased software, websites, toepassingssoftware, games en andere entertainmentsoftware en media-uitingen.

De Software developer werkt voornamelijk zelfstandig aan het realiseren van software. De eindverantwoordelijkheid voor het eindproduct ligt vaak bij de projectleider of leidinggevende. In veel gevallen werkt hij/zij samen met andere disciplines, zoals andere developers en designers. Gedurende het ontwikkelproces heeft hij/zij bovendien regelmatig contact met de opdrachtgever/ leidinggevende/ belanghebbenden, wat specifieke eisen stelt aan communicatieve vaardigheden.

De Software developer werkt in vrijwel alle sectoren van de economie, zoals de brede ICT-sector, game-industrie, de creatieve sector, de logistieke sector, de mobiliteitsbranche, de maakindustrie, de zorg en nog veel meer. Binnen de sector waar hij/zij gaat werken moet hij/zij tevens breed onderlegd zijn met de voor die sector belangrijke ondersteunende kennis. Veelal is de beginnend beroepsbeoefenaar werkzaam in het midden- en kleinbedrijf.

Het is van essentieel belang dat de Software developer de privacy van klanten, opdrachtgevers, en van alle (toekomstige) gebruikers van de software beschermt. Daarnaast moet software veilig zijn en beschermd zijn tegen oneigenlijk of crimineel gebruik."
            ],
            [
                'crebonr' => '25605',
                'name' => 'Allround medewerker IT systems and devices',
                'description' => "De Allround medewerker IT systems and devices werkt zelfstandig op een ICT afdeling of in een servicedeskomgeving. Hij/zij werkt volgens standaard procedures en methodes en toont binnen vastgestelde kaders, eigen inzicht en initiatief. Hij/zij heeft goede communicatieve vaardigheden en werkt klantgericht."
            ],
            [
                'crebonr' => '25606',
                'name' => 'Expert IT systems and devices',
                'description' => "De Expert IT systems and devices werkt zelfstandig op de ICT afdeling van een organisatie of in een servicedeskomgeving. Hij/zij heeft oog voor de organisatie en bezit een helikopterview. Hij/zij communiceert met alle betrokkenen.

Naast het beheren van de IT infrastructuur, applicaties en devices houdt de Expert IT systems and devices zich bezig met het beveiligen van informatiesystemen. Hij/zij geeft security advies, verbetert de security van systemen en reageert op cybersecurity aanvallen. Ook heeft de Expert IT systems and devices een rol bij het communiceren over wensen van opdrachtgevers en het vertalen van deze wensen naar aanpassingen of vernieuwingen in de IT infrastructuur of applicaties. Het kunnen werken met databases en programmeerervaring speelt hierin een rol."
            ],
            [
                'crebonr' => '25607',
                'name' => 'Medewerker ICT support',
                'description' => "De Medewerker ICT support werkt in opdracht en onder begeleiding van een leidinggevende. Hij/zij werkt in een weinig complexe omgeving en voert eenvoudige taken, routinematige en standaardwerkzaamheden uit. Hij/zij houdt zich daarbij strikt aan de geldende regels, instructies en procedures. Wanneer iets afwijkt van de opdracht overlegt hij/zij direct met de leidinggevende.

De Medewerker ICT support werkt op het gebied van hardware en devices. Het gaat bijvoorbeeld om het aanleggen, installeren en configureren van hardware en/of netwerken en het oplossen van storingen. Met betrekking tot devices voert de Medewerker ICT support activiteiten uit op het vlak van assemblage, reparatie, verlenen van service, geven van uitleg en (in sommige branches) verkoop van devices (zoals mobiele telefoons, tablets, laptops/notebooks, desktops, IoT devices, smart home devices, AV-apparatuur, VR/AR-devices en drones)."
            ],
            [
                'crebonr' => '25998',
                'name' => 'Software developer',
                'description' => "De Software developer is klantgericht, kritisch, analytisch, inventief en flexibel. Daarnaast kan de beginnend beroepsoefenaar goed samenwerken in multidisciplinaire teams én communiceren met mensen op alle niveaus. De software developer werkt nauwkeurig, heeft doorzettingsvermogen en kan goed omgaan met tijdsdruk. Het juist interpreteren van gegevens is voor de Software developer van groot belang, evenals probleemoplossend en bedrijfsgericht denken. De Software developer moet initiatief kunnen nemen en goed onderbouwd kunnen adviseren en organiseren binnen de richtlijnen van het bedrijf.

Software ontwikkeling is een specialistisch vak. Desondanks dient de Software developer zich heel breed te oriënteren als het gaat om kennis en vaardigheden (zoals werkmethodieken, programmeertalen en de diverse informatiesystemen en platformen waar de programmatuur werkend moet zijn). Bovendien moet de beginnend beroepsoefenaar breed onderlegd zijn daar waar het gaat om de enorme diversiteit aan mogelijke software en devices. Denk hierbij aan het ontwikkelen van webbased software, websites, toepassingssoftware, games en andere entertainmentsoftware en media-uitingen. De beginnend beroepsoefenaar is breed onderlegd met de voor de sector belangrijke ondersteunende kennis.

De Software developer werkt (samen of alleen) aan het realiseren van software. De eindverantwoordelijkheid voor het eindproduct ligt vaak bij de projectleider of leidinggevende. In veel gevallen wordt er samengewerkt met andere disciplines, zoals andere developers en designers. Gedurende het ontwikkelproces heeft de beginnend beroepsoefenaar regelmatig contact met de opdrachtgever/ leidinggevende/ belanghebbenden, wat specifieke eisen stelt aan communicatieve vaardigheden.

Het is van essentieel belang dat de Software developer de privacy van klanten, opdrachtgevers, en van alle (toekomstige) gebruikers van de software beschermt. Daarnaast moet software veilig zijn en beschermd zijn tegen oneigenlijk of crimineel gebruik."
            ],
            [
                'crebonr' => '25999',
                'name' => 'Medewerker ICT',
                'description' => "De Medewerker ICT helpt graag mensen en is gemotiveerd om diens werkzaamheden zo zelfstandig mogelijk uit te voeren. Daarbij werkt die netjes, veilig, en zorgvuldig. De Medewerker ICT beseft goed dat diens handelen gevolgen heeft voor de werkuitvoering van anderen. Die kan samenwerken, werkt nauwkeurig, heeft doorzettingsvermogen, is oplossingsgericht en kan goed omgaan met tijdsdruk. Kunnen werken volgens kwaliteitscriteria, procedures en een goede planning maken, is essentieel voor de Medewerker ICT. De Medewerker ICT stelt zich dienstverlenend op. Het veelvuldige contact met de opdrachtgever en/of gebruikers (welke een heel diverse achtergrond kunnen hebben) vereisen goede communicatieve vaardigheden."
            ],
            [
                'crebonr' => '27015',
                'name' => 'ICT support technician',
                'description' => ''
            ],
            [
                'crebonr' => '27016',
                'name' => 'ICT system engineer',
                'description' => "De ICT system engineer werkt zelfstandig op de ICT-afdeling van een organisatie of in een servicedeskomgeving. De ICT system engineer heeft oog voor de organisatie en bezit een helikopterview. De ICT system engineer handelt op een hoger analytisch niveau in alle kerntaken, is proactief en analytisch.

Een belangrijk aandachtspunt in het werk van de ICT system engineer is security. Hierbij gaat het zowel om de beveiliging van systemen als om de reactie op cybersecurityaanvallen. De ICT system engineer vormt daarnaast een schakel tussen de wensen van opdrachtgevers en het vertalen van deze wensen naar aanpassingen of vernieuwingen in de ICT-infrastructuur of applicaties. Het kunnen werken met data en het kunnen programmeren spelen hierin een rol."
            ]
        ];





        foreach ($crebos as $crebo) {
            Crebo::create($crebo);
        }
    }
}
