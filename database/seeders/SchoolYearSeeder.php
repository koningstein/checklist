<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //SchoolYear::factory(5)->create();
        $schoolYears = [
            ['name' => '2018-2019', 'startdate' => Carbon::parse('2018-08-01'), 'enddate' => Carbon::parse('2019-07-31')],
            ['name' => '2019-2020', 'startdate' => Carbon::parse('2019-08-01'), 'enddate' => Carbon::parse('2020-07-31')],
            ['name' => '2020-2021', 'startdate' => Carbon::parse('2020-08-01'), 'enddate' => Carbon::parse('2021-07-31')],
            ['name' => '2021-2022', 'startdate' => Carbon::parse('2021-08-01'), 'enddate' => Carbon::parse('2022-07-31')],
            ['name' => '2022-2023', 'startdate' => Carbon::parse('2022-08-01'), 'enddate' => Carbon::parse('2023-07-31')],
            ['name' => '2023-2024', 'startdate' => Carbon::parse('2023-08-01'), 'enddate' => Carbon::parse('2024-07-31')],
            ['name' => '2024-2025', 'startdate' => Carbon::parse('2024-08-01'), 'enddate' => Carbon::parse('2025-07-31')],
            ['name' => '2025-2026', 'startdate' => Carbon::parse('2025-08-01'), 'enddate' => Carbon::parse('2026-07-31')],
        ];

        foreach ($schoolYears as $year) {
            SchoolYear::create($year);
        }
    }
}
