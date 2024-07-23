<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\LearningSuboutcome;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LearningSuboutcomeAssignment>
 */
class LearningSuboutcomeAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'learning_suboutcome_id' => LearningSuboutcome::factory(),
            'assignment_id' => Assignment::factory(),
        ];
    }
}
