<?php

namespace Database\Seeders;

use App\Models\Cohort;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CohortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cohorts = [
            ['name' => '2019-2020'],
            ['name' => '2020-2021'],
            ['name' => '2021-2022'],
            ['name' => '2022-2023'],
            ['name' => '2023-2024'],
            ['name' => '2024-2025'],
        ];

        foreach ($cohorts as $cohort) {
            Cohort::create($cohort);
        }
        //Cohort::factory(5)->create();
    }
}
