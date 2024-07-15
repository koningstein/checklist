<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Course::factory(5)->create();
        $courses = [
            ['name' => 'Programmeren 1', 'description' => 'Inleiding tot de basisprincipes van het programmeren, inclusief variabelen, lussen en functies.'],
            ['name' => 'Programmeren 2', 'description' => 'Vervolg op Programmeren 1, met een focus op objectgeoriënteerd programmeren en geavanceerde programmeerconcepten.'],
            ['name' => 'Programmeren 3', 'description' => 'Geavanceerde programmeertechnieken, waaronder design patterns, algoritmen en data structures.'],
            ['name' => 'Ontwerpen 1', 'description' => 'Basisprincipes van grafisch en functioneel ontwerp.'],
            ['name' => 'Ontwerpen 2', 'description' => 'Vervolg op Ontwerpen 1, met geavanceerde ontwerptechnieken en -methoden.'],
            ['name' => 'Ontwerpen 3', 'description' => 'Geavanceerde studie van ontwerpprincipes met focus op complexe ontwerpprojecten.'],
            ['name' => 'Project Communicatie & Management 1', 'description' => 'Basisvaardigheden in projectmanagement, inclusief planning en communicatie.'],
            ['name' => 'Project Communicatie & Management 2', 'description' => 'Vervolg op PCM 1, met meer focus op teammanagement en projectuitvoering.'],
            ['name' => 'Project Communicatie & Management 3', 'description' => 'Geavanceerde technieken in projectmanagement, inclusief risicobeheer en projectevaluatie.'],
            ['name' => 'IT Skills 1', 'description' => 'Basisvaardigheden in IT, zoals netwerken en systeembeheer.'],
            ['name' => 'IT Skills 2', 'description' => 'Vervolg op IT Skills 1, met focus op geavanceerde IT-vaardigheden zoals cybersecurity.'],
            ['name' => 'IT Skills 3', 'description' => 'Geavanceerde IT-vaardigheden, inclusief complexe netwerkconfiguraties en systeemoptimalisatie.'],
            ['name' => 'Project', 'description' => 'Een projectgebaseerde cursus waar studenten werken aan een real-world probleem of opdracht om hun vaardigheden toe te passen.']
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
