<?php

namespace Database\Factories;

use App\Models\Cohort;
use App\Models\Crebo;
use App\Models\EnrolmentStatus;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrolment>
 */
class EnrolmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::all()->random()->id,
            'crebo_id' => Crebo::all()->random()->id,
            'cohort_id' => Cohort::all()->random()->id,
            'date' => $this->faker->date,
            'enrolment_status_id' => EnrolmentStatus::all()->random()->id,
        ];
    }
}
