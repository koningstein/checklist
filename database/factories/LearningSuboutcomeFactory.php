<?php

namespace Database\Factories;

use App\Models\LearningOutcome;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LearningSuboutcome>
 */
class LearningSuboutcomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'learning_outcome_id' => LearningOutcome::factory(),
            'learning_outcome_id' => LearningOutcome::all()->random()->id,
            'number' => $this->faker->unique()->numerify('LNOC####'),
            'name' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph,
        ];
    }
}
