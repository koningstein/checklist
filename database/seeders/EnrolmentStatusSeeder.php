<?php

namespace Database\Seeders;

use App\Models\EnrolmentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrolmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //EnrolmentStatus::factory(3)->create();
        $statuses = [
            'intake',
            'afgemeld',
            'beeindigd',
            'definitief',
        ];

        foreach ($statuses as $status) {
            EnrolmentStatus::create(['name' => $status]);
        }
    }
}
