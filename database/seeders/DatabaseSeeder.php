<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleAndPermissionSeeder::class,
            UserSeeder::class,
            CohortSeeder::class,
            CreboSeeder::class,
            CourseSeeder::class,
            PeriodSeeder::class,
            SchoolClassSeeder::class,
            SchoolYearSeeder::class,
            StudentSeeder::class,
            EnrolmentStatusSeeder::class,
            ModuleSeeder::class,
            AssignmentSeeder::class,
            EnrolmentSeeder::class,
            ClassYearSeeder::class,
            EnrolmentClassSeeder::class,
            ClassAssignmentSeeder::class,
            AssignmentStatusSeeder::class,
            StudentAssignmentSeeder::class,
            LearningLevelSeeder::class,
            LearningOutcomeSeeder::class,
            LearningRelatedTechniqueSeeder::class,
            LearningSuboutcomeSeeder::class,
            LearningSuboutcomeLevelSeeder::class,
            LearningSuboutcomeTechniqueSeeder::class,
            LearningSuboutcomeLevelAssignmentSeeder::class,
            NewsSeeder::class,
            CommentSeeder::class,
            ContactMessageSeeder::class,
        ]);

        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
