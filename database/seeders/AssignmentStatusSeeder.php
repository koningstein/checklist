<?php

namespace Database\Seeders;

use App\Models\AssignmentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AssignmentStatus::factory(5)->create();
    }
}
