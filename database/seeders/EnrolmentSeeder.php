<?php

namespace Database\Seeders;

use App\Models\Enrolment;
use App\Models\Student;
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
            ])->create();
        }
        //Enrolment::factory(31)->create();
    }
}
