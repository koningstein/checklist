<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Zorg ervoor dat er een admin user is
        $adminUser = User::find(4)->first();

        if ($adminUser) {
            News::factory()->count(10)->create([
                'user_id' => $adminUser->id,
            ]);
        }
    }
}
