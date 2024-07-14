<?php

namespace Database\Seeders;

use App\Models\Crebo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Crebo::factory(5)->create();
    }
}
