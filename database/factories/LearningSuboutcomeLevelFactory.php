<?php

namespace Database\Factories;

use App\Models\LearningLevel;
use App\Models\LearningSuboutcome;
use App\Models\Period;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LearningSuboutcomeLevel>
 */
class LearningSuboutcomeLevelFactory extends Factory
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
//            'learning_level_id' => LearningLevel::factory(),
            //'period_id' => Period::factory(),
            'learning_suboutcome_id' => LearningSuboutcome::all()->random()->id,
            'learning_level_id' => LearningLevel::all()->random()->id,
            'period_id' => Period::all()->random()->id,
        ];
    }
}
