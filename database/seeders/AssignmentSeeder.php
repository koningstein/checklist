<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Module;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Assignment::factory(20)->create();
        $assignments = [
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'number' => 'PROG OOP 01 - 01', 'name' => '1.01 Begrip van Classes', 'description' => 'Wat is een class en hoe maak je deze', 'duedate' => Carbon::create(2024, 9, 13, 16, 0, 0)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'number' => 'PROG OOP 01 - 02', 'name' => '1.02 Objecten Maken', 'description' => 'Hoe maak je objecten in PHP', 'duedate' => Carbon::create(2024, 9, 13, 16, 0, 0)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'number' => 'PROG OOP 01 - 03', 'name' => '1.03 Werken met Eigenschappen', 'description' => 'Eigenschappen van een object. Public benaderen', 'duedate' => Carbon::create(2024, 9, 13, 16, 0, 0)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'number' => 'PROG OOP 01 - 04', 'name' => '1.04 Methodes in Classes', 'description' => 'Wat is een methode en waarvoor gebruik je deze', 'duedate' => Carbon::create(2024, 9, 13, 16, 0, 0)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'number' => 'PROG OOP 01 - 05', 'name' => '1.05 Introductie tot Namespaces', 'description' => 'Voorbeeld gebruik mappen. Class met zelfde naam met namespaces te onderscheiden', 'duedate' => Carbon::create(2024, 9, 13, 16, 0, 0)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'number' => 'PROG OOP 01 - 06', 'name' => '1.06 Gebruik van Namespaces', 'description' => 'Gebruik van use en alias', 'duedate' => Carbon::create(2024, 9, 20, 16, 0, 0)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'number' => 'PROG OOP 01 - 07', 'name' => '1.07 Implementeren van Setters', 'description' => 'Hoe gebruiken we een methode om gegevens in een property te zetten', 'duedate' => Carbon::create(2024, 9, 20, 16, 0, 0)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'number' => 'PROG OOP 01 - 08', 'name' => '1.08 Constructor Functionaliteit', 'description' => 'Automatisch uitvoeren wanneer object wordt aangemaakt', 'duedate' => Carbon::create(2024, 9, 20, 16, 0, 0)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'number' => 'PROG OOP 01 - 09', 'name' => '1.09 Gebruik van Named Arguments', 'description' => 'Bij gebruik van named arguments maakt volgorde niet meer uit', 'duedate' => Carbon::create(2024, 9, 20, 16, 0, 0)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'number' => 'PROG OOP 01 - 10', 'name' => '1.10 Constructor Promoted Properties', 'description' => 'Properties binnen constructor aanmaken en vullen', 'duedate' => Carbon::create(2024, 9, 20, 16, 0, 0)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'number' => 'PROG OOP 01 - 11', 'name' => '1.11 Implementeren van Getters', 'description' => 'Methode om gegevens uit properties te halen, formatten naar hoe je het wil en returnen', 'duedate' => Carbon::create(2024, 9, 27, 16, 0, 0)],

            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'number' => 'PROG OOP 02 - 01', 'name' => '2.1 Doc Blocks en Type Hinting', 'description' => 'Documentatie over code, welke datatype verwacht je', 'duedate' => Carbon::create(2024, 9, 27, 16, 0, 0)],
            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'number' => 'PROG OOP 02 - 02', 'name' => '2.2 Type Hinting bij Argumenten', 'description' => 'Datatypes gebruiken bij argumenten waardoor je werkelijk de correcte datatype moet gebruiken', 'duedate' => Carbon::create(2024, 9, 27, 16, 0, 0)],
            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'number' => 'PROG OOP 02 - 03', 'name' => '2.3 Eigenschap Type Declaraties', 'description' => 'Niet alleen bij argumenten maar ook datatype gebruiken bij je properties', 'duedate' => Carbon::create(2024, 9, 27, 16, 0, 0)],
            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'number' => 'PROG OOP 02 - 04', 'name' => '2.4 Class Type Declaraties', 'description' => 'Naast de primaire datatypes zoals int en string kan een datatype ook van een bepaalde class zijn (dus een object)', 'duedate' => Carbon::create(2024, 9, 27, 16, 0, 0)],
            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'number' => 'PROG OOP 02 - 05', 'name' => '2.5 Debugging Technieken', 'description' => 'Hoe doorloop je code met debuggen. Step into, Step out, Step over.', 'duedate' => Carbon::create(2024, 9, 27, 16, 0, 0)],
            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'number' => 'PROG OOP 02 - 06', 'name' => '2.6 Begrip van Zichtbaarheid: Private Eigenschappen', 'description' => 'Niet meer toegankelijk buiten class. Dan heb je sowieso methodes nodig', 'duedate' => Carbon::create(2024, 9, 27, 16, 0, 0)],
            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'number' => 'PROG OOP 02 - 07', 'name' => '2.7 Begrip van Zichtbaarheid: Private Methodes', 'description' => 'Ook voor methoden kan het. Alleen wanneer een andere methode binnen dezelfde class deze dan mag gebruiken', 'duedate' => Carbon::create(2024, 9, 27, 16, 0, 0)],

            ['module_name' => 'OOP 03: PHP en Webintegratie', 'number' => 'PROG OOP 03 - 01', 'name' => '3.1 Layout Ontwerp met Bootstrap', 'description' => 'Gebruik van Bootstrap voor layout ontwerp', 'duedate' => Carbon::create(2024, 10, 4, 16, 0, 0)],
            ['module_name' => 'OOP 03: PHP en Webintegratie', 'number' => 'PROG  03 - 02', 'name' => '3.2 Formulieren en OOP', 'description' => 'Formulieren maken en hanteren met OOP', 'duedate' => Carbon::create(2024, 10, 4, 16, 0, 0)],
            ['module_name' => 'OOP 03: PHP en Webintegratie', 'number' => 'PROG OOP 03 - 03', 'name' => '3.3 Omgaan met POST Requests', 'description' => 'Hoe POST requests op te vangen en te verwerken', 'duedate' => Carbon::create(2024, 10, 4, 16, 0, 0)],
            ['module_name' => 'OOP 03: PHP en Webintegratie', 'number' => 'PROG OOP 03 - 04', 'name' => '3.4 Objecten Opslaan met SESSION', 'description' => 'Hoe objecten in sessies op te slaan', 'duedate' => Carbon::create(2024, 10, 4, 16, 0, 0)],
            ['module_name' => 'OOP 03: PHP en Webintegratie', 'number' => 'PROG OOP 03 - 05', 'name' => '3.5 Navigeren met $_GET', 'description' => 'Navigeren tussen pagina’s met behulp van $_GET', 'duedate' => Carbon::create(2024, 10, 4, 16, 0, 0)],
            ['module_name' => 'OOP 03: PHP en Webintegratie', 'number' => 'PROG OOP 03 - 06', 'name' => '3.6 Method Chaining', 'description' => 'Verkrijgen van studentnamen met method chaining', 'duedate' => Carbon::create(2024, 10, 4, 16, 0, 0)],

            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'number' => 'PROG OOP 04 - 01', 'name' => '4.1 Introductie tot Overerving', 'description' => 'Voorbeeld wanneer je eigenlijk 2 classes nodig hebt met wat overeenkomsten', 'duedate' => Carbon::create(2024, 11, 8, 16, 0, 0)],
            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'number' => 'PROG OOP 04 - 02', 'name' => '4.2 Dupliceren van Classes', 'description' => 'Van 1 class 2 classes maken', 'duedate' => Carbon::create(2024, 11, 8, 16, 0, 0)],
            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'number' => 'PROG OOP 04 - 03', 'name' => '4.3 Toepassen van Overerving', 'description' => 'Oplossen van de 2 classes met overeenkomsten door parent/child te maken', 'duedate' => Carbon::create(2024, 11, 8, 16, 0, 0)],
            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'number' => 'PROG OOP 04 - 04', 'name' => '4.4 Gebruik van Protected Eigenschappen', 'description' => 'Hoe zorgen we ervoor dat properties alleen in eigen class en childs gebruikt kunnen worden, niet erbuiten', 'duedate' => Carbon::create(2024, 11, 8, 16, 0, 0)],
            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'number' => 'PROG OOP 04 - 05', 'name' => '4.5 Gebruik van Protected Methodes', 'description' => 'Ook methodes alleen in eigen class en child', 'duedate' => Carbon::create(2024, 11, 8, 16, 0, 0)],
            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'number' => 'PROG OOP 04 - 06', 'name' => '4.6 Constructors en Overerving', 'description' => 'Welke constructor wordt uitgevoerd. Hoe zorg je dat beide constructors worden uitgevoerd', 'duedate' => Carbon::create(2024, 11, 22, 16, 0, 0)],
            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'number' => 'PROG OOP 04 - 07', 'name' => '4.7 Overschrijven van Parent Methodes', 'description' => 'Methode van parent class wordt overschreven door child class', 'duedate' => Carbon::create(2024, 11, 22, 16, 0, 0)],

            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'number' => 'PROG OOP 05 - 01', 'name' => '5.1 Eenvoudig Autoloaden', 'description' => 'Inlezen van mappen', 'duedate' => Carbon::create(2024, 11, 22, 16, 0, 0)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'number' => 'PROG OOP 05 - 02', 'name' => '5.2 Autoloaden met Namespaces', 'description' => 'Gebruik van autoload met namespaces', 'duedate' => Carbon::create(2024, 11, 22, 16, 0, 0)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'number' => 'PROG OOP 05 - 03', 'name' => '5.3 Introductie tot Composer', 'description' => 'Composer installatie en gebruik', 'duedate' => Carbon::create(2024, 11, 29, 16, 0, 0)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'number' => 'PROG OOP 05 - 04', 'name' => '5.4 Autoloaden met Composer', 'description' => 'Gebruik autoload en psr-4 met Composer', 'duedate' => Carbon::create(2024, 11, 29, 16, 0, 0)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'number' => 'PROG OOP 05 - 05', 'name' => '5.5 Gebruik van PhpStan', 'description' => 'Codestyling fouten krijgen in terminal met PhpStan', 'duedate' => Carbon::create(2024, 11, 29, 16, 0, 0)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'number' => 'PROG OOP 05 - 06', 'name' => '5.6 Introductie tot Smarty', 'description' => 'Gebruik van Smarty template engine', 'duedate' => Carbon::create(2024, 11, 29, 16, 0, 0)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'number' => 'PROG OOP 05 - 07', 'name' => '5.7 Gebruik van Master Pages', 'description' => 'Gebruik van master pages in je project', 'duedate' => Carbon::create(2024, 12, 6, 16, 0, 0)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'number' => 'PROG OOP 05 - 08', 'name' => '5.8 Data Doorgeven aan Layouts', 'description' => 'Data doorgeven aan layouts voor rendering', 'duedate' => Carbon::create(2024, 12, 6, 16, 0, 0)],

            ['module_name' => 'OOP 06: Abstracte Classes en Static', 'number' => 'PROG OOP 06 - 01', 'name' => '6.1 Maken van Abstracte Classes', 'description' => 'Hoe maak je abstracte classes in PHP', 'duedate' => Carbon::create(2024, 12, 13, 16, 0, 0)],
            ['module_name' => 'OOP 06: Abstracte Classes en Static', 'number' => 'PROG OOP 06 - 02', 'name' => '6.2 Implementeren van Abstracte Methodes', 'description' => 'Hoe implementeer je abstracte methodes in PHP', 'duedate' => Carbon::create(2024, 12, 13, 16, 0, 0)],
            ['module_name' => 'OOP 06: Abstracte Classes en Static', 'number' => 'PROG OOP 06 - 03', 'name' => '6.3 Uitbreiden van Abstracte Classes', 'description' => 'Wat als je de child van een abstracte class ook abstract is?', 'duedate' => Carbon::create(2024, 12, 13, 16, 0, 0)],
            ['module_name' => 'OOP 06: Abstracte Classes en Static', 'number' => 'PROG OOP 06 - 04', 'name' => '6.4 Werken met Statische Eigenschappen', 'description' => 'Hoe gebruik je statische eigenschappen in PHP', 'duedate' => Carbon::create(2024, 12, 20, 16, 0, 0)],
            ['module_name' => 'OOP 06: Abstracte Classes en Static', 'number' => 'PROG OOP 06 - 05', 'name' => '6.5 Werken met Statische Methodes', 'description' => 'Hoe gebruik je statische methodes in PHP', 'duedate' => Carbon::create(2024, 12, 20, 16, 0, 0)],
            ['module_name' => 'OOP 06: Abstracte Classes en Static', 'number' => 'PROG OOP 06 - 06', 'name' => '6.6 Lijst Classes vs Statische Eigenschappen', 'description' => 'Andere manier om studenten in een lijst te zetten', 'duedate' => Carbon::create(2024, 12, 20, 16, 0, 0)],

            ['module_name' => 'OOP 07: Database integratie', 'number' => 'PROG OOP 07 - 01', 'name' => '7.01 Gebruikersregistratie', 'description' => 'Hoe implementeer je gebruikersregistratie in PHP', 'duedate' => Carbon::create(2025, 1, 24, 16, 0, 0)],
            ['module_name' => 'OOP 07: Database integratie', 'number' => 'PROG OOP 07 - 02', 'name' => '7.02 Gebruik van Statische & Session', 'description' => 'Hoe gebruik je statische methodes en session in PHP', 'duedate' => Carbon::create(2025, 1, 24, 16, 0, 0)],
            ['module_name' => 'OOP 07: Database integratie', 'number' => 'PROG OOP 07 - 03', 'name' => '7.03 Maken van een Interface', 'description' => 'Hoe maak je een interface voor database interactie', 'duedate' => Carbon::create(2025, 1, 24, 16, 0, 0)],
            ['module_name' => 'OOP 07: Database integratie', 'number' => 'PROG OOP 07 - 04', 'name' => '7.04 Implementeren van Interfaces', 'description' => 'Hoe implementeer je interfaces in PHP', 'duedate' => Carbon::create(2025, 1, 24, 16, 0, 0)],
            ['module_name' => 'OOP 07: Database integratie', 'number' => 'PROG OOP 07 - 05', 'name' => '7.05 Insert Methodes', 'description' => 'Hoe implementeer je insert methodes in PHP', 'duedate' => Carbon::create(2025, 1, 24, 16, 0, 0)],
            ['module_name' => 'OOP 07: Database integratie', 'number' => 'PROG OOP 07 - 06', 'name' => '7.06 Gebruik van Insert bij Registratie', 'description' => 'Hoe gebruik je insert methodes bij gebruikersregistratie', 'duedate' => Carbon::create(2025, 1, 24, 16, 0, 0)],
            ['module_name' => 'OOP 07: Database integratie', 'number' => 'PROG OOP 07 - 07', 'name' => '7.07 Eenvoudige Select Methode', 'description' => 'Hoe implementeer je een eenvoudige select methode in PHP', 'duedate' => Carbon::create(2025, 1, 31, 16, 0, 0)],
            ['module_name' => 'OOP 07: Database integratie', 'number' => 'PROG OOP 07 - 08', 'name' => '7.08 Tabellen Maken vanuit Select Data', 'description' => 'Hoe maak je tabellen vanuit select data', 'duedate' => Carbon::create(2025, 1, 31, 16, 0, 0)],
            ['module_name' => 'OOP 07: Database integratie', 'number' => 'PROG OOP 07 - 09', 'name' => '7.09 Uitbreiden van de Select Methode', 'description' => 'Hoe breid je de select methode uit in PHP', 'duedate' => Carbon::create(2025, 1, 31, 16, 0, 0)],
            ['module_name' => 'OOP 07: Database integratie', 'number' => 'PROG OOP 07 - 10', 'name' => '7.10 Update Methodes', 'description' => 'Hoe implementeer je update methodes in PHP', 'duedate' => Carbon::create(2025, 1, 31, 16, 0, 0)],
            ['module_name' => 'OOP 07: Database integratie', 'number' => 'PROG OOP 07 - 11', 'name' => '7.11 Gebruik van Update Methodes', 'description' => 'Hoe gebruik je update methodes in PHP', 'duedate' => Carbon::create(2025, 1, 31, 16, 0, 0)],
            ['module_name' => 'OOP 07: Database integratie', 'number' => 'PROG OOP 07 - 12', 'name' => '7.12 Delete Methodes', 'description' => 'Hoe implementeer je delete methodes in PHP', 'duedate' => Carbon::create(2025, 1, 31, 16, 0, 0)],
            ['module_name' => 'OOP 07: Database integratie', 'number' => 'PROG OOP 07 - 13', 'name' => '7.13 Gebruik van Delete Methodes', 'description' => 'Hoe gebruik je delete methodes in PHP', 'duedate' => Carbon::create(2025, 1, 31, 16, 0, 0)],

            ['module_name' => 'Design Pattern Basis - database', 'number' => 'PROG DES 01 - 01', 'name' => 'Opdracht 01: model & migration', 'description' => 'Maak een model en een migration in Laravel.', 'duedate' => Carbon::create(2025, 3, 14, 16, 0, 0)],
            ['module_name' => 'Design Pattern Basis - database', 'number' => 'PROG DES 01 - 02', 'name' => 'Opdracht 02: factory & seed', 'description' => 'Gebruik factories en seeds om testdata te maken.', 'duedate' => Carbon::create(2025, 3, 14, 16, 0, 0)],
            ['module_name' => 'Design Pattern Basis - layout', 'number' => 'PROG DES 01 - 03', 'name' => 'Opdracht 03: lay-out admin masterpage', 'description' => 'Ontwerp een admin lay-out met een masterpage in Tailwind CSS.', 'duedate' => Carbon::create(2025, 3, 14, 16, 0, 0)],
            ['module_name' => 'Design Pattern Basis - resource controller', 'number' => 'PROG DES 01 - 04', 'name' => 'Opdracht 04: resource controller index', 'description' => 'Maak een resource controller met een index methode in Laravel.', 'duedate' => Carbon::create(2025, 3, 14, 16, 0, 0)],
            ['module_name' => 'Design Pattern Basis - resource controller', 'number' => 'PROG DES 01 - 05', 'name' => 'Opdracht 05: resource controller create & store', 'description' => 'Voeg create en store methoden toe aan je resource controller.', 'duedate' => Carbon::create(2025, 3, 14, 16, 0, 0)],
            ['module_name' => 'Design Pattern Basis - resource controller', 'number' => 'PROG DES 01 - 06', 'name' => 'Opdracht 06: resource controller store validatie', 'description' => 'Implementeer validatie in de store methode van je resource controller.', 'duedate' => Carbon::create(2025, 3, 21, 16, 0, 0)],
            ['module_name' => 'Design Pattern Basis - resource controller', 'number' => 'PROG DES 01 - 07', 'name' => 'Opdracht 07: resource controller show', 'description' => 'Voeg een show methode toe aan je resource controller.', 'duedate' => Carbon::create(2025, 3, 21, 16, 0, 0)],
            ['module_name' => 'Design Pattern Basis - resource controller', 'number' => 'PROG DES 01 - 08', 'name' => 'Opdracht 08: resource controller edit & update', 'description' => 'Voeg edit en update methoden toe aan je resource controller.', 'duedate' => Carbon::create(2025, 3, 21, 16, 0, 0)],
            ['module_name' => 'Design Pattern Basis - resource controller', 'number' => 'PROG DES 01 - 09', 'name' => 'Opdracht 09: resource controller delete & destroy', 'description' => 'Voeg delete en destroy methoden toe aan je resource controller.', 'duedate' => Carbon::create(2025, 3, 21, 16, 0, 0)],
            ['module_name' => 'Design Pattern Basis - publieke pagina', 'number' => 'PROG DES 01 - 10', 'name' => 'Opdracht 10: public lay-out', 'description' => 'Maak een lay-out voor een publieke pagina.', 'duedate' => Carbon::create(2025, 3, 21, 16, 0, 0)],
            ['module_name' => 'Design Pattern Basis - publieke pagina', 'number' => 'PROG DES 01 - 11', 'name' => 'Opdracht 11: publieke projects pagina', 'description' => 'Maak een publieke pagina voor projectweergave.', 'duedate' => Carbon::create(2025, 3, 21, 16, 0, 0)],

            ['module_name' => 'Design Pattern Adv - rollen & permissies', 'number' => 'PROG DES 02 - 12', 'name' => 'Opdracht 12: roles & permissies', 'description' => 'Implementeer rollen en permissies met de laravel-permissions package.', 'duedate' => Carbon::create(2025, 3, 28, 16, 0, 0)],
            ['module_name' => 'Design Pattern Adv - rollen & permissies', 'number' => 'PROG DES 02 - 13', 'name' => 'Opdracht 13 : Aanmaken van Users', 'description' => 'Maak nieuwe gebruikers aan en wijs rollen toe.', 'duedate' => Carbon::create(2025, 3, 28, 16, 0, 0)],
            ['module_name' => 'Design Pattern Adv - rollen & permissies', 'number' => 'PROG DES 02 - 14', 'name' => 'Opdracht 14: Middleware bij Routes', 'description' => 'Gebruik middleware om routes te beveiligen met rollen en permissies.', 'duedate' => Carbon::create(2025, 3, 28, 16, 0, 0)],
            ['module_name' => 'Design Pattern Adv - rollen & permissies', 'number' => 'PROG DES 02 - 15', 'name' => 'Opdracht 15: Rolgebaseerde Toegang tot Projectbeheer', 'description' => 'Implementeer rolgebaseerde toegang voor projectbeheer.', 'duedate' => Carbon::create(2025, 3, 28, 16, 0, 0)],

            ['module_name' => 'Design Pattern Adv - database', 'number' => 'PROG DES 02 - 16', 'name' => 'Opdracht 16: activities & tasks models & migrations', 'description' => 'Maak modellen en migrations voor activities en tasks.', 'duedate' => Carbon::create(2025, 3, 28, 16, 0, 0)],
            ['module_name' => 'Design Pattern Adv - database', 'number' => 'PROG DES 02 - 17', 'name' => 'Opdracht 17: activities & tasks factory', 'description' => 'Maak factories voor het genereren van testdata voor activities en tasks.', 'duedate' => Carbon::create(2025, 3, 28, 16, 0, 0)],
            ['module_name' => 'Design Pattern Adv - database', 'number' => 'PROG DES 02 - 18', 'name' => 'Opdracht 18: activities & tasks seeds', 'description' => 'Seed de database met testdata voor activities en tasks.', 'duedate' => Carbon::create(2025, 3, 28, 16, 0, 0)],

            ['module_name' => 'Design Pattern Adv - resource controller', 'number' => 'PROG DES 02 - 19', 'name' => 'Opdracht 19: Index voor tasks', 'description' => 'Maak een index methode voor de task resource controller.', 'duedate' => Carbon::create(2025, 3, 28, 16, 0, 0)],
            ['module_name' => 'Design Pattern Adv - resource controller', 'number' => 'PROG DES 02 - 20', 'name' => 'Opdracht 20: Permissions voor Task Controller', 'description' => 'Voeg permissies toe voor de task resource controller.', 'duedate' => Carbon::create(2025, 4, 4, 16, 0, 0)],
            ['module_name' => 'Design Pattern Adv - resource controller', 'number' => 'PROG DES 02 - 21', 'name' => 'Opdracht 21: Create voor tasks', 'description' => 'Maak een create methode voor de task resource controller.', 'duedate' => Carbon::create(2025, 4, 4, 16, 0, 0)],
            ['module_name' => 'Design Pattern Adv - resource controller', 'number' => 'PROG DES 02 - 22', 'name' => 'Opdracht 22: Store & validatie voor tasks', 'description' => 'Voeg store en validatie methoden toe voor de task resource controller.', 'duedate' => Carbon::create(2025, 4, 4, 16, 0, 0)],
            ['module_name' => 'Design Pattern Adv - resource controller', 'number' => 'PROG DES 02 - 23', 'name' => 'Opdracht 23: Show voor tasks', 'description' => 'Maak een show methode voor de task resource controller.', 'duedate' => Carbon::create(2025, 4, 4, 16, 0, 0)],
            ['module_name' => 'Design Pattern Adv - resource controller', 'number' => 'PROG DES 02 - 24', 'name' => 'Opdracht 24: Edit voor tasks', 'description' => 'Maak een edit methode voor de task resource controller.', 'duedate' => Carbon::create(2025, 4, 4, 16, 0, 0)],
            ['module_name' => 'Design Pattern Adv - resource controller', 'number' => 'PROG DES 02 - 25', 'name' => 'Opdracht 25: Update voor tasks met validatie', 'description' => 'Voeg update en validatie methoden toe voor de task resource controller.', 'duedate' => Carbon::create(2025, 4, 4, 16, 0, 0)],
            ['module_name' => 'Design Pattern Adv - resource controller', 'number' => 'PROG DES 02 - 26','name' => 'Opdracht 26: Delete voor tasks', 'description' => 'Maak een delete methode voor de task resource controller.', 'duedate' => Carbon::create(2025, 4, 4, 16, 0, 0)],
            ['module_name' => 'Design Pattern Adv - resource controller', 'number' => 'PROG DES 02 - 27', 'name' => 'Opdracht 27: Destroy voor tasks', 'description' => 'Maak een destroy methode voor de task resource controller.', 'duedate' => Carbon::create(2025, 4, 4, 16, 0, 0)],

            // Sitemap
            ['module_name' => 'Sitemap', 'number' => 'ONTW SIT 01a', 'name' => 'Opdracht 1a: Sitemap LearnEase', 'description' => 'Maak een sitemap voor LearnEase.', 'duedate' => Carbon::create(2024, 9, 13, 16, 0, 0)],
            ['module_name' => 'Sitemap', 'number' => 'ONTW SIT 01b', 'name' => 'Opdracht 1b: Sitemap EcoJourney', 'description' => 'Maak een sitemap voor EcoJourney.', 'duedate' => Carbon::create(2024, 9, 13, 16, 0, 0)],
            ['module_name' => 'Sitemap', 'number' => 'ONTW SIT 01c', 'name' => 'Opdracht 1c: Sitemap WanderHub', 'description' => 'Maak een sitemap voor WanderHub.', 'duedate' => Carbon::create(2024, 9, 13, 16, 0, 0)],
            ['module_name' => 'Sitemap', 'number' => 'ONTW SIT 01d', 'name' => 'Opdracht 1d: Sitemap WellnessWave', 'description' => 'Maak een sitemap voor WellnessWave.', 'duedate' => Carbon::create(2024, 9, 13, 16, 0, 0)],

            // Wireframe
            ['module_name' => 'Wireframe', 'number' => 'ONTW WIR 01a', 'name' => 'Wireframe opdracht 1a', 'description' => 'Maak een wireframe voor de opgegeven website.', 'duedate' => Carbon::create(2024, 9, 13, 16, 0, 0)],
            ['module_name' => 'Wireframe', 'number' => 'ONTW WIR 01b', 'name' => 'Wireframe opdracht 1b', 'description' => 'Maak een wireframe voor de opgegeven website.', 'duedate' => Carbon::create(2024, 9, 13, 16, 0, 0)],

            // ERD
            ['module_name' => 'ERD 1', 'number' => 'ONTW ERD 01a',  'name' => 'Opdracht 1a: ERD lezen', 'description' => 'Lees en begrijp het opgegeven ERD.', 'duedate' => Carbon::create(2024, 10, 4, 16, 0, 0)],
            ['module_name' => 'ERD 1', 'number' => 'ONTW ERD 01b', 'name' => 'Opdracht 1b: ERD lezen', 'description' => 'Lees en begrijp het opgegeven ERD.', 'duedate' => Carbon::create(2024, 10, 4, 16, 0, 0)],
            ['module_name' => 'ERD 1', 'number' => 'ONTW ERD 01c', 'name' => 'Opdracht 1c: ERD lezen', 'description' => 'Lees en begrijp het opgegeven ERD.', 'duedate' => Carbon::create(2024, 10, 4, 16, 0, 0)],
            ['module_name' => 'ERD 1', 'number' => 'ONTW ERD 01d', 'name' => 'Opdracht 1d: ERD lezen', 'description' => 'Lees en begrijp het opgegeven ERD.', 'duedate' => Carbon::create(2024, 10, 4, 16, 0, 0)],

            ['module_name' => 'ERD 2', 'number' => 'ONTW ERD 02a', 'name' => 'Opdracht 2a: Herkennen entiteiten & attributen', 'description' => 'Herken entiteiten en attributen in het opgegeven ERD.', 'duedate' => Carbon::create(2024, 10, 11, 16, 0, 0)],
            ['module_name' => 'ERD 2', 'number' => 'ONTW ERD 02b', 'name' => 'Opdracht 2b: Herkennen entiteiten & attributen', 'description' => 'Herken entiteiten en attributen in het opgegeven ERD.', 'duedate' => Carbon::create(2024, 10, 11, 16, 0, 0)],
            ['module_name' => 'ERD 2', 'number' => 'ONTW ERD 02c', 'name' => 'Opdracht 2c: Herkennen entiteiten & attributen', 'description' => 'Herken entiteiten en attributen in het opgegeven ERD.', 'duedate' => Carbon::create(2024, 10, 11, 16, 0, 0)],
            ['module_name' => 'ERD 2', 'number' => 'ONTW ERD 02d', 'name' => 'Opdracht 2d: Herkennen entiteiten & attributen', 'description' => 'Herken entiteiten en attributen in het opgegeven ERD.', 'duedate' => Carbon::create(2024, 10, 11, 16, 0, 0)],

            ['module_name' => 'ERD 3', 'number' => 'ONTW ERD 03a', 'name' => 'Opdracht 3a: ERD TuneWave', 'description' => 'Maak een ERD voor TuneWave.', 'duedate' => Carbon::create(2024, 10, 18, 16, 0, 0)],
            ['module_name' => 'ERD 3', 'number' => 'ONTW ERD 03b', 'name' => 'Opdracht 3b: ERD FashionHub', 'description' => 'Maak een ERD voor FashionHub.', 'duedate' => Carbon::create(2024, 10, 18, 16, 0, 0)],
            ['module_name' => 'ERD 3', 'number' => 'ONTW ERD 03c', 'name' => 'Opdracht 3c: ERD Wanderlust Travels', 'description' => 'Maak een ERD voor Wanderlust Travels.', 'duedate' => Carbon::create(2024, 10, 18, 16, 0, 0)],
            ['module_name' => 'ERD 3', 'number' => 'ONTW ERD 03d', 'name' => 'Opdracht 3d: ERD HealthyCare', 'description' => 'Maak een ERD voor HealthyCare.', 'duedate' => Carbon::create(2024, 10, 18, 16, 0, 0)],

            ['module_name' => 'ERD 4', 'number' => 'ONTW ERD 04a', 'name' => 'Opdracht 4a: ERD Universiteit portaal', 'description' => 'Maak een ERD voor een universiteit portaal.', 'duedate' => Carbon::create(2024, 10, 25, 16, 0, 0)],
            ['module_name' => 'ERD 4', 'number' => 'ONTW ERD 04b', 'name' => 'Opdracht 4b: ERD Bibliotheek', 'description' => 'Maak een ERD voor een bibliotheek.', 'duedate' => Carbon::create(2024, 10, 25, 16, 0, 0)],
            ['module_name' => 'ERD 4', 'number' => 'ONTW ERD 04c', 'name' => 'Opdracht 4c: ERD Fitness tracking app', 'description' => 'Maak een ERD voor een fitness tracking app.', 'duedate' => Carbon::create(2024, 10, 25, 16, 0, 0)],
            ['module_name' => 'ERD 4',  'number' => 'ONTW ERD 04d','name' => 'Opdracht 4d: ERD Rentacar', 'description' => 'Maak een ERD voor Rentacar.', 'duedate' => Carbon::create(2024, 10, 25, 16, 0, 0)],

            ['module_name' => 'ERD 5', 'number' => 'ONTW ERD 05a', 'name' => 'Opdracht 5a: ERD FoodToGo', 'description' => 'Maak een ERD voor FoodToGo.', 'duedate' => Carbon::create(2024, 12, 6, 16, 0, 0)],
            ['module_name' => 'ERD 5', 'number' => 'ONTW ERD 05b', 'name' => 'Opdracht 5b: ERD EventPro', 'description' => 'Maak een ERD voor EventPro.', 'duedate' => Carbon::create(2024, 12, 6, 16, 0, 0)],
            ['module_name' => 'ERD 5', 'number' => 'ONTW ERD 05c', 'name' => 'Opdracht 5c: ERD Hotel Sunshine', 'description' => 'Maak een ERD voor Hotel Sunshine.', 'duedate' => Carbon::create(2024, 12, 6, 16, 0, 0)],
            ['module_name' => 'ERD 5', 'number' => 'ONTW ERD 05d', 'name' => 'Opdracht 5d: ERD MovieFlix', 'description' => 'Maak een ERD voor MovieFlix.', 'duedate' => Carbon::create(2024, 12, 6, 16, 0, 0)],

            ['module_name' => 'ERD 6', 'number' => 'ONTW ERD 06a', 'name' => 'Opdracht 6a: ERD Wheels-on Verhuurbedrijf', 'description' => 'Maak een ERD voor Wheels-on Verhuurbedrijf.', 'duedate' => Carbon::create(2025, 1, 24, 16, 0, 0)],
            ['module_name' => 'ERD 6', 'number' => 'ONTW ERD 06b', 'name' => 'Opdracht 6b: ERD ICT-CarPool Verhuur- en Carpooling Systeem', 'description' => 'Maak een ERD voor ICT-CarPool Verhuur- en Carpooling Systeem.', 'duedate' => Carbon::create(2025, 1, 24, 16, 0, 0)],
            ['module_name' => 'ERD 6', 'number' => 'ONTW ERD 06c', 'name' => 'Opdracht 6c: ERD Rijksmuseum', 'description' => 'Maak een ERD voor het Rijksmuseum.', 'duedate' => Carbon::create(2025, 1, 24, 16, 0, 0)],
            ['module_name' => 'ERD 6', 'number' => 'ONTW ERD 06d', 'name' => 'Opdracht 6d: ERD Erasmus universiteit', 'description' => 'Maak een ERD voor de Erasmus universiteit.', 'duedate' => Carbon::create(2025, 1, 24, 16, 0, 0)],
            ['module_name' => 'ERD 6', 'number' => 'ONTW ERD 06e', 'name' => 'Opdracht 6e: ERD Campus restaurants', 'description' => 'Maak een ERD voor de campus restaurants.', 'duedate' => Carbon::create(2025, 1, 24, 16, 0, 0)],

            // Flowchart
            ['module_name' => 'Flowchart 1', 'number' => 'ONTW FLO 01a', 'name' => 'Flowchart Opdracht 1a: simpele rekenmachine', 'description' => 'Maak een flowchart voor een simpele rekenmachine.', 'duedate' => Carbon::create(2024, 11, 1, 16, 0, 0)],
            ['module_name' => 'Flowchart 1', 'number' => 'ONTW FLO 01b', 'name' => 'Flowchart Opdracht 1b: Beoordeling cijfer', 'description' => 'Maak een flowchart voor een beoordelingssysteem.', 'duedate' => Carbon::create(2024, 11, 1, 16, 0, 0)],
            ['module_name' => 'Flowchart 1', 'number' => 'ONTW FLO 01c', 'name' => 'Flowchart Opdracht 1c: Winkelkortingen', 'description' => 'Maak een flowchart voor winkelkortingen.', 'duedate' => Carbon::create(2024, 11, 1, 16, 0, 0)],
            ['module_name' => 'Flowchart 1',  'number' => 'ONTW FLO 01d','name' => 'Flowchart Opdracht 1d: Steen Papier Schaar', 'description' => 'Maak een flowchart voor het spel steen papier schaar.', 'duedate' => Carbon::create(2024, 11, 1, 16, 0, 0)],

            ['module_name' => 'Flowchart 2', 'number' => 'ONTW FLO 02a', 'name' => 'Flowchart Opdracht 2a: Winkelwagenbeheer', 'description' => 'Maak een flowchart voor winkelwagenbeheer.', 'duedate' => Carbon::create(2025, 1, 7, 16, 0, 0)],
            ['module_name' => 'Flowchart 2', 'number' => 'ONTW FLO 02b', 'name' => 'Flowchart Opdracht 2b: Quiz app', 'description' => 'Maak een flowchart voor een quiz app.', 'duedate' => Carbon::create(2025, 1, 7, 16, 0, 0)],
            ['module_name' => 'Flowchart 2', 'number' => 'ONTW FLO 02c', 'name' => 'Flowchart Opdracht 2c: Toegangscontrole', 'description' => 'Maak een flowchart voor toegangscontrole.', 'duedate' => Carbon::create(2025, 1, 7, 16, 0, 0)],
            ['module_name' => 'Flowchart 2', 'number' => 'ONTW FLO 02d', 'name' => 'Flowchart Opdracht 2d: Temperatuurconverter', 'description' => 'Maak een flowchart voor een temperatuurconverter.', 'duedate' => Carbon::create(2025, 1, 7, 16, 0, 0)],

            ['module_name' => 'Flowchart 3', 'number' => 'ONTW FLO 03a', 'name' => 'Flowchart Opdracht 3a: Bestelling verwerken', 'description' => 'Maak een flowchart voor het verwerken van bestellingen.', 'duedate' => Carbon::create(2025, 2, 14, 16, 0, 0)],
            ['module_name' => 'Flowchart 3', 'number' => 'ONTW FLO 03b', 'name' => 'Flowchart Opdracht 3b: Weersvoorspelling', 'description' => 'Maak een flowchart voor een weersvoorspelling applicatie.', 'duedate' => Carbon::create(2025, 2, 14, 16, 0, 0)],
            ['module_name' => 'Flowchart 3', 'number' => 'ONTW FLO 03c', 'name' => 'Flowchart Opdracht 3c: Beoordeling van een examen', 'description' => 'Maak een flowchart voor de beoordeling van een examen.', 'duedate' => Carbon::create(2025, 2, 14, 16, 0, 0)],
            ['module_name' => 'Flowchart 3', 'number' => 'ONTW FLO 03d', 'name' => 'Flowchart Opdracht 3d: Product inventarisatie', 'description' => 'Maak een flowchart voor product inventarisatie.', 'duedate' => Carbon::create(2025, 2, 14, 16, 0, 0)],

            // Class diagram
            ['module_name' => 'Class Diagram 1', 'number' => 'ONTW CLA 01a', 'name' => 'Class diagram Opdracht 1a: Bibliotheek beheer systeem', 'description' => 'Maak een class diagram voor een bibliotheek beheer systeem.', 'duedate' => Carbon::create(2025, 1, 31, 16, 0, 0)],
            ['module_name' => 'Class Diagram 1', 'number' => 'ONTW CLA 01b', 'name' => 'Class diagram Opdracht 1b: E-commerce Bestelsysteem', 'description' => 'Maak een class diagram voor een e-commerce bestelsysteem.', 'duedate' => Carbon::create(2025, 1, 31, 16, 0, 0)],
            ['module_name' => 'Class Diagram 1', 'number' => 'ONTW CLA 01c', 'name' => 'Class diagram Opdracht 1c: Student Registratie Systeem', 'description' => 'Maak een class diagram voor een student registratie systeem.', 'duedate' => Carbon::create(2025, 1, 31, 16, 0, 0)],
            ['module_name' => 'Class Diagram 1', 'number' => 'ONTW CLA 01d', 'name' => 'Class diagram Opdracht 1d: Medisch Patiëntendossier Systeem', 'description' => 'Maak een class diagram voor een medisch patiëntendossier systeem.', 'duedate' => Carbon::create(2025, 1, 31, 16, 0, 0)],

            ['module_name' => 'Class Diagram 2', 'number' => 'ONTW CLA 02a','name' => 'Class diagram opdracht 2a: Online boekingssysteem voor evenementen', 'description' => 'Maak een class diagram voor een online boekingssysteem voor evenementen.', 'duedate' => Carbon::create(2025, 2, 7, 16, 0, 0)],
            ['module_name' => 'Class Diagram 2', 'number' => 'ONTW CLA 02b', 'name' => 'Class diagram opdracht 2b: Fitness Tracking App', 'description' => 'Maak een class diagram voor een fitness tracking app.', 'duedate' => Carbon::create(2025, 2, 7, 16, 0, 0)],
            ['module_name' => 'Class Diagram 2', 'number' => 'ONTW CLA 02c', 'name' => 'Class diagram opdracht 2c: Hotelreserveringssysteem', 'description' => 'Maak een class diagram voor een hotelreserveringssysteem.', 'duedate' => Carbon::create(2025, 2, 7, 16, 0, 0)],
            ['module_name' => 'Class Diagram 2', 'number' => 'ONTW CLA 02d', 'name' => 'Class diagram opdracht 2d: Social Media Platform', 'description' => 'Maak een class diagram voor een social media platform.', 'duedate' => Carbon::create(2025, 2, 7, 16, 0, 0)],

            ['module_name' => 'Class Diagram 3', 'number' => 'ONTW CLA 03a', 'name' => 'Class diagram opdracht 3a: Voertuigbeheer Systeem', 'description' => 'Maak een class diagram voor een voertuigbeheer systeem.', 'duedate' => Carbon::create(2025, 2, 14, 16, 0, 0)],
            ['module_name' => 'Class Diagram 3', 'number' => 'ONTW CLA 03b', 'name' => 'Class diagram opdracht 3b: Reisplanningsapplicatie', 'description' => 'Maak een class diagram voor een reisplanningsapplicatie.', 'duedate' => Carbon::create(2025, 2, 14, 16, 0, 0)],
            ['module_name' => 'Class Diagram 3', 'number' => 'ONTW CLA 03c', 'name' => 'Class diagram opdracht 3c: Restaurant Reserveringssysteem', 'description' => 'Maak een class diagram voor een restaurant reserveringssysteem.', 'duedate' => Carbon::create(2025, 2, 14, 16, 0, 0)],
            ['module_name' => 'Class Diagram 3', 'number' => 'ONTW CLA 03d', 'name' => 'Class diagram opdracht 3d: Online Leerplatform', 'description' => 'Maak een class diagram voor een online leerplatform.', 'duedate' => Carbon::create(2025, 2, 14, 16, 0, 0)],

            ['module_name' => 'Class Diagram 4', 'number' => 'ONTW CLA 04a', 'name' => 'Class diagram opdracht 4a: Project Management Tool', 'description' => 'Maak een class diagram voor een project management tool.', 'duedate' => Carbon::create(2025, 2, 21, 16, 0, 0)],
            ['module_name' => 'Class Diagram 4', 'number' => 'ONTW CLA 04b', 'name' => 'Class diagram opdracht 4b: Inventarisatiesysteem', 'description' => 'Maak een class diagram voor een inventarisatiesysteem.', 'duedate' => Carbon::create(2025, 2, 21, 16, 0, 0)],
            ['module_name' => 'Class Diagram 4', 'number' => 'ONTW CLA 04c', 'name' => 'Class diagram opdracht 4c: Social Gaming Platform', 'description' => 'Maak een class diagram voor een social gaming platform.', 'duedate' => Carbon::create(2025, 2, 21, 16, 0, 0)],
            ['module_name' => 'Class Diagram 4', 'number' => 'ONTW CLA 04d', 'name' => 'Class diagram opdracht 4d: Receptenbeheersysteem', 'description' => 'Maak een class diagram voor een receptenbeheersysteem.', 'duedate' => Carbon::create(2025, 2, 21, 16, 0, 0)],

            // Usecase diagram
            ['module_name' => 'Usecase 1', 'number' => 'ONTW USE 01a', 'name' => 'Opdracht 1a: Herkennen actor & usecase Bookstore', 'description' => 'Herken actor en usecase voor een bookstore.', 'duedate' => Carbon::create(2025, 2, 14, 16, 0, 0)],
            ['module_name' => 'Usecase 1', 'number' => 'ONTW USE 01b', 'name' => 'Opdracht 1b: Herkennen actor & usecase Event Management System', 'description' => 'Herken actor en usecase voor een event management system.', 'duedate' => Carbon::create(2025, 2, 14, 16, 0, 0)],
            ['module_name' => 'Usecase 1', 'number' => 'ONTW USE 01c', 'name' => 'Opdracht 1c: Herkennen actor & usecase Online food delivery', 'description' => 'Herken actor en usecase voor een online food delivery.', 'duedate' => Carbon::create(2025, 2, 14, 16, 0, 0)],
            ['module_name' => 'Usecase 1', 'number' => 'ONTW USE 01d', 'name' => 'Opdracht 1d: Herkennen actor & usecase Ticket service', 'description' => 'Herken actor en usecase voor een ticket service.', 'duedate' => Carbon::create(2025, 2, 14, 16, 0, 0)],

            ['module_name' => 'Usecase 2', 'number' => 'ONTW USE 02a', 'name' => 'Opdracht 2a: Use casediagram Task management', 'description' => 'Maak een use casediagram voor task management.', 'duedate' => Carbon::create(2025, 2, 21, 16, 0, 0)],
            ['module_name' => 'Usecase 2', 'number' => 'ONTW USE 02b', 'name' => 'Opdracht 2b: Use casediagram Fitness tracking app', 'description' => 'Maak een use casediagram voor een fitness tracking app.', 'duedate' => Carbon::create(2025, 2, 21, 16, 0, 0)],
            ['module_name' => 'Usecase 2', 'number' => 'ONTW USE 02c', 'name' => 'Opdracht 2c: Use casediagram Music streaming service', 'description' => 'Maak een use casediagram voor een music streaming service.', 'duedate' => Carbon::create(2025, 2, 21, 16, 0, 0)],
            ['module_name' => 'Usecase 2', 'number' => 'ONTW USE 02d', 'name' => 'Opdracht 2d: Use casediagram Online learning platform', 'description' => 'Maak een use casediagram voor een online learning platform.', 'duedate' => Carbon::create(2025, 2, 21, 16, 0, 0)],

            ['module_name' => 'Usecase 3', 'number' => 'ONTW USE 03a', 'name' => 'Opdracht 3a: Use casediagram E-commerce platform', 'description' => 'Maak een use casediagram voor een e-commerce platform.', 'duedate' => Carbon::create(2025, 2, 28, 16, 0, 0)],
            ['module_name' => 'Usecase 3', 'number' => 'ONTW USE 03b', 'name' => 'Opdracht 3b: Use casediagram Property rental platform', 'description' => 'Maak een use casediagram voor een property rental platform.', 'duedate' => Carbon::create(2025, 2, 28, 16, 0, 0)],
            ['module_name' => 'Usecase 3', 'number' => 'ONTW USE 03c', 'name' => 'Opdracht 3c: Use casediagram Online job marketspace', 'description' => 'Maak een use casediagram voor een online job marketspace.', 'duedate' => Carbon::create(2025, 2, 28, 16, 0, 0)],
            ['module_name' => 'Usecase 3', 'number' => 'ONTW USE 03d', 'name' => 'Opdracht 3d: Use casediagram Recipe sharing platform', 'description' => 'Maak een use casediagram voor een recipe sharing platform.', 'duedate' => Carbon::create(2025, 2, 28, 16, 0, 0)],

            ['module_name' => 'Usecase 4', 'number' => 'ONTW USE 04a', 'name' => 'Opdracht 4a: Use casediagram Online pet adoption platform', 'description' => 'Maak een use casediagram voor een online pet adoption platform.', 'duedate' => Carbon::create(2025, 3, 7, 16, 0, 0)],
            ['module_name' => 'Usecase 4', 'number' => 'ONTW USE 04b', 'name' => 'Opdracht 4b: Use casediagram Travel experience review platform', 'description' => 'Maak een use casediagram voor een travel experience review platform.', 'duedate' => Carbon::create(2025, 3, 7, 16, 0, 0)],
            ['module_name' => 'Usecase 4', 'number' => 'ONTW USE 04c', 'name' => 'Opdracht 4c: Use casediagram Community-Based Fitness Platform', 'description' => 'Maak een use casediagram voor een community-based fitness platform.', 'duedate' => Carbon::create(2025, 3, 7, 16, 0, 0)],
            ['module_name' => 'Usecase 4', 'number' => 'ONTW USE 04d', 'name' => 'Opdracht 4d: Use casediagram Work collaboration platform', 'description' => 'Maak een use casediagram voor een work collaboration platform.', 'duedate' => Carbon::create(2025, 3, 7, 16, 0, 0)],

            // Ontwerpen - Testen
            ['module_name' => 'Acceptatietest 1', 'number' => 'ONTW TES 01a', 'name' => 'Opdracht 1a: Schrijf een Acceptatietest voor product toevoegen aan winkelwagen', 'description' => 'Schrijf een acceptatietest voor het toevoegen van een product aan een winkelwagen.', 'duedate' => Carbon::create(2025, 3, 14, 16, 0, 0)],
            ['module_name' => 'Acceptatietest 1', 'number' => 'ONTW TES 01b', 'name' => 'Opdracht 1b: Schrijf een Acceptatietest voor invullen contactformulier', 'description' => 'Schrijf een acceptatietest voor het invullen van een contactformulier.', 'duedate' => Carbon::create(2025, 3, 14, 16, 0, 0)],
            ['module_name' => 'Unit test 1', 'number' => 'ONTW TES 02a', 'name' => 'Opdracht 2a: Schrijf een Acceptatietest voor het Zoeken naar Producten', 'description' => 'Schrijf een acceptatietest voor het zoeken naar producten.', 'duedate' => Carbon::create(2025, 3, 21, 16, 0, 0)],
            ['module_name' => 'Unit test 1', 'number' => 'ONTW TES 02b', 'name' => 'Opdracht 2b: Schrijf een Acceptatietest voor het Afrekenen van een Bestelling', 'description' => 'Schrijf een acceptatietest voor het afrekenen van een bestelling.', 'duedate' => Carbon::create(2025, 3, 21, 16, 0, 0)],
            ['module_name' => 'Feature test 1', 'number' => 'ONTW TES 03a', 'name' => 'Opdracht 3a: Schrijf een Unit Test voor Formulierveld Lengte Validatie', 'description' => 'Schrijf een unit test voor de lengte validatie van een formulierveld.', 'duedate' => Carbon::create(2025, 3, 28, 16, 0, 0)],
            ['module_name' => 'Feature test 1', 'number' => 'ONTW TES 03b', 'name' => 'Opdracht 4a: Schrijf een Feature Test voor Gebruikersregistratie', 'description' => 'Schrijf een feature test voor gebruikersregistratie.', 'duedate' => Carbon::create(2025, 4, 4, 16, 0, 0)],
            ['module_name' => 'Ux/Ui test', 'number' => 'ONTW TES 04a', 'name' => 'Ux/Ui test', 'description' => 'Voer een test uit voor gebruikerservaring en gebruikersinterface.', 'duedate' => Carbon::create(2025, 4, 11, 16, 0, 0)],
            ['module_name' => 'Browser test', 'number' => 'ONTW TES 04b', 'name' => 'Browser test', 'description' => 'Voer een test uit voor browser compatibiliteit.', 'duedate' => Carbon::create(2025, 4, 18, 16, 0, 0)],
            ['module_name' => 'Unit test 2', 'number' => 'ONTW TES 05a', 'name' => 'Opdracht 5a: Schrijf een Acceptatietest voor product toevoegen aan winkelwagen', 'description' => 'Schrijf een acceptatietest voor het toevoegen van een product aan een winkelwagen.', 'duedate' => Carbon::create(2025, 4, 25, 16, 0, 0)],
            ['module_name' => 'Unit test 2', 'number' => 'ONTW TES 05b', 'name' => 'Opdracht 5b: Schrijf een Acceptatietest voor invullen contactformulier', 'description' => 'Schrijf een acceptatietest voor het invullen van een contactformulier.', 'duedate' => Carbon::create(2025, 4, 25, 16, 0, 0)],
            ['module_name' => 'Feature test 2', 'number' => 'ONTW TES 06a', 'name' => 'Opdracht 6a: Schrijf een Acceptatietest voor het Zoeken naar Producten', 'description' => 'Schrijf een acceptatietest voor het zoeken naar producten.', 'duedate' => Carbon::create(2025, 5, 2, 16, 0, 0)],
            ['module_name' => 'Feature test 2', 'number' => 'ONTW TES 06b', 'name' => 'Opdracht 6b: Schrijf een Acceptatietest voor het Afrekenen van een Bestelling', 'description' => 'Schrijf een acceptatietest voor het afrekenen van een bestelling.', 'duedate' => Carbon::create(2025, 5, 2, 16, 0, 0)],

        ];

        foreach ($assignments as $assignment) {
            $module = Module::where('name', $assignment['module_name'])->first();
            if ($module) {
                Assignment::create([
                    'module_id' => $module->id,
                    'number' => $assignment['number'],
                    'name' => $assignment['name'],
                    'description' => $assignment['description'],
                    'duedate' => $assignment['duedate'],
                ]);
            }
        }

    }
}
