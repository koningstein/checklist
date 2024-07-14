<?php

namespace Database\Seeders;

use App\Models\Enrolment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrolmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Enrolment::factory(10)->create();
    }
}
