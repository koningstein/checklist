<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\ClassYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassAssignment>
 */
class ClassAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_year_id' => ClassYear::all()->random()->id,
            'assignment_id' => Assignment::all()->random()->id,
            'duedate' => $this->faker->dateTime,
        ];
    }
}
