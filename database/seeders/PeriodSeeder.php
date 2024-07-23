<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Period::factory(16)->create();
        $periods= [
            ['period' => 'Periode 01'],
            ['period' => 'Periode 02'],
            ['period' => 'Periode 03'],
            ['period' => 'Periode 04'],
            ['period' => 'Periode 05'],
            ['period' => 'Periode 06'],
            ['period' => 'Periode 07'],
            ['period' => 'Periode 08'],
            ['period' => 'Periode 09'],
            ['period' => 'Periode 10'],
            ['period' => 'Periode 11'],
            ['period' => 'Periode 12'],
            ['period' => 'Periode 13'],
            ['period' => 'Periode 14'],
            ['period' => 'Periode 15'],
            ['period' => 'Periode 16'],
        ];

        foreach ($periods as $period) {
            Period::create($period);
        }
    }
}
