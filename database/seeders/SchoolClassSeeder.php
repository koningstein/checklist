<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //SchoolClass::factory(5)->create();
        $schoolClasses = [
            'SHWVSOD1A',
            'SHWVSOD1B',
            'SHWVSOD1C',
            'SHWVSOD2A',
            'SHWVSOD2B',
            'SHWVSOD2C',
            'SHWVSOD3A',
            'SHWVSODEINDSTAGE',
        ];

        foreach ($schoolClasses as $className) {
            SchoolClass::create(['name' => $className]);
        }
    }
}
