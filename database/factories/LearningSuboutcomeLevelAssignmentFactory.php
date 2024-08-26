<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\LearningSuboutcome;
use App\Models\LearningSuboutcomeLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LearningSuboutcomeLevelAssignment>
 */
class LearningSuboutcomeLevelAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'learning_suboutcome_id' => LearningSuboutcome::factory(),
//            'assignment_id' => Assignment::factory(),
            'learning_suboutcome_level_id' => LearningSuboutcomeLevel::all()->random()->id,
            'assignment_id' => Assignment::all()->random()->id,
        ];
    }
}
