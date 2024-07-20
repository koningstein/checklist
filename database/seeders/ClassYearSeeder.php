<?php

namespace Database\Seeders;

use App\Models\ClassYear;
use App\Models\SchoolClass;
use App\Models\SchoolYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ClassYear::factory(10)->create();
        $classYears = [
            // SHWVSOD1A, SHWVSOD1B, SHWVSOD1C (startjaar 2024-2025)
            ['schoolclass' => 'SHWVSOD1A', 'schoolyear' => '2024-2025'],
            ['schoolclass' => 'SHWVSOD1B', 'schoolyear' => '2024-2025'],
            ['schoolclass' => 'SHWVSOD1C', 'schoolyear' => '2024-2025'],

            // SHWVSOD2A, SHWVSOD2B, SHWVSOD2C (startjaar 2023-2024)
            ['schoolclass' => 'SHWVSOD2A', 'schoolyear' => '2024-2025'],
            ['schoolclass' => 'SHWVSOD2B', 'schoolyear' => '2024-2025'],
            ['schoolclass' => 'SHWVSOD2C', 'schoolyear' => '2024-2025'],

            // SHWVSOD3A (startjaar 2022-2023)
            ['schoolclass' => 'SHWVSOD3A', 'schoolyear' => '2024-2025'],

            // SHWVSODEINDSTAGE (geen specifiek startjaar, maar 2024-2025)
            ['schoolclass' => 'SHWVSODEINDSTAGE', 'schoolyear' => '2024-2025'],
        ];

        foreach ($classYears as $classYear) {
            $schoolClass = SchoolClass::where('name', $classYear['schoolclass'])->first();
            $schoolYear = SchoolYear::where('name', $classYear['schoolyear'])->first();

            if ($schoolClass && $schoolYear) {
                ClassYear::create([
                    'school_class_id' => $schoolClass->id,
                    'school_year_id' => $schoolYear->id,
                ]);
            }
        }
    }
}
