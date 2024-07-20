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
        //AssignmentStatus::factory(5)->create();
        $statuses = [
            ['name' => 'Niet gestart'],  // Assignment not yet started
            ['name' => 'Ingediend'],     // Assignment submitted by the student
            ['name' => 'Goedgekeurd'],   // Assignment approved by the teacher
            ['name' => 'Afgewezen'],     // Assignment rejected by the teacher
        ];

        foreach ($statuses as $status) {
            AssignmentStatus::create($status);
        }
    }
}
