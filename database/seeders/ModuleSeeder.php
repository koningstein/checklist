<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Module;
use App\Models\Period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Module::factory(10)->create();
        $modules = [
            // Programmeren 1
            ['course_name' => 'Programmeren 1', 'period' => 'Periode1', 'name' => 'HTML & CSS', 'description' => 'Inleiding tot webontwikkeling met HTML en CSS.'],
            ['course_name' => 'Programmeren 1', 'period' => 'Periode2', 'name' => 'JavaScript', 'description' => 'Basisprincipes van programmeren met JavaScript.'],
            ['course_name' => 'Programmeren 1', 'period' => 'Periode3', 'name' => 'PHP', 'description' => 'Server-side scripting met PHP.'],
            ['course_name' => 'Programmeren 1', 'period' => 'Periode4', 'name' => 'SQL', 'description' => 'Databasebeheer en query taal met SQL.'],

            // Programmeren 2
            ['course_name' => 'Programmeren 2', 'period' => 'Periode5', 'name' => 'PHP & SQL', 'description' => 'Herhaling van webontwikkeling met PHP en SQL.'],
            ['course_name' => 'Programmeren 2', 'period' => 'Periode6', 'name' => 'OOP 01: Basisprincipes van Objectgeoriënteerd Programmeren', 'description' => 'Introductie tot de fundamentele concepten van Object Oriented Programming (OOP).'],
            ['course_name' => 'Programmeren 2', 'period' => 'Periode6', 'name' => 'OOP 02: Geavanceerde OOP Concepten', 'description' => 'Verdieping in geavanceerde OOP concepten zoals polymorfisme en interfaces.'],
            ['course_name' => 'Programmeren 2', 'period' => 'Periode6', 'name' => 'OOP 03: PHP en Webintegratie', 'description' => 'Toepassing van OOP-principes binnen PHP voor webontwikkeling.'],
            ['course_name' => 'Programmeren 2', 'period' => 'Periode7', 'name' => 'OOP 04: Overerving en Hergebruik van Code', 'description' => 'Onderzoek naar overerving en hergebruik van code in OOP.'],
            ['course_name' => 'Programmeren 2', 'period' => 'Periode7', 'name' => 'OOP 05: Autoloading en Composer', 'description' => 'Gebruik van autoloading en Composer om OOP-projecten te beheren en organiseren.'],
            ['course_name' => 'Programmeren 2', 'period' => 'Periode8', 'name' => 'OOP 06: Abstracte Classes en Static', 'description' => 'Geavanceerde concepten zoals abstracte klassen en statische methoden in OOP.'],
            ['course_name' => 'Programmeren 2', 'period' => 'Periode8', 'name' => 'OOP 07: Database integratie', 'description' => 'Integratie van OOP-principes met databases voor dynamische webapplicaties.'],

            // Programmeren 3
            ['course_name' => 'Programmeren 3', 'period' => 'Periode11', 'name' => 'Design Pattern Basis', 'description' => 'Inleiding tot software design patterns.'],
            ['course_name' => 'Programmeren 3', 'period' => 'Periode12', 'name' => 'Design Pattern Adv', 'description' => 'Geavanceerde software design patterns.'],
            ['course_name' => 'Programmeren 3', 'period' => 'Periode13', 'name' => 'Examentraining', 'description' => 'Voorbereiding op het programmeerexamen.'],

            // Ontwerpen 1
            ['course_name' => 'Ontwerpen 1', 'period' => 'Periode1', 'name' => 'Sitemap', 'description' => 'Structuur van websites plannen met sitemaps.'],
            ['course_name' => 'Ontwerpen 1', 'period' => 'Periode1', 'name' => 'Wireframe', 'description' => 'Basislay-outs voor websites ontwerpen met wireframes.'],
            ['course_name' => 'Ontwerpen 1', 'period' => 'Periode2', 'name' => 'ERD 1', 'description' => 'Inleiding tot Entity Relationship Diagrams.'],
            ['course_name' => 'Ontwerpen 1', 'period' => 'Periode2', 'name' => 'ERD 2', 'description' => 'Geavanceerde concepten van Entity Relationship Diagrams.'],
            ['course_name' => 'Ontwerpen 1', 'period' => 'Periode3', 'name' => 'ERD 3', 'description' => 'Praktische toepassing van ERD\'s in databaseontwerp.'],
            ['course_name' => 'Ontwerpen 1', 'period' => 'Periode3', 'name' => 'ERD 4', 'description' => 'Complexe ERD\'s en hun implementatie.'],
            ['course_name' => 'Ontwerpen 1', 'period' => 'Periode4', 'name' => 'Flowchart 1', 'description' => 'Inleiding tot procesmodellering met flowcharts.'],

            // Ontwerpen 2
            ['course_name' => 'Ontwerpen 2', 'period' => 'Periode5', 'name' => 'ERD Herhaling', 'description' => 'Herhaling en verdieping van ERD concepten.'],
            ['course_name' => 'Ontwerpen 2', 'period' => 'Periode6', 'name' => 'Class Diagram 1', 'description' => 'Inleiding tot UML Class Diagrams.'],
            ['course_name' => 'Ontwerpen 2', 'period' => 'Periode6', 'name' => 'Class Diagram 2', 'description' => 'Geavanceerde concepten in UML Class Diagrams.'],
            ['course_name' => 'Ontwerpen 2', 'period' => 'Periode6', 'name' => 'Class Diagram 3', 'description' => 'Toepassing van Class Diagrams in softwareontwerp.'],
            ['course_name' => 'Ontwerpen 2', 'period' => 'Periode7', 'name' => 'Flowchart 2', 'description' => 'Geavanceerde technieken in procesmodellering met flowcharts.'],
            ['course_name' => 'Ontwerpen 2', 'period' => 'Periode7', 'name' => 'Flowchart 3', 'description' => 'Complexe procesmodellen maken met flowcharts.'],
            ['course_name' => 'Ontwerpen 2', 'period' => 'Periode8', 'name' => 'ERD 5', 'description' => 'Verdieping en toepassing van ERD\'s.'],

            // Ontwerpen 3
            ['course_name' => 'Ontwerpen 3', 'period' => 'Periode11', 'name' => 'Usecase 1', 'description' => 'Inleiding tot use case diagrams.'],
            ['course_name' => 'Ontwerpen 3', 'period' => 'Periode11', 'name' => 'Usecase 2', 'description' => 'Geavanceerde concepten in use case diagrams.'],
            ['course_name' => 'Ontwerpen 3', 'period' => 'Periode11', 'name' => 'Usecase 3', 'description' => 'Toepassing van use case diagrams in softwareontwerp.'],
            ['course_name' => 'Ontwerpen 3', 'period' => 'Periode12', 'name' => 'Usecase 4', 'description' => 'Complexe use case diagrams en hun implementatie.'],
            ['course_name' => 'Ontwerpen 3', 'period' => 'Periode12', 'name' => 'ERD 6', 'description' => 'Geavanceerde ERD concepten en toepassingen.'],
            ['course_name' => 'Ontwerpen 3', 'period' => 'Periode12', 'name' => 'Class Diagram 4', 'description' => 'Verdieping in UML Class Diagrams.'],

            // Ontwerpen - Testen
            ['course_name' => 'Programmeren 2', 'period' => 'Periode6', 'name' => 'Acceptatietest 1', 'description' => 'Inleiding tot acceptatietesten en hun toepassing.'],
            ['course_name' => 'Programmeren 2', 'period' => 'Periode7', 'name' => 'Unit test 1', 'description' => 'Basisprincipes van unit testen in softwareontwikkeling.'],
            ['course_name' => 'Programmeren 2', 'period' => 'Periode8', 'name' => 'Feature test 1', 'description' => 'Inleiding tot feature testen en hun toepassing.'],
            ['course_name' => 'Programmeren 3', 'period' => 'Periode11', 'name' => 'Ux/Ui test', 'description' => 'Testen van gebruikerservaring en gebruikersinterface.'],
            ['course_name' => 'Programmeren 3', 'period' => 'Periode11', 'name' => 'Browser test', 'description' => 'Inleiding tot browser testen en hun toepassing.'],
            ['course_name' => 'Programmeren 3', 'period' => 'Periode12', 'name' => 'Unit test 2', 'description' => 'Geavanceerde concepten in unit testen.'],
            ['course_name' => 'Programmeren 3', 'period' => 'Periode12', 'name' => 'Feature test 2', 'description' => 'Geavanceerde concepten in feature testen.'],

            // Project
            ['course_name' => 'Project', 'period' => 'Periode1', 'name' => 'Html & CSS', 'description' => 'Projecttoepassingen met HTML en CSS.'],
            ['course_name' => 'Project', 'period' => 'Periode2', 'name' => 'Javascript', 'description' => 'Projecttoepassingen met JavaScript.'],
            ['course_name' => 'Project', 'period' => 'Periode3', 'name' => 'Php & Javascript', 'description' => 'Gecombineerde projecttoepassingen met PHP en JavaScript.'],
            ['course_name' => 'Project', 'period' => 'Periode4', 'name' => 'Php & SQL', 'description' => 'Gecombineerde projecttoepassingen met PHP en SQL.'],
            ['course_name' => 'Project', 'period' => 'Periode5', 'name' => 'Php, Javascript & SQL', 'description' => 'Geavanceerde projecttoepassingen met PHP, JavaScript en SQL.'],
            ['course_name' => 'Project', 'period' => 'Periode6', 'name' => 'OOP Basis', 'description' => 'Projecten met basisconcepten in Object Oriented Programming.'],
            ['course_name' => 'Project', 'period' => 'Periode7', 'name' => 'OOP Adv', 'description' => 'Geavanceerde projecten in Object Oriented Programming.'],
            ['course_name' => 'Project', 'period' => 'Periode8', 'name' => 'OOP DB', 'description' => 'Projecten die OOP integreren met databases.'],
            ['course_name' => 'Project', 'period' => 'Periode11', 'name' => 'Design Pattern Basis', 'description' => 'Projecten met basis software design patterns.'],
            ['course_name' => 'Project', 'period' => 'Periode12', 'name' => 'Design Pattern Adv', 'description' => 'Geavanceerde projecten met software design patterns.'],
            ['course_name' => 'Project', 'period' => 'Periode12', 'name' => 'Open Project', 'description' => 'Vrije projecten voor creatief en innovatief denken.'],
        ];

        foreach ($modules as $module) {
            $course = Course::where('name', $module['course_name'])->first();
            $period = Period::where('period', $module['period'])->first();

            if ($course && $period) {
                Module::create([
                    'name' => $module['name'],
                    'description' => $module['description'],
                    'course_id' => $course->id,
                    'period_id' => $period->id,
                ]);
            }
        }
    }
}
