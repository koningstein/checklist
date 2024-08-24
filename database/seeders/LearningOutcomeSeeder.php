<?php

namespace Database\Seeders;

use App\Models\LearningOutcome;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningOutcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $learningOutcomes = [
            // Programmeer Leeruitkomsten
            ['number' => 'PROG01', 'name' => 'Beheersing van programmeertalen', 'description' => 'Ik heb een grondige beheersing van de syntaxis en semantiek van ten minste twee programmeertalen voor effectieve probleemoplossing.'],
            ['number' => 'PROG02', 'name' => 'Gebruik en evaluatie van ontwikkelingshulpmiddelen', 'description' => 'Ik leer zelfstandig en effectief gebruik te maken van nieuwe ontwikkelingshulpmiddelen en evalueer deze op basis van projectbehoeften.'],
            ['number' => 'PROG03', 'name' => 'Softwareontwikkelingstechnieken en -principes', 'description' => 'Ik heb specialistische kennis van softwareontwikkelingstechnieken en pas deze toe om robuuste en efficiënte software te creëren.'],
            ['number' => 'PROG04', 'name' => 'Gegevensbeheer en migratie', 'description' => 'Ik migreer gegevens naar verschillende structuren met minimale gegevensverlies en optimaliseer de efficiëntie van gegevensbeheer.'],
            ['number' => 'PROG05', 'name' => 'Implementatie en integratie van assets', 'description' => 'Ik integreer (aangeleverde) assets zoals video, mediamateriaal, bibliotheken, en code van anderen op een gestructureerde en georganiseerde manier.'],
            ['number' => 'PROG06', 'name' => 'Codeerconventies en zelfdocumenterende code', 'description' => 'Ik implementeer consistentie in code conventies binnen een ontwikkelteam en schrijf zelfdocumenterende code om de leesbaarheid te verbeteren.'],
            ['number' => 'PROG07', 'name' => 'Gebruik van code-analysetools en testen', 'description' => 'Ik gebruik code-analysetools om naleving van code conventies te waarborgen en pas testen toe bij development voor robuuste software-implementatie.'],
            ['number' => 'PROG08', 'name' => 'Implementatie van toegankelijkheidsrichtlijnen', 'description' => 'Ik implementeer toegankelijkheidsrichtlijnen in (web)applicaties en evalueer en selecteer geschikte technologieën voor toegankelijke software.'],
            ['number' => 'PROG09', 'name' => 'Beveiliging en veilige codeerpraktijken', 'description' => 'Ik identificeer en los beveiligingszwaktes in de software op en pas best practices toe voor beveiligd coderen.'],
            ['number' => 'PROG10', 'name' => 'Design patterns herkennen en implementeren', 'description' => 'Ik identificeer actief situaties waarin design patterns kunnen worden toegepast en implementeer deze voor herbruikbare en onderhoudbare code.'],

            // IT Skills Leeruitkomsten
            ['number' => 'ITSK01', 'name' => 'Bestandssystemen', 'description' => 'Ik heb een grondige kennis van bestandssystemen en kan effectief werken met mappen en bestanden.'],
            ['number' => 'ITSK02', 'name' => 'Gebruiksrechten en Licenties', 'description' => 'Ik begrijp het belang van licenties en gebruiksrechten en kan deze toepassen.'],
            ['number' => 'ITSK03', 'name' => 'Cyber Security en Netwerken', 'description' => 'Ik heb een grondige kennis van cyber security en netwerken en kan deze kennis toepassen om systemen en netwerken te beveiligen.'],
            ['number' => 'ITSK04', 'name' => 'Services en Cloud Computing', 'description' => 'Ik begrijp de impact van services en cloud computing op softwareontwikkeling en kan deze kennis toepassen.'],
            ['number' => 'ITSK05', 'name' => 'Wet- en Regelgeving', 'description' => 'Ik ben op de hoogte van relevante wet- en regelgeving en pas deze toe in mijn werk.'],
            ['number' => 'ITSK06', 'name' => 'Ontwerpen en Beveiligen van Systemen', 'description' => 'Ik kan systemen ontwerpen en beveiligen met inachtneming van security- en privacy-eisen.'],
            ['number' => 'ITSK07', 'name' => 'Integratie van assets', 'description' => 'Ik integreer (aangeleverde) assets zoals video, mediamateriaal, bibliotheken, en code van anderen in projecten.'],
            ['number' => 'ITSK08', 'name' => 'Versiebeheer', 'description' => 'Ik gebruik versiebeheer en CI/CD om samen te werken aan softwareprojecten.'],

            // Communicatie & Management Leeruitkomsten
            ['number' => 'COMM01', 'name' => 'Afstemmen', 'description' => 'Ik stem zorgvuldig doelen en planning af met opdrachtgever/ leidinggevende/ belanghebbenden en vraagt door totdat alles duidelijk is.'],
            ['number' => 'COMM02', 'name' => 'Analyseren', 'description' => 'Ik trek logische conclusies uit de beschikbare informatie over de benodigde werkzaamheden en eventuele risico\'s.'],
            ['number' => 'COMM03', 'name' => 'Reflecteren op product', 'description' => 'Ik reflecteer op de kwaliteit van het product.'],
            ['number' => 'COMM04', 'name' => 'Reflecteren op proces', 'description' => 'Ik reflecteer op het teamproces.'],
            ['number' => 'COMM05', 'name' => 'Reflecteren op handelen', 'description' => 'Ik reflecteer op mijn eigen handelen.'],
            ['number' => 'COMM06', 'name' => 'Bewaken', 'description' => 'Ik kan relevante risico\'s inschatten op het gebied van softwaredevelopment.'],
            ['number' => 'COMM07', 'name' => 'Definition of Fun', 'description' => 'Ik stel een definition of Fun op.'],
            ['number' => 'COMM08', 'name' => 'Definition of Done (DoD)', 'description' => 'Ik stel een definition of Done op.'],
            ['number' => 'COMM09', 'name' => 'Effectief communiceren', 'description' => 'Ik communiceer effectief in verschillende situaties en met verschillende belanghebbenden.'],
            ['number' => 'COMM10', 'name' => 'Feedback geven en ontvangen', 'description' => 'Ik kan effectief feedback geven en ontvangen.'],
            ['number' => 'COMM11', 'name' => 'Zelfstandigheid en verantwoordelijkheid', 'description' => 'Ik kan zelfstandig software ontwikkelen en neem verantwoordelijkheid voor mijn eigen taken.'],
            ['number' => 'COMM12', 'name' => 'Effectief samenwerken', 'description' => 'Ik werk goed samen met collega\'s en andere belanghebbenden.'],
            ['number' => 'COMM13', 'name' => 'Softwareontwikkelingsmethodieken', 'description' => 'Ik begrijp verschillende softwareontwikkelingsmethodieken en weet wat de verschillen zijn.'],
            ['number' => 'COMM14', 'name' => 'Sprintplanning en bewaking', 'description' => 'Ik maak een sprintplanning en bewaak deze.'],
            ['number' => 'COMM15', 'name' => 'Presenteren', 'description' => 'Ik kan het opgeleverde (deel)product duidelijk presenteren aan belanghebbenden.'],
            ['number' => 'COMM16', 'name' => 'Probleemoplossing', 'description' => 'Ik kan problemen effectief oplossen.'],
            ['number' => 'COMM17', 'name' => 'Verbetervoorstellen', 'description' => 'Ik kan wensen en meldingen omzetten in verbeterideeën die uitgevoerd kunnen worden.'],

            // Ontwerpen Leeruitkomsten
            ['number' => 'ONTW01', 'name' => 'Afstemming Ontwerp', 'description' => 'Ik stem het ontwerp af met belanghebbenden en beargumenteer mijn ontwerpkeuzes.'],
            ['number' => 'ONTW02', 'name' => 'Risicobeheer', 'description' => 'Ik identificeer en beheer de risico\'s binnen het softwareontwikkelingsproces.'],
            ['number' => 'ONTW03', 'name' => 'Ontwerpen Software', 'description' => 'Ik ontwerp software op basis van gestelde eisen en wensen, met aandacht voor gebruiksvriendelijkheid en toegankelijkheid.'],
            ['number' => 'ONTW04', 'name' => 'Schema Technieken', 'description' => 'Ik gebruik diverse schema technieken om het ontwerp van software visueel weer te geven en te specificeren.'],
            ['number' => 'ONTW05', 'name' => 'Protocollen en Regelgeving', 'description' => 'Ik volg protocollen en regelgeving bij het ontwerpen, met aandacht voor privacy, toegankelijkheid, ethiek en veiligheid.'],
            ['number' => 'ONTW06', 'name' => 'Testen van software', 'description' => 'Ik test de gerealiseerde software grondig.']
        ];

        foreach ($learningOutcomes as $outcome) {
            LearningOutcome::create($outcome);
        }

        //LearningOutcome::factory()->count(5)->hasLearningSuboutcomes(5)->create();
    }
}
