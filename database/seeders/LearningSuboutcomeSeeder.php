<?php

namespace Database\Seeders;

use App\Models\LearningOutcome;
use App\Models\LearningSuboutcome;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class LearningSuboutcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Leeruitkomsten en hun subleeruitkomsten
        $learningOutcomes = [
            'PROG01' => [
                ['name' => 'Variabelen en datatypes', 'description' => 'Ik kan variabelen declareren en begrijp verschillende datatypes en hun toepassingen.'],
                ['name' => 'Expressies en operatoren', 'description' => 'Ik kan complexe expressies opstellen en begrijp de werking van diverse operatoren.'],
                ['name' => 'Controlestructuren', 'description' => 'Ik kan if-statements, loops en switch-cases correct gebruiken.'],
                ['name' => 'Functies of methoden', 'description' => 'Ik kan functies definiëren, aanroepen en begrijp parameters en returnwaarden.'],
                ['name' => 'Datastructuren', 'description' => 'Ik kan arrays, lijsten of andere datastructuren correct gebruiken.'],
                ['name' => 'Algoritmen', 'description' => 'Ik begrijp en pas algoritmen voor verschillende taken toe.'],
                ['name' => 'Objectgeorienteerde concepten', 'description' => 'Ik begrijp en implementeer principes zoals encapsulatie, modulariteit, overerving en polymorfisme.'],
                ['name' => 'Patroonherkenning', 'description' => 'Ik kan gemeenschappelijke programmeerpatronen herkennen en toepassen.'],
                ['name' => 'Code-optimalisatie (DRY)', 'description' => 'Ik begrijp en pas technieken toe om de efficiëntie van de code te verbeteren.'],
            ],
            'PROG02' => [
                ['name' => 'Package Managers', 'description' => 'Ik begrijp en kan Package Managers gebruiken voor het beheren van externe libraries en frameworks.'],
                ['name' => 'Softwareontwikkelingsprogramma’s en -tools', 'description' => 'Ik heb specialistische kennis van softwareontwikkelingsprogramma’s en -tools, zoals IDE’s en AI-tools.'],
                ['name' => 'Tool Selectie', 'description' => 'Ik kan een weloverwogen keuze maken bij het selecteren van tools die passen bij de specifieke behoeften van een project.'],
                ['name' => 'Pseudocode', 'description' => 'Ik kan pseudocode gebruiken om de logica en stappen van ontwerpeisen te vertalen naar programmeercode.'],
                ['name' => 'Criteria voor programmeertalen evaluatie', 'description' => 'Ik begrijp de criteria voor het evalueren van programmeertalen, zoals leesbaarheid, prestaties en beschikbare bibliotheken.'],
                ['name' => 'Bibliothekenonderzoek', 'description' => 'Ik begrijp hoe externe bibliotheken kunnen worden onderzocht en geëvalueerd op geschiktheid voor een specifiek project.'],
                ['name' => 'Integratie van bibliotheken', 'description' => 'Ik kan externe bibliotheken effectief integreren in het ontwikkelingsproces.'],
            ],
            'PROG03' => [
                ['name' => 'Object-Oriented Programming (OOP)', 'description' => 'Ik kan een applicatie met een complexe structuur uitwerken door gebruik te maken van geavanceerde objectgeoriënteerde programmeertechnieken. (SOD)'],
                ['name' => 'Entity-Component-System (ECS)', 'description' => 'Ik begrijp en kan Entity-Component-System (ECS) toepassen voor efficiënte en schaalbare softwareontwikkeling. (GAME)'],
                ['name' => 'Functioneel programmeren', 'description' => 'Ik begrijp en kan functioneel programmeren toepassen voor elegante en robuuste code. (CMT)'],
                ['name' => 'Encapsulatie toepassen', 'description' => 'Ik kan de principes van encapsulatie toepassen door attributen en methoden in classes te definiëren, met behoud van dataconsistentie en het gebruik van toegangsrechten.'],
                ['name' => 'Modulariteit toepassen', 'description' => 'Ik kan code opdelen in herbruikbare modules met behulp van classes en interfaces, ter bevordering van leesbaarheid en onderhoudbaarheid.'],
                ['name' => 'Inheritance toepassen', 'description' => 'Ik kan inheritance gebruiken om code te hergebruiken en te specialiseren, door het gebruik van \'extends\' en \'super\' keywords om erfenisrelaties te definiëren.'],
                ['name' => 'Polymorphism toepassen', 'description' => 'Ik kan runtime en compile-time polymorphism toepassen in code.'],
                ['name' => 'Refactoring van klassen', 'description' => 'Ik kan code refactoren om redundantie te verminderen, de code te vereenvoudigen en klassen te hernoemen, herstructureren, en splitsen om de leesbaarheid te vergroten.'],
                ['name' => 'Interface ontwerp', 'description' => 'Ik kan interfaces ontwerpen om code te decouplen, herbruikbaarheid te bevorderen, en \'implements\' keyword gebruiken om interfaces te implementeren in classes.'],
                ['name' => 'Gebruik van abstractie', 'description' => 'Ik kan abstracte classes en methoden gebruiken om code te generaliseren, herbruikbaarheid te vergroten, en het \'abstract\' keyword gebruiken om abstracte concepten te definiëren.'],
            ],
            'PROG04' => [
                ['name' => 'Gegevensmigratie', 'description' => 'Ik begrijp verschillende strategieën voor gegevensmigratie en kan deze toepassen.'],
                ['name' => 'Datastructuurtransformatie', 'description' => 'Ik kan gegevensstructuren effectief transformeren tijdens het migratieproces.'],
                ['name' => 'Minimalisatie van gegevensverlies', 'description' => 'Ik minimaliseer gegevensverlies bij het migreren van gegevens naar verschillende structuren.'],
            ],
            'PROG05' => [
                ['name' => 'Bestandsformaten', 'description' => 'Ik kan verschillende bestandsformaten van assets herkennen, begrijpen en deze converteren naar compatibele formaten voor integratie.'],
                ['name' => 'Licenties en auteursrechten', 'description' => 'Ik kan de licentievoorwaarden van assets begrijpen, naleven, en correcte bronvermelding en attributie toepassen voor gebruikte assets.'],
                ['name' => 'Integratietechnieken', 'description' => 'Ik kan assets integreren in de codebasis met behulp van verschillende technieken, zoals \'img\', \'stylesheet\', \'import\', \'require\', \'embed\', en deze op een gestructureerde en georganiseerde manier beheren.'],
            ],
            'PROG06' => [
                ['name' => 'Coding style guide', 'description' => 'Ik kan een coding style guide gebruiken en naleven om consistentie te bewaren.'],
                ['name' => 'Naamgevingconventies', 'description' => 'Ik kan consistente naamgevingsconventies toepassen voor variabelen, functies, classes en andere code-elementen, met leesbare en beschrijvende namen die de codefunctionaliteit duidelijk weergeven.'],
                ['name' => 'Indentering en witruimte', 'description' => 'Ik kan code consistent inspringen en witruimte gebruiken volgens de teamconventies om de leesbaarheid te vergroten, inclusief het gebruik van de juiste tabgrootte en regeleinden.'],
                ['name' => 'Commentaar en documentatie', 'description' => 'Ik kan duidelijke en beknopte codecommentaren toevoegen om de code te begrijpen en te onderhouden, en ik kan documentatie genereren die de codefunctionaliteit, API en gebruiksscenario\'s beschrijft.'],
                ['name' => 'Naamgeving en beschrijvingen', 'description' => 'Ik kan zelfdocumenterende namen gebruiken voor variabelen, functies, classes en andere code-elementen, waarbij ik gebruik maak van comments.'],
                ['name' => 'Gebruik van inline comments', 'description' => 'Ik kan beschrijvende comments toevoegen om de codefunctionaliteit en logica uit te leggen, inclusief inline comments voor complexe code en uitleg over algoritmen, datatypes en best practices.'],
                ['name' => 'Documentatie genereren', 'description' => 'Ik kan gebruikmaken van automatisch gegenereerde documentatie om de code te documenteren, waardoor de leesbaarheid en het begrip van de code worden verbeterd.'],
            ],
            'PROG07' => [
                ['name' => 'Statische code analyse', 'description' => 'Ik kan statische code analyseren met tools zoals linters en code review tools om fouten, bugs en potentiële kwetsbaarheden te identificeren en de codekwaliteit te verbeteren.'],
                ['name' => 'Code formatteren', 'description' => 'Ik kan code formatteren met behulp van tools om consistentie te bewaren en de leesbaarheid te vergroten. (ctrl + alt + L/ Ctrl + s)'],
                ['name' => 'Debuggen en testen', 'description' => 'Ik kan debugging-tools inzetten voor het waarborgen van de codefunctionaliteit.'],
                ['name' => 'Testcode schrijven', 'description' => 'Ik kan testcode schrijven met behulp van een testframework en \'assert\'-statements gebruiken om de testresultaten te valideren.'],
                ['name' => 'Refactoring en hertesten', 'description' => 'Ik kan code refactoren en hertesten uitvoeren om de codekwaliteit te verbeteren, inclusief het aanpassen van testcode voor gewijzigde functionaliteit.'],
            ],
            'PROG08' => [
                ['name' => 'Toegankelijkheidsrichtlijnen', 'description' => 'Ik kan de WCAG 2.2 richtlijnen begrijpen en toepassen voor toegankelijke software.'],
                ['name' => 'Toegankelijke code', 'description' => 'Ik kan code ontwikkelen die toegankelijk is voor gebruikers met verschillende beperkingen.'],
                ['name' => 'Testen op toegankelijkheid', 'description' => 'Ik kan software testen op toegankelijkheid met handmatige en automatische tests.'],
                ['name' => 'Toegankelijkheid van technologieën', 'description' => 'Ik kan de toegankelijkheidskenmerken van verschillende technologieën evalueren.'],
                ['name' => 'Gebruikersbehoeften', 'description' => 'Ik kan de toegankelijkheidsbehoeften van diverse gebruikersgroepen begrijpen.'],
                ['name' => 'Beperkingen van technologieën', 'description' => 'Ik kan beperkingen van technologieën met betrekking tot toegankelijkheid begrijpen.'],
                ['name' => 'Handmatige en automatische testen', 'description' => 'Ik kan handmatige en automatische tests uitvoeren om de toegankelijkheid van software te beoordelen.'],
                ['name' => 'Verbeteringen implementeren', 'description' => 'Ik kan code aanpassen om toegankelijkheidsproblemen op te lossen, zoals het toevoegen van alternatieve tekst en optimaliseren van focusbeheer.'],
                ['name' => 'Herhaaldelijke testen', 'description' => 'Ik kan herhaaldelijk testen uitvoeren om te waarborgen dat toegankelijkheidsproblemen zijn opgelost en de software continu verbeteren.'],
            ],
            'PROG09' => [
                ['name' => 'Beveiligingsrisico\'s', 'description' => 'Ik herken verschillende beveiligingsrisico\'s, zoals SQL-injectie en cross-site scripting, door code-analyse uit te voeren.'],
                ['name' => 'Veilige codeerpraktijken', 'description' => 'Ik pas veilige codeerpraktijken toe, inclusief inputvalidatie en outputsanering, en volg best practices voor authenticatie, autorisatie en sessiebeheer.'],
                ['name' => 'Coding richtlijnen', 'description' => 'Ik pas beveiligingsgerelateerde coding richtlijnen en best practices toe, inclusief het gebruik van OWASP Top 10 en andere beveiligingsstandaarden als referentie.'],
                ['name' => 'Dependency management', 'description' => 'Ik beoordeel en beheer de veiligheid van externe dependencies, en maak gebruik van \'secure by default\'-bibliotheken en frameworks.'],
            ],
            'PROG10' => [
                ['name' => 'Herkenning van patronen', 'description' => 'Ik herken veelvoorkomende design patterns en begrijp hun voor- en nadelen.'],
                ['name' => 'Toepassing van patronen', 'description' => 'Ik pas design patterns toe om code te hergebruiken, de flexibiliteit te vergroten en de onderhoudbaarheid te verbeteren.'],
                ['name' => 'Implementatiedetails', 'description' => 'Ik begrijp de implementatiedetails van verschillende design patterns, zoals Factory en Strategy, en kan code schrijven die de functionaliteit van deze patronen realiseert.'],
                ['name' => 'Testen en debuggen', 'description' => 'Ik test en debug geïmplementeerde design patterns om ervoor te zorgen dat ze correct werken, waarbij ik de code analyseer op mogelijke fouten en bugs gerelateerd aan de implementatie van deze patronen.'],
            ],
            'ITSK01' => [
                ['name' => 'Mappenstructuur aanmaken en beheren', 'description' => 'Ik kan een mappenstructuur/directorystructuur aanmaken om programma\'s of websites in op te bergen.'],
                ['name' => 'Mappen en bestanden beheren', 'description' => 'Ik kan mappen en bestanden hernoemen en verwijderen.'],
                ['name' => 'Navigeren met Windows Verkenner', 'description' => 'Ik kan navigeren met Windows verkenner en weet welke mappen ik op een Windows PC kan aantreffen.'],
                ['name' => 'Verborgen bestanden zichtbaar maken', 'description' => 'Ik kan verborgen bestanden zichtbaar maken.'],
                ['name' => 'Bestanden comprimeren en uitpakken', 'description' => 'Ik kan mijn werk comprimeren en uitpakken met een programma zoals WinZip.'],
                ['name' => 'Navigeren met MS-DOS/Terminal', 'description' => 'Ik kan een mappenstructuur/directorystructuur aanmaken en navigeren met MS-DOS en terminal commando\'s.'],
                ['name' => 'Navigeren in Linux', 'description' => 'Ik kan in Linux/unix/macOS een mappenstructuur/directorystructuur aanmaken en navigeren met terminal commando\'s.'],
                ['name' => 'Begrip van Linux mappenstructuren', 'description' => 'Ik weet welke mappen ik op een Linux systeem kan aantreffen en dat in Linux geen letters worden toegekend aan schijven maar dat ze gemount moeten worden.'],
                ['name' => 'Plaatsen van programma\'s en websites', 'description' => 'Ik kan bij de verschillende besturingssystemen programma\'s en websites in de juiste mappen/directories plaatsen.'],
                ['name' => 'Herkennen van bestandsformaten', 'description' => 'Ik kan de meest voorkomende bestandsformaten herkennen.'],
            ],
            'ITSK02' => [
                ['name' => 'Kennis van licenties', 'description' => 'Ik heb kennis van licenties en gebruiksrechten, zoals Open Source (MIT, GPL, Apache), Creative Commons, Propriëtair, Freeware, Shareware.'],
                ['name' => 'Uitleggen van licentiesoorten', 'description' => 'Ik kan het verschil tussen open-source licenties en gesloten (proprietary) licenties uitleggen.'],
                ['name' => 'Gebruik van LicenseFinder', 'description' => 'Ik kan LicenseFinder gebruiken om licenties te identificeren.'],
                ['name' => 'Verplichtingen van open-source licenties', 'description' => 'Ik weet dat van open-source licenties de broncode vaak openbaar gemaakt moet worden en dat er bepaalde verplichtingen en vrijheden zijn die daarmee gepaard gaan.'],
                ['name' => 'Licentievoorwaarden bij externe bibliotheken', 'description' => 'Ik weet dat er licentievoorwaarden gelden als ik gebruik maak van een externe bibliotheek of framework en dat deze betrekking hebben op de verspreiding en commercieel gebruik.'],
                ['name' => 'Bedrijfsrichtlijnen voor licenties', 'description' => 'Ik weet dat veel bedrijven richtlijnen hebben betreffende het gebruik van licenties.'],
                ['name' => 'Respecteren van auteursrechten', 'description' => 'Ik weet dat ik licenties na moet leven en de auteursrechten van anderen moet respecteren.'],
            ],
            'ITSK03' => [
                ['name' => 'Algemene dreigingen en beveiliging', 'description' => 'Ik heb brede kennis van cyber security en bedreigingen van netwerken, ik kan aangeven hoe een netwerk bedreigd kan worden.'],
                ['name' => 'Netwerkbeveiliging', 'description' => 'Ik kan aangeven hoe een netwerk beveiligd kan worden.'],
                ['name' => 'Herkennen van IP-adressen en kennis over poorten', 'description' => 'Ik kan verschillende soorten IP-adressen (IPv4 en IPv6) herkennen en weet waarvoor ze gebruikt worden.'],
                ['name' => 'Basisinformatie over poorten', 'description' => 'Ik kan basisinformatie over poorten geven, zoals het herkennen van well-known ports (bijvoorbeeld poort 80 voor HTTP en poort 443 voor HTTPS) en hun functies.'],
                ['name' => 'Beveiliging van systemen', 'description' => 'Ik heb brede kennis van cyber security en bedreigingen van systemen.'],
                ['name' => 'Beveiligingsmethoden toepassen', 'description' => 'Ik kan aangeven op welke manieren een systeem bedreigd kan worden en technieken voor informatiebeveiliging toepassen, zoals SSDLC en OWASP.'],
                ['name' => 'Systeembeveiliging implementeren', 'description' => 'Ik kan aangeven hoe een systeem beveiligd moet worden.'],
                ['name' => 'Kennis van ICT-infrastructuur en devices', 'description' => 'Ik heb kennis van ontwikkelingen op het vlak van ICT-infrastructuur en devices.'],
                ['name' => 'Begrip van netwerksystemen', 'description' => 'Ik kan uitleggen uit welke systemen een netwerk of het internet opgebouwd is en wat de functie is van die systemen.'],
            ],
            'ITSK04' => [
                ['name' => 'Ontwikkelingen in ICT-infrastructuur', 'description' => 'Ik heb kennis van ontwikkelingen op het vlak van ICT-infrastructuur (en devices), zoals \'...as a service\' (SaaS, IaaS, PaaS), cloud.'],
                ['name' => 'Consequenties van cloud services', 'description' => 'Ik kan aangeven hoe de services invloed hebben op het ontwerpen, ontwikkelen en implementeren van software.'],
                ['name' => 'Cloud computing en opslag', 'description' => 'Ik kan aangeven wat Cloud computing voor consequenties heeft betreft opslag, rekenkracht en applicaties in plaats van op lokale servers.'],
                ['name' => 'Docker en containerisatie', 'description' => 'Ik begrijp de basisprincipes van Docker en containerisatie.'],
                ['name' => 'Gebruik van Docker', 'description' => 'Ik kan Docker gebruiken om ontwikkelomgevingen op te zetten en te beheren.'],
                ['name' => 'Docker images maken en deployen', 'description' => 'Ik kan Docker images maken, beheren en deployen.'],
            ],
            'ITSK05' => [
                ['name' => 'Copyright en auteursrecht', 'description' => 'Ik heb brede kennis van relevante wetgeving op het gebied van copyright en auteursrecht.'],
                ['name' => 'Privacy en toegankelijkheid', 'description' => 'Ik heb brede kennis van relevante wetgeving op het gebied van privacy en toegankelijkheid.'],
                ['name' => 'Computercriminaliteit', 'description' => 'Ik heb brede kennis van relevante wetgeving op het gebied van computercriminaliteit.'],
                ['name' => 'Toepassing van wetgeving en bedrijfsnormen', 'description' => 'Ik kan conform wetgeving en geldende bedrijfsnormen werken op het gebied van intellectueel eigendomsrecht.'],
                ['name' => 'Privacy en bedrijfsnormen', 'description' => 'Ik kan conform wetgeving en geldende bedrijfsnormen werken op het gebied van privacy en toegankelijkheid.'],
                ['name' => 'Bedrijfsnormen rond criminaliteit', 'description' => 'Ik kan conform wetgeving en geldende bedrijfsnormen werken op het gebied van computercriminaliteit.'],
            ],
            'ITSK06' => [
                ['name' => 'Security en privacy in ontwerp', 'description' => 'Ik heb kennis van het niveau van security (en privacy) die past bij mijn vakgebied.'],
                ['name' => 'Ontwikkelomgeving en privacy', 'description' => 'Ik hou rekening met de ontwikkelomgeving, programmertaal en/of techniek.'],
                ['name' => 'Eisen rond veiligheid en toegankelijkheid', 'description' => 'Ik hou rekening met eisen rond efficiëntie, toegankelijkheid, privacy, ethiek en veiligheid.'],
                ['name' => 'Keuzes beargumenteren', 'description' => 'Ik beargumenteer de gemaakte keuzes met steekhoudende argumenten.'],
                ['name' => 'Opvolgen van protocollen', 'description' => 'Ik laat in het ontwerp zien dat ik protocollen en regelgeving opvolg betreffende privacy, toegankelijkheid, ethiek en veiligheid.'],
            ],
            'ITSK07' => [
                ['name' => 'Beheer van assets', 'description' => 'Ik begrijp de licentievoorwaarden en auteursrechten bij het gebruik van assets en integreer deze volgens de geldende normen en wetgeving.'],
            ],
            'ITSK08' => [
                ['name' => 'Git-commando\'s', 'description' => 'Ik gebruik de basis Git-commando\'s: init, add, commit, push, pull, clone.'],
                ['name' => 'Git-autorisatie en merging', 'description' => 'Ik werk samen via versiebeheer door middel van Git-autorisatie en merging.'],
                ['name' => 'Git-branching', 'description' => 'Ik pas branching-strategieën toe zoals main, development, en feature branches.'],
                ['name' => 'Continuous Integration en Continuous Deployment', 'description' => 'Ik gebruik Continuous Integration (CI) en Continuous Deployment (CD) met behulp van Git.'],
                ['name' => 'Github Pages', 'description' => 'Ik kan mijn werk publiceren en hosten op GitHub Pages.'],
            ],
            'COMM01' => [
                ['name' => 'Sitemap, wireframe, DoD, userstories, acceptatiecriteria', 'description' => 'Ik stem af met de opdrachtgever/leidinggevende/belanghebbenden wat er ontwikkeld moet worden.'],
                ['name' => 'Daily, Trellobord', 'description' => 'Ik meld en bespreek de voortgang en de knelpunten in het project.'],
                ['name' => 'LSD', 'description' => 'Ik vraag door tot alles duidelijk is.'],
                ['name' => 'Escaleren', 'description' => 'Ik meld belanghebbenden wanneer doelen en/of planning niet behaald worden.'],
                ['name' => 'Overleggen', 'description' => 'Ik zoek in overleg naar een oplossing wanneer doelen en/of planning niet behaald worden.'],
                ['name' => 'LSD', 'description' => 'Ik stem af met de opdrachtgever/leidinggevende/belanghebbenden welke doelen er behaald moeten worden.'],
                ['name' => 'LSD', 'description' => 'Ik ga na of de planning in gevaar komt.'],
                ['name' => 'LSD', 'description' => 'Ik stel realistische doelen, prioriteiten en een realistisch tijdspad op voor de te realiseren software.'],
            ],
            'COMM02' => [
                ['name' => 'Analysevaardigheden', 'description' => 'Ik trek conclusies uit de informatie over benodigde werkzaamheden (en eventuele risico\'s).'],
                ['name' => 'Analysevaardigheden', 'description' => 'Ik stem af met de opdrachtgever/leidinggevende/belanghebbenden welke doelen er behaald moeten worden.'],
            ],
            'COMM03' => [
                ['name' => 'Retrospective', 'description' => 'Ik draag bij aan de evaluatie na oplevering van een (deel)product.'],
                ['name' => 'Retrospective', 'description' => 'Ik benoem wat goed ging.'],
                ['name' => 'Retrospective', 'description' => 'Ik benoem waar verbeteringen mogelijk zijn.'],
                ['name' => 'Retrospective', 'description' => 'Ik formuleer concreet nieuwe kwaliteitsdoelen voor de eigen ontwikkeling en/of de samenwerking op basis van het product.'],
            ],
            'COMM04' => [
                ['name' => 'Retrospective', 'description' => 'Ik formuleer concreet nieuwe kwaliteitsdoelen voor de eigen ontwikkeling en/of de samenwerking op basis van het proces.'],
                ['name' => 'Retrospective', 'description' => 'Ik evalueer het teamproces.'],
                ['name' => 'Retrospective', 'description' => 'Ik evalueer de werkwijze.'],
                ['name' => 'Retrospective', 'description' => 'Ik geef positieve, constructieve feedback over het werk en/of de inbreng van anderen.'],
            ],
            'COMM05' => [
                ['name' => 'Reflectie', 'description' => 'Ik ben kritisch op mijn eigen werk.'],
                ['name' => 'Reflectie', 'description' => 'Ik reflecteer op de eigen prestaties.'],
                ['name' => 'Reflectie', 'description' => 'Ik herken de hiaten in eigen kennis en onderneem actie om deze hiaten tegen te gaan.'],
                ['name' => 'Reflectie', 'description' => 'Ik evalueer mijn eigen prestaties.'],
                ['name' => 'Reflectie', 'description' => 'Ik stel mij open op voor feedback en vraag expliciet naar de mening en ideeën van anderen.'],
            ],
            'COMM06' => [
                ['name' => 'Scrum, risicomanagement', 'description' => 'Ik kan relevante risico\'s inschatten op het gebied van softwaredevelopment.'],
            ],
            'COMM07' => [
                ['name' => 'Motiverende aspecten', 'description' => 'Ik kan een DoF maken die de verwachtingen van plezierige en motiverende aspecten van het project omvat.'],
                ['name' => 'Teamcohesie', 'description' => 'Ik kan een DoF maken en uitbreiden met elementen die bijdragen aan teamcohesie en motivatie.'],
                ['name' => 'Feedback van team', 'description' => 'Ik kan een DoF maken die ook rekening houdt met feedback van het team en opdrachtgever.'],
                ['name' => 'Werkdruk en werkplezier', 'description' => 'Ik kan een DoF maken die zorgt voor een balans tussen werkdruk en werkplezier.'],
                ['name' => 'Lange termijn motivatie', 'description' => 'Ik kan een DoF maken die ook elementen bevat voor de lange termijn motivatie en ontwikkeling van het team.'],
            ],
            'COMM08' => [
                ['name' => 'Kwaliteitscriteria, MoSCoW', 'description' => 'Ik kan een DoD maken uitgaande van kwaliteitscriteria en MoSCoW.'],
                ['name' => 'Inleiding, kern, afsluiting', 'description' => 'Ik kan een DoD maken en uitbreiden met een inleiding, kern en afsluiting.'],
                ['name' => 'Codekwaliteit', 'description' => 'Ik kan een DoD maken en de kern uitbreiden met subkoppen als: "Codekwaliteit", "Documentatie", "Gebruikerstesten", en "Veiligheid".'],
                ['name' => 'Integratie(testen)', 'description' => 'Ik kan een DoD maken die rekening houdt met externe afhankelijkheden en integratie(testen).'],
                ['name' => 'Evaluatie met belanghebbenden', 'description' => 'Ik kan een DoD maken die ook nog aangeeft hoe er wordt geëvalueerd met de belanghebbenden.'],
            ],
            'COMM09' => [
                ['name' => 'Feedback ontvangen', 'description' => 'Ik ontvang feedback en vraag door om onduidelijkheden te verhelderen.'],
                ['name' => 'Zelfrapportage', 'description' => 'Ik vertel anderen over mijn eigen werk en resultaten.'],
                ['name' => 'Actieve informatievergaring', 'description' => 'Ik vraag naar de voortgang en het werk van anderen.'],
                ['name' => 'Presentatievaardigheden', 'description' => 'Ik vertel duidelijk over mijn eigen werk, resultaten en ideeën.'],
                ['name' => 'Feedback vragen', 'description' => 'Ik vraag actief om feedback van collega\'s en leidinggevenden.'],
                ['name' => 'Actief luisteren', 'description' => 'Ik luister goed naar de input van iedereen.'],
                ['name' => 'Diplomatieke communicatie', 'description' => 'Ik reageer vriendelijk en behulpzaam op de input van anderen.'],
                ['name' => 'Informatie-uitwisseling', 'description' => 'Ik stel vragen over het werk van anderen en deel nuttige informatie.'],
            ],
            'COMM10' => [
                ['name' => 'Feedback geven', 'description' => 'Ik kan feedback geven op een respectvolle en duidelijke manier.'],
                ['name' => 'Feedback ontvangen', 'description' => 'Ik kan feedback ontvangen en hierop reageren.'],
                ['name' => 'Doorvragen bij feedback', 'description' => 'Ik kan doorvragen als ik feedback niet begrijp.'],
                ['name' => 'Feedback toepassen', 'description' => 'Ik kan feedback gebruiken om mijn werk te verbeteren.'],
            ],
            'COMM11' => [
                ['name' => 'Zelfstandig werken', 'description' => 'Ik ontwikkel zelfstandig software.'],
                ['name' => 'Verantwoordelijkheid nemen', 'description' => 'Ik neem verantwoordelijkheid voor mijn eigen taken.'],
            ],
            'COMM12' => [
                ['name' => 'Daily standup', 'description' => 'Ik breng belangrijke punten in tijdens het teamoverleg.'],
                ['name' => 'Retrospective', 'description' => 'Ik doe actief mee in vergaderingen en vraag om hulp als ik problemen heb.'],
                ['name' => 'Daily standup', 'description' => 'Ik luister naar anderen en reageer vriendelijk op hun ideeën.'],
                ['name' => 'Samenwerking', 'description' => 'Ik werk goed samen met iedereen die betrokken is bij het project.'],
                ['name' => 'Organisatienormen', 'description' => 'Ik houd mij aan de afspraken en regels van de organisatie.'],
                ['name' => 'Afspraken nakomen', 'description' => 'Ik kom mijn afspraken na.'],
                ['name' => 'Werkafspraken', 'description' => 'Ik maak duidelijke werkafspraken.'],
                ['name' => 'Overleg', 'description' => 'Ik doe actief mee in vergaderingen.'],
                ['name' => 'Ruimte geven', 'description' => 'Ik geef anderen de ruimte om hun mening te geven.'],
                ['name' => 'Eenduidige afspraken', 'description' => 'Ik maak afspraken die voor iedereen duidelijk zijn.'],
                ['name' => 'Procedures volgen', 'description' => 'Ik volg de afspraken, procedures en werkwijzen voor samenwerking.'],
            ],
            'COMM13' => [
                ['name' => 'Iteratief ontwikkelen', 'description' => 'Ik weet wat iteratief ontwikkelen is.'],
                ['name' => 'Incrementeel ontwikkelen', 'description' => 'Ik weet wat incrementeel ontwikkelen is.'],
                ['name' => 'Test-driven development (TDD)', 'description' => 'Ik weet wat test-driven development (TDD) is en hoe het werkt.'],
                ['name' => 'Agile', 'description' => 'Ik weet wat agile methodieken zijn en hoe ze werken.'],
                ['name' => 'Vergelijking methodieken', 'description' => 'Ik begrijp de verschillen tussen iteratief, incrementeel, TDD en agile ontwikkelen.'],
            ],
            'COMM14' => [
                ['name' => 'Scrumboard', 'description' => 'Ik hou bij welke taken nog uitgevoerd moeten worden.'],
                ['name' => 'Daily standup', 'description' => 'Ik bewaak de gestelde doelen en planning.'],
                ['name' => 'Daily standup', 'description' => 'Ik scrum dagelijks en leg dit op de afgesproken manier vast.'],
                ['name' => 'Productbacklog, user stories', 'description' => 'Ik maak taken en prioriteer deze.'],
                ['name' => 'Pokeren', 'description' => 'Ik gebruik pokeren om punten toe te wijzen en taken in kleinere eenheden te splitsen.'],
                ['name' => 'Sprintplanning', 'description' => 'Ik plan taken voor een sprint met behulp van punten poker.'],
                ['name' => 'Sprintplanning', 'description' => 'Ik plan taken over meerdere sprints.'],
                ['name' => 'Burndown chart', 'description' => 'Ik visualiseer de voortgang met behulp van een burndown chart.'],
            ],
            'COMM15' => [
                ['name' => 'Sprintreview', 'description' => 'Ik leg de opgeleverde functionaliteiten duidelijk uit en beantwoord vragen over het product of de werkzaamheden.'],
                ['name' => 'Presentatievaardigheden', 'description' => 'Ik presenteer de functionaliteiten van het (deel)product.'],
                ['name' => 'Presentatievaardigheden', 'description' => 'Ik geef inzicht in de uitgevoerde werkzaamheden.'],
                ['name' => 'Communicatievaardigheden', 'description' => 'Ik maak contact met de toehoorders en beantwoord vragen.'],
                ['name' => 'Verantwoordingsvaardigheden', 'description' => 'Ik leg verantwoording af over de keuzes die zijn gemaakt.'],
                ['name' => 'Argumentatievaardigheden', 'description' => 'Ik hou een goed opgebouwd en met argumenten onderbouwd verhaal.'],
                ['name' => 'Vragen stellen', 'description' => 'Ik stel controlevragen om te controleren of de boodschap is overgekomen.'],
                ['name' => 'Communicatiestijl aanpassen', 'description' => 'Ik pas mijn communicatiestijl en presentatiemiddelen aan de doelgroep aan.'],
            ],
            'COMM16' => [
                ['name' => 'Probleemoplossingstechnieken', 'description' => 'Ik draag ideeën, oplossingen of meningen aan.'],
                ['name' => 'Luistervaardigheden', 'description' => 'Ik neem ideeën, oplossingen of meningen in ontvangst.'],
                ['name' => 'Probleemidentificatie', 'description' => 'Ik meld uitdagingen en knelpunten.'],
                ['name' => 'Advies vragen', 'description' => 'Ik vraag indien nodig om advies of hulp.'],
                ['name' => 'Samenwerkingstechnieken', 'description' => 'Ik breng noodzakelijke en relevante onderwerpen in voor de samenwerking.'],
                ['name' => 'Zelfredzaamheid', 'description' => 'Ik zoek op tijd naar oplossingen als ik tekortkom in kennis of vaardigheden.'],
            ],
            'COMM17' => [
                ['name' => 'Retrospective', 'description' => 'Ik begrijp de wensen en eisen van anderen en maak er uitvoerbare verbeterideeën van.'],
                ['name' => 'Analysevaardigheden', 'description' => 'Ik begrijp de testresultaten en maak er uitvoerbare verbeterideeën van.'],
                ['name' => 'Retrospective', 'description' => 'Ik begrijp de verzoeken vanuit de review en maak er uitvoerbare verbeterideeën van.'],
                ['name' => 'Analysevaardigheden', 'description' => 'Ik leg uit wat anderen willen veranderen en hoe we dat in de software kunnen doen.'],
            ],
            'ONTW01' => [
                ['name' => 'Scrum bord, product backlog, user story', 'description' => 'Ik bespreek met de opdrachtgever, leidinggevende of belanghebbenden wat er ontwikkeld moet worden.'],
                ['name' => 'Scrumboard, Daily standup', 'description' => 'Ik meld en bespreek de voortgang en de knelpunten in het project.'],
                ['name' => 'Risico-inschatting, MoSCoW', 'description' => 'Ik trek conclusies uit de informatie over benodigde werkzaamheden en mogelijke risico\'s.'],
                ['name' => 'Daily standup, Scrumboard', 'description' => 'Ik communiceer regelmatig met de opdrachtgever over de voortgang en eventuele aanpassingen.'],
                ['name' => 'ERD\'s, klassediagrammen', 'description' => 'Ik beargumenteer mijn ontwerpkeuzes met duidelijke en steekhoudende argumenten.'],
            ],
            'ONTW02' => [
                ['name' => 'Risico-inschatting', 'description' => 'Ik voer een risicoanalyse uit om mogelijke problemen vroegtijdig te vinden.'],
                ['name' => 'MoSCoW', 'description' => 'Ik beoordeel de gevonden risico\'s en zet ze op volgorde van belangrijkheid.'],
                ['name' => 'Risico-inschatting', 'description' => 'Ik maak een plan om de risico\'s aan te pakken.'],
                ['name' => 'Scrumboard, Daily standup', 'description' => 'Ik controleer regelmatig de status van de risico\'s en pas mijn aanpak aan als dat nodig is.'],
                ['name' => 'Risicodocumentatie', 'description' => 'Ik documenteer de geïdentificeerde risico\'s en de genomen maatregelen.'],
            ],
            'ONTW03' => [
                ['name' => 'Sitemap', 'description' => 'Ik maak een overzicht van de structuur en hiërarchie van de software.'],
                ['name' => 'Wireframe', 'description' => 'Ik maak wireframes om de basisindeling en navigatie van een gebruikersinterface te visualiseren.'],
                ['name' => 'Mockup', 'description' => 'Ik maak visuele ontwerpen om gedetailleerde gebruikersinterfaces te creëren.'],
                ['name' => 'Prototyping', 'description' => 'Ik maak prototypes om de functionaliteit en gebruikerservaring te testen.'],
                ['name' => 'UX/UI principes', 'description' => 'Ik pas UX/UI principes toe om de gebruikerservaring te verbeteren.'],
                ['name' => 'Toegankelijkheidsrichtlijnen', 'description' => 'Ik zorg ervoor dat mijn ontwerpen voldoen aan toegankelijkheidsrichtlijnen zoals WCAG 2.2.'],
            ],
            'ONTW04' => [
                ['name' => 'ERD', 'description' => 'Ik maak een ERD om de structuur van de database en de relaties tussen tabellen te laten zien.'],
                ['name' => 'Class Diagram', 'description' => 'Ik maak een Class Diagram om de klassen en hun relaties in een object-georiënteerd programma te tonen.'],
                ['name' => 'Flowchart', 'description' => 'Ik maak een Flowchart om de stappen en beslissingen in een proces te visualiseren.'],
                ['name' => 'Use Case Diagram', 'description' => 'Ik maak een Use Case Diagram om de interacties tussen gebruikers en het systeem weer te geven.'],
                ['name' => 'Activity Diagram', 'description' => 'Ik maak een Activity Diagram om de volgorde van activiteiten en de stroom van gebeurtenissen in een proces te beschrijven.'],
            ],
            'ONTW05' => [
                ['name' => 'Privacy by Design', 'description' => 'Ik zorg ervoor dat mijn ontwerpen voldoen aan privacyrichtlijnen.'],
                ['name' => 'Toegankelijkheidsrichtlijnen', 'description' => 'Ik zorg ervoor dat mijn ontwerpen voldoen aan toegankelijkheidsrichtlijnen.'],
                ['name' => 'Ethische checklist', 'description' => 'Ik zorg ervoor dat mijn ontwerpen ethisch verantwoord zijn.'],
                ['name' => 'Security by Design', 'description' => 'Ik volg veiligheidsrichtlijnen bij het maken van mijn ontwerp.'],
            ],
            'ONTW06' => [
                ['name' => 'Testscenario\'s maken', 'description' => 'Ik maak testscenario\'s voor de gerealiseerde software.'],
                ['name' => 'Unit test, integratietest, acceptatietest', 'description' => 'Ik kies en voer passende testvormen uit, zoals unit test, integratietest en acceptatietest.'],
                ['name' => 'Testomgeving, testdata', 'description' => 'Ik bepaal wat nodig is voor het testen, zoals testomgeving, middelen en testdata.'],
                ['name' => 'Testrapport', 'description' => 'Ik voer de tests uit en interpreteer de bevindingen.'],
                ['name' => 'User stories, acceptatietest', 'description' => 'Ik hou rekening met de behoeften van de eindgebruikers tijdens het testen.'],
                ['name' => 'User stories, acceptatietest', 'description' => 'Ik interpreteer wensen, reacties, testresultaten en/of meldingen van belanghebbenden voor het aanpassen van de software.'],
                ['name' => 'Acceptatietest, testrapport, unit testing', 'description' => 'Ik maak een voorstel voor verbetering van de software op basis van de verzamelde informatie.'],
            ]
        ];

        // Loopen door de leeruitkomsten
        foreach ($learningOutcomes as $learningOutcomeNumber => $subOutcomes) {
            // Haal de relevante leeruitkomst op
            $learningOutcome = LearningOutcome::where('number', $learningOutcomeNumber)->first();

            // Controleer of de leeruitkomst is gevonden
            if (!$learningOutcome) {
                // Log de foutmelding of geef een waarschuwing
                Log::warning("Learning outcome with number {$learningOutcomeNumber} not found.");
                continue; // Sla deze iteratie over en ga verder met de volgende
            }

            // Voeg subleeruitkomsten toe voor deze leeruitkomst met een oplopende index voor het nummer
            foreach ($subOutcomes as $index => $subOutcome) {
                // Bouw het nummer van de subleeruitkomst op door het leeruitkomstnummer te combineren met een oplopend nummer
                $subOutcomeNumber = $learningOutcome->number . str_pad($index + 1, 2, '0', STR_PAD_LEFT);

                // Maak de subleeruitkomst aan
                LearningSuboutcome::create([
                    'learning_outcome_id' => $learningOutcome->id,
                    'number' => $subOutcomeNumber,  // Stel het gegenereerde nummer in
                    'name' => $subOutcome['name'],
                    'description' => $subOutcome['description'],
                ]);
            }
        }

    }
}
