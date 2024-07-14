<?php

namespace Database\Factories;

use App\Models\AssignmentStatus;
use App\Models\ClassAssignment;
use App\Models\EnrolmentClass;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentAssignment>
 */
class StudentAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'enrolment_class_id' => EnrolmentClass::all()->random()->id,
            'class_assignment_id' => ClassAssignment::all()->random()->id,
            'duedate' => $this->faker->dateTime,
            'assignment_status_id' => AssignmentStatus::all()->random()->id,
            'marked_by_id' => User::all()->random()->id,
            'completed' => $this->faker->boolean,
            'marked_at' => $this->faker->dateTime,
        ];
    }
}
