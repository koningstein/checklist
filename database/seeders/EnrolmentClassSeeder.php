<?php

namespace Database\Seeders;

use App\Models\Enrolment;
use App\Models\EnrolmentClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrolmentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // EnrolmentClass::factory(10)->create();
        $enrolments= Enrolment::all();
        foreach ($enrolments as $enrolment) {
            EnrolmentClass::factory([
                'enrolment_id' => $enrolment->id,
                'class_year_id' => 7
            ])->create();
        }
    }
}
