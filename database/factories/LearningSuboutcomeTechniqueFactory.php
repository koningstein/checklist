<?php

namespace Database\Factories;

use App\Models\LearningRelatedTechnique;
use App\Models\LearningSuboutcome;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LearningSuboutcomeTechnique>
 */
class LearningSuboutcomeTechniqueFactory extends Factory
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
//            'learning_related_technique_id' => LearningRelatedTechnique::factory(),
            'learning_suboutcome_id' => LearningSuboutcome::all()->random()->id,
            'learning_related_technique_id' => LearningRelatedTechnique::all()->random()->id,
        ];
    }
}
