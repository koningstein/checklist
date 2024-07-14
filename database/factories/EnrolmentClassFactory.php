<?php

namespace Database\Factories;

use App\Models\ClassYear;
use App\Models\Enrolment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EnrolmentClass>
 */
class EnrolmentClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'enrolment_id' => Enrolment::all()->random()->id,
            'class_year_id' => ClassYear::all()->random()->id,
        ];
    }
}
