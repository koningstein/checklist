<?php

namespace Database\Seeders;

use App\Models\Enrolment;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrolmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        foreach ($students as $student) {
            Enrolment::factory([
                'student_id' => $student->id,
                'crebo_id' => 1,
                'cohort_id' => 4,
                'enrolment_status_id' => 4,
                'date' => Carbon::parse('2022-08-01')
            ])->create();
        }
        //Enrolment::factory(31)->create();
    }
}
