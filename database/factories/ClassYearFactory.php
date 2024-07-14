<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use App\Models\SchoolYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassYear>
 */
class ClassYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school_class_id' => SchoolClass::all()->random()->id,
            'school_year_id' => SchoolYear::all()->random()->id,
        ];
    }
}
