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
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'name' => '1.1 Begrip van Classes', 'description' => 'Wat is een class en hoe maak je deze', 'duedate' => Carbon::now()->addWeeks(1)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'name' => '1.2 Objecten Maken', 'description' => 'Hoe maak je objecten in PHP', 'duedate' => Carbon::now()->addWeeks(2)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'name' => '1.3 Werken met Eigenschappen', 'description' => 'Eigenschappen van een object. Public benaderen', 'duedate' => Carbon::now()->addWeeks(3)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'name' => '1.4 Methodes in Classes', 'description' => 'Wat is een methode en waarvoor gebruik je deze', 'duedate' => Carbon::now()->addWeeks(4)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'name' => '1.5 Introductie tot Namespaces', 'description' => 'Voorbeeld gebruik mappen. Class met zelfde naam met namespaces te onderscheiden', 'duedate' => Carbon::now()->addWeeks(5)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'name' => '1.6 Gebruik van Namespaces', 'description' => 'Gebruik van use en alias', 'duedate' => Carbon::now()->addWeeks(6)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'name' => '1.7 Implementeren van Setters', 'description' => 'Hoe gebruiken we een methode om gegevens in een property te zetten', 'duedate' => Carbon::now()->addWeeks(7)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'name' => '1.8 Constructor Functionaliteit', 'description' => 'Automatisch uitvoeren wanneer object wordt aangemaakt', 'duedate' => Carbon::now()->addWeeks(8)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'name' => '1.9 Gebruik van Named Arguments', 'description' => 'Bij gebruik van named arguments maakt volgorde niet meer uit', 'duedate' => Carbon::now()->addWeeks(9)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'name' => '1.10 Constructor Promoted Properties', 'description' => 'Properties binnen constructor aanmaken en vullen', 'duedate' => Carbon::now()->addWeeks(10)],
            ['module_name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'name' => '1.11 Implementeren van Getters', 'description' => 'Methode om gegevens uit properties te halen, formatten naar hoe je het wil en returnen', 'duedate' => Carbon::now()->addWeeks(11)],

            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'name' => '2.1 Doc Blocks en Type Hinting', 'description' => 'Documentatie over code, welke datatype verwacht je', 'duedate' => Carbon::now()->addWeeks(12)],
            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'name' => '2.2 Type Hinting bij Argumenten', 'description' => 'Datatypes gebruiken bij argumenten waardoor je werkelijk de correcte datatype moet gebruiken', 'duedate' => Carbon::now()->addWeeks(13)],
            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'name' => '2.3 Eigenschap Type Declaraties', 'description' => 'Niet alleen bij argumenten maar ook datatype gebruiken bij je properties', 'duedate' => Carbon::now()->addWeeks(14)],
            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'name' => '2.4 Class Type Declaraties', 'description' => 'Naast de primaire datatypes zoals int en string kan een datatype ook van een bepaalde class zijn (dus een object)', 'duedate' => Carbon::now()->addWeeks(15)],
            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'name' => '2.5 Debugging Technieken', 'description' => 'Hoe doorloop je code met debuggen. Step into, Step out, Step over.', 'duedate' => Carbon::now()->addWeeks(16)],
            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'name' => '2.6 Begrip van Zichtbaarheid: Private Eigenschappen', 'description' => 'Niet meer toegankelijk buiten class. Dan heb je sowieso methodes nodig', 'duedate' => Carbon::now()->addWeeks(17)],
            ['module_name' => 'OOP 02: Geavanceerde OOP Concepten', 'name' => '2.7 Begrip van Zichtbaarheid: Private Methodes', 'description' => 'Ook voor methoden kan het. Alleen wanneer een andere methode binnen dezelfde class deze dan mag gebruiken', 'duedate' => Carbon::now()->addWeeks(18)],

            ['module_name' => 'OOP 03: PHP en Webintegratie', 'name' => '3.1 Layout Ontwerp met Bootstrap', 'description' => 'Gebruik van Bootstrap voor layout ontwerp', 'duedate' => Carbon::now()->addWeeks(19)],
            ['module_name' => 'OOP 03: PHP en Webintegratie', 'name' => '3.2 Formulieren en OOP', 'description' => 'Formulieren maken en hanteren met OOP', 'duedate' => Carbon::now()->addWeeks(20)],
            ['module_name' => 'OOP 03: PHP en Webintegratie', 'name' => '3.3 Omgaan met POST Requests', 'description' => 'Hoe POST requests op te vangen en te verwerken', 'duedate' => Carbon::now()->addWeeks(21)],
            ['module_name' => 'OOP 03: PHP en Webintegratie', 'name' => '3.4 Objecten Opslaan met SESSION', 'description' => 'Hoe objecten in sessies op te slaan', 'duedate' => Carbon::now()->addWeeks(22)],
            ['module_name' => 'OOP 03: PHP en Webintegratie', 'name' => '3.5 Navigeren met $_GET', 'description' => 'Navigeren tussen pagina’s met behulp van $_GET', 'duedate' => Carbon::now()->addWeeks(23)],
            ['module_name' => 'OOP 03: PHP en Webintegratie', 'name' => '3.6 Method Chaining', 'description' => 'Verkrijgen van studentnamen met method chaining', 'duedate' => Carbon::now()->addWeeks(24)],

            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'name' => '4.1 Introductie tot Overerving', 'description' => 'Voorbeeld wanneer je eigenlijk 2 classes nodig hebt met wat overeenkomsten', 'duedate' => Carbon::now()->addWeeks(25)],
            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'name' => '4.2 Dupliceren van Classes', 'description' => 'Van 1 class 2 classes maken', 'duedate' => Carbon::now()->addWeeks(26)],
            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'name' => '4.3 Toepassen van Overerving', 'description' => 'Oplossen van de 2 classes met overeenkomsten door parent/child te maken', 'duedate' => Carbon::now()->addWeeks(27)],
            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'name' => '4.4 Gebruik van Protected Eigenschappen', 'description' => 'Hoe zorgen we ervoor dat properties alleen in eigen class en childs gebruikt kunnen worden, niet erbuiten', 'duedate' => Carbon::now()->addWeeks(28)],
            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'name' => '4.5 Gebruik van Protected Methodes', 'description' => 'Ook methodes alleen in eigen class en child', 'duedate' => Carbon::now()->addWeeks(29)],
            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'name' => '4.6 Constructors en Overerving', 'description' => 'Welke constructor wordt uitgevoerd. Hoe zorg je dat beide constructors worden uitgevoerd', 'duedate' => Carbon::now()->addWeeks(30)],
            ['module_name' => 'OOP 04: Overerving en Hergebruik van Code', 'name' => '4.7 Overschrijven van Parent Methodes', 'description' => 'Methode van parent class wordt overschreven door child class', 'duedate' => Carbon::now()->addWeeks(31)],

            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'name' => '5.1 Eenvoudig Autoloaden', 'description' => 'Inlezen van mappen', 'duedate' => Carbon::now()->addWeeks(32)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'name' => '5.2 Autoloaden met Namespaces', 'description' => 'Gebruik van autoload met namespaces', 'duedate' => Carbon::now()->addWeeks(33)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'name' => '5.3 Introductie tot Composer', 'description' => 'Composer installatie en gebruik', 'duedate' => Carbon::now()->addWeeks(34)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'name' => '5.4 Autoloaden met Composer', 'description' => 'Gebruik autoload en psr-4 met Composer', 'duedate' => Carbon::now()->addWeeks(35)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'name' => '5.5 Gebruik van PhpStan', 'description' => 'Codestyling fouten krijgen in terminal met PhpStan', 'duedate' => Carbon::now()->addWeeks(36)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'name' => '5.6 Introductie tot Smarty', 'description' => 'Gebruik van Smarty template engine', 'duedate' => Carbon::now()->addWeeks(37)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'name' => '5.7 Gebruik van Master Pages', 'description' => 'Gebruik van master pages in je project', 'duedate' => Carbon::now()->addWeeks(38)],
            ['module_name' => 'OOP 05: Gebruik van Tools en Bibliotheken', 'name' => '5.8 Data Doorgeven aan Layouts', 'description' => 'Data doorgeven aan layouts voor rendering', 'duedate' => Carbon::now()->addWeeks(39)],

            ['module_name' => 'OOP 06: Abstracte Classes en Methoden', 'name' => '6.1 Maken van Abstracte Classes', 'description' => 'Hoe maak je abstracte classes in PHP', 'duedate' => Carbon::now()->addWeeks(40)],
            ['module_name' => 'OOP 06: Abstracte Classes en Methoden', 'name' => '6.2 Implementeren van Abstracte Methodes', 'description' => 'Hoe implementeer je abstracte methodes in PHP', 'duedate' => Carbon::now()->addWeeks(41)],
            ['module_name' => 'OOP 06: Abstracte Classes en Methoden', 'name' => '6.3 Uitbreiden van Abstracte Classes', 'description' => 'Wat als je de child van een abstracte class ook abstract is?', 'duedate' => Carbon::now()->addWeeks(42)],
            ['module_name' => 'OOP 06: Abstracte Classes en Methoden', 'name' => '6.4 Werken met Statische Eigenschappen', 'description' => 'Hoe gebruik je statische eigenschappen in PHP', 'duedate' => Carbon::now()->addWeeks(43)],
            ['module_name' => 'OOP 06: Abstracte Classes en Methoden', 'name' => '6.5 Werken met Statische Methodes', 'description' => 'Hoe gebruik je statische methodes in PHP', 'duedate' => Carbon::now()->addWeeks(44)],
            ['module_name' => 'OOP 06: Abstracte Classes en Methoden', 'name' => '6.6 Lijst Classes vs Statische Eigenschappen', 'description' => 'Andere manier om studenten in een lijst te zetten', 'duedate' => Carbon::now()->addWeeks(45)],

            ['module_name' => 'OOP 07: Geavanceerde OOP Concepten', 'name' => '7.1 Gebruikersregistratie', 'description' => 'Hoe implementeer je gebruikersregistratie in PHP', 'duedate' => Carbon::now()->addWeeks(46)],
            ['module_name' => 'OOP 07: Geavanceerde OOP Concepten', 'name' => '7.2 Gebruik van Statische & Session', 'description' => 'Hoe gebruik je statische methodes en session in PHP', 'duedate' => Carbon::now()->addWeeks(47)],
            ['module_name' => 'OOP 07: Geavanceerde OOP Concepten', 'name' => '7.3 Maken van een Interface', 'description' => 'Hoe maak je een interface voor database interactie', 'duedate' => Carbon::now()->addWeeks(48)],
            ['module_name' => 'OOP 07: Geavanceerde OOP Concepten', 'name' => '7.4 Implementeren van Interfaces', 'description' => 'Hoe implementeer je interfaces in PHP', 'duedate' => Carbon::now()->addWeeks(49)],
            ['module_name' => 'OOP 07: Geavanceerde OOP Concepten', 'name' => '7.5 Insert Methodes', 'description' => 'Hoe implementeer je insert methodes in PHP', 'duedate' => Carbon::now()->addWeeks(50)],
            ['module_name' => 'OOP 07: Geavanceerde OOP Concepten', 'name' => '7.6 Gebruik van Insert bij Registratie', 'description' => 'Hoe gebruik je insert methodes bij gebruikersregistratie', 'duedate' => Carbon::now()->addWeeks(51)],
            ['module_name' => 'OOP 07: Geavanceerde OOP Concepten', 'name' => '7.7 Eenvoudige Select Methode', 'description' => 'Hoe implementeer je een eenvoudige select methode in PHP', 'duedate' => Carbon::now()->addWeeks(52)],
            ['module_name' => 'OOP 07: Geavanceerde OOP Concepten', 'name' => '7.8 Tabellen Maken vanuit Select Data', 'description' => 'Hoe maak je tabellen vanuit select data', 'duedate' => Carbon::now()->addWeeks(53)],
            ['module_name' => 'OOP 07: Geavanceerde OOP Concepten', 'name' => '7.9 Uitbreiden van de Select Methode', 'description' => 'Hoe breid je de select methode uit in PHP', 'duedate' => Carbon::now()->addWeeks(54)],
            ['module_name' => 'OOP 07: Geavanceerde OOP Concepten', 'name' => '7.10 Update Methodes', 'description' => 'Hoe implementeer je update methodes in PHP', 'duedate' => Carbon::now()->addWeeks(55)],
            ['module_name' => 'OOP 07: Geavanceerde OOP Concepten', 'name' => '7.11 Gebruik van Update Methodes', 'description' => 'Hoe gebruik je update methodes in PHP', 'duedate' => Carbon::now()->addWeeks(56)],
            ['module_name' => 'OOP 07: Geavanceerde OOP Concepten', 'name' => '7.12 Delete Methodes', 'description' => 'Hoe implementeer je delete methodes in PHP', 'duedate' => Carbon::now()->addWeeks(57)],
            ['module_name' => 'OOP 07: Geavanceerde OOP Concepten', 'name' => '7.13 Gebruik van Delete Methodes', 'description' => 'Hoe gebruik je delete methodes in PHP', 'duedate' => Carbon::now()->addWeeks(58)],
        ];

        foreach ($assignments as $assignment) {
            $module = Module::where('name', $assignment['module_name'])->first();
            if ($module) {
                Assignment::create([
                    'module_id' => $module->id,
                    'name' => $assignment['name'],
                    'description' => $assignment['description'],
                    'duedate' => $assignment['duedate'],
                ]);
            }
        }

    }
}
