<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker->unique()->numberBetween(1, 100),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'duedate' => $this->faker->dateTime,
            'module_id' => Module::all()->random()->id,
        ];
    }
}
