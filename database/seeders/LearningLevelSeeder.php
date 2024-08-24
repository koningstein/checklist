<?php

namespace Database\Seeders;

use App\Models\LearningLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //LearningLevel::factory()->count(3)->create();
        LearningLevel::create(['name' => 'starter', 'description' => 'De student heeft nog geen ervaring met het onderwerp en heeft begeleiding nodig om de basisbeginselen te begrijpen.']);
        LearningLevel::create(['name' => 'basis', 'description' => 'De student heeft enige ervaring met het onderwerp en kan de basisbeginselen zelfstandig toepassen.']);
        LearningLevel::create(['name' => 'examen', 'description' => 'De student heeft veel ervaring met het onderwerp en kan complexe problemen oplossen.']);
    }
}
